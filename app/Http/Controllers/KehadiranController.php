<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Rapat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kehadirans = Kehadiran::with(['Rapat' => function($query) {
        //     $query->select('id', 'judul');
        // }])->get();

        if (auth()->user()->role === 'opd') {
            $kehadirans = DB::table('kehadirans as k')
                ->join('rapats as r', 'k.rapat_id', '=', 'r.id')
                ->join('users as u', 'k.nama', '=', 'u.id')
                ->join('opds as o', 'u.opd_id', '=', 'o.id')
                ->select('k.*', 'r.judul', 'u.name', 'o.nama as opd_nama')
                ->where('u.opd_id', auth()->user()->opd_id)
                ->get();
        }
        // Admin bisa melihat kehadiran semua OPD
        $kehadirans = DB::table('kehadirans as k')
            ->join('rapats as r', 'k.rapat_id', '=', 'r.id')
            ->join('users as u', 'k.nama', '=', 'u.id')
            ->join('opds as o', 'u.opd_id', '=', 'o.id')
            ->select('k.*', 'r.judul', 'u.name', 'o.nama as opd_nama')
            ->get();


        return view('kehadiran.index', compact('kehadirans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rapats = Rapat::all();

        if (auth()->user()->role === 'admin') {
            $users = User::whereIn('role', ['user', 'opd'])->where('is_active', 1)->get();
        } elseif (auth()->user()->role === 'opd') {
            $users = User::where('opd_id', auth()->user()->opd_id)
                ->where('is_active', 1)
                ->get();
        } else {
            $users = DB::table('users as u')
                ->select('u.id', 'u.name', 'u.opd_id')
                ->leftJoin('opd_members as om', 'om.staff_opd_id', '=', 'u.id')
                ->where('om.kepala_opd_id', auth()->user()->opd_id)
                ->where('u.is_active', 1)
                ->get();
        }
        // Untuk OPD
        // $users = User::where('opd_id', auth()->user()->opd_id)->get();
        return view('kehadiran.create', compact('rapats', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|exists:users,id', // Memastikan user_id valid
            'rapat_id' => 'required|exists:rapats,id', // Memastikan rapat_id valid
        ]);

        $validated['tanggal'] = now()->toDateString();
        $validated['keterangan'] = 'belum hadir';

        Kehadiran::create($validated);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        return view('kehadiran.show', compact('kehadiran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kehadiran = Kehadiran::findOrFail($id);
        $rapats = Rapat::all();
        return view('kehadiran.edit', compact('kehadiran', 'rapats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input form
        $validated = $request->validate([
            'nama' => 'required|exists:users,id',
            'keterangan' => 'required|string',
            'tanggal' => 'required|date',
            'rapat' => 'required|exists:rapats,id',
        ]);

        // Menemukan dan memperbarui data kehadiran
        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update($validated);

        // Redirect ke halaman detail kehadiran setelah diperbarui
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus kehadiran
        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->delete();

        // Redirect ke halaman daftar kehadiran setelah dihapus
        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil dihapus!');
    }

    public function setHadir(Request $request, $id)
    {
        $validated = $request->validate([
            'keterangan' => 'required|string'
        ]);

        $kehadiran = Kehadiran::findOrFail($id);
        $kehadiran->update($validated);

        return redirect()->route('kehadiran.index')->with('success', 'Kehadiran berhasil diperbarui!');
    }
}
