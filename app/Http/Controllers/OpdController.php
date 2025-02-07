<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OpdController extends Controller
{
    public function index()
    {
        $opds = Opd::latest()->get();
        $verifikasi_data = DB::table('users as u')
            ->join('opd_members as om', 'u.id', '=', 'om.staff_opd_id')
            ->join('opds as o', 'om.kepala_opd_id', '=', 'o.id')
            ->select('u.id', 'u.name as nama_user', 'u.email as email_user', 'u.is_active', 'o.nama as nama_dinas', 'o.kepala as kepala_dinas')
            ->where('u.role', '=', 'user')
            ->latest('u.created_at')
            ->get();
        // var_dump( $verifikasi_data ); die;
        return view('opd.index', compact('opds', 'verifikasi_data'));
    }

    public function create()
    {
        return view('opd.create');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kepala' => 'required|string|max:255',
            'email' => 'required|email|unique:opds',
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'is_active' => 'boolean',
            'nip' => 'required|string|max:20',
        ]);

        $opd = Opd::create($validated);

        // Create Kepala account for OPD
        User::create([
            'name' => $validated['kepala'],
            'email' => $validated['email'],
            'password' => Hash::make('12345678'),
            'is_active' => 1,
            'role' => 'opd',
            'opd_id' => $opd->id,
            'nip' => $validated['nip'],
        ]);

        return redirect()->route('opd.index')
            ->with('success', 'OPD berhasil ditambahkan.');
    }

    public function show(Opd $opd)
    {
        return view('opd.show', compact('opd'));
    }

    public function edit(Opd $opd)
    {
        return view('opd.edit', compact('opd'));
    }

    public function update(Request $request, Opd $opd)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kepala' => 'required|string|max:255',
            'email' => 'required|email|unique:opds,email,' . $opd->id,
            'telepon' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'is_active' => 'boolean',
            'nip' => 'required|string|max:20',
        ]);

        $opd->update($validated);

        return redirect()->route('opd.index')
            ->with('success', 'OPD berhasil diperbarui.');
    }

    public function updateStatus(Request $request, User $user)
    {
        $validated = $request->validate([
            'is_active' => 'required|boolean'
        ]);

        try {
            DB::beginTransaction();

            $user->is_active = $validated['is_active'];
            $user->save();

            DB::commit();

            $message = $validated['is_active'] == 1
                ? 'Status Aktif Akun berhasil diperbarui.'
                : 'Status Nonaktifkan Akun berhasil diperbarui.';

            return redirect()->route('opd.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Gagal mengupdate status: ' . $e->getMessage());
        }
    }

    public function destroy(Opd $opd)
    {
        $opd->delete();
        return redirect()->route('opd.index')
            ->with('success', 'OPD berhasil dihapus.');
    }
}