<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use App\Models\Rapat;
use App\Models\UndanganDispo;
use App\Models\User;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class UndanganController extends Controller
{
    public function index()
    {
        // $undangans = Undangan::with('rapat')->latest()->get();
        /**
         * Retrieves a collection of Undangan (invitation) records with their associated relationships.
         * If the authenticated user is not an admin, only their own invitations are returned.
         * 
         * The query includes:
         * - Eager loading of 'rapat' (meeting) and 'user' relationships
         * - Filtering based on user role and ID
         * - Sorted by latest records first
         * 
         * @return \Illuminate\Database\Eloquent\Collection Collection of Undangan models
         */
        // $undangans = Undangan::with(['rapat', 'user', 'opd'])
        //     ->when(auth()->user()->role !== 'admin', function ($query) {
        //         return $query->where('user_id', auth()->id());
        //     })
        //     ->latest()
        //     ->get();

        if (auth()->user()->role === 'admin') {
            $undangans = Undangan::with(['rapat', 'user', 'undangan_dispo'])
                ->latest('undangans.created_at')
                ->get();
            $users = User::where('role', 'opd')->select('id', 'name')->get();
        } elseif (auth()->user()->role === 'user') {
            $undangans = Undangan::with(['rapat', 'user', 'undangan_dispo'])
                ->join('undangan_dispos', 'undangan_dispos.undangan_id', '=', 'undangans.id')
                ->join('opd_members', 'opd_members.staff_opd_id', '=', 'undangan_dispos.penerima_id')
                ->where('undangan_dispos.penerima_id', auth()->id())
                ->latest('undangans.created_at')
                ->select('undangans.*', 'undangan_dispos.penerima_id')
                ->get();
            $users = User::join('opd_members', 'opd_members.staff_opd_id', '=', 'users.id')
                ->where('opd_members.kepala_opd_id', auth()->id())
                ->select('users.id', 'users.name')
                ->get();
        } else {
            // Jika diinvite otomatis terdispo usernya
            $undangans = Undangan::with(['rapat', 'user', 'undangan_dispo'])
                ->join('undangan_dispos', 'undangan_dispos.undangan_id', '=', 'undangans.id')
                ->where('undangan_dispos.penerima_id', auth()->id())
                ->orWhere('undangans.user_id', auth()->id())
                ->latest('undangans.created_at')
                ->select('undangans.*', 'undangan_dispos.penerima_id')
                ->get();

            $users = User::join('opd_members', 'opd_members.staff_opd_id', '=', 'users.id')
                ->where('opd_members.kepala_opd_id', auth()->id())
                ->select('users.id', 'users.name')
                ->get();
        }




        // var_dump($Opds); die;
        return view('undangan.index', compact('undangans', 'users'));
    }

    public function create()
    {
        $rapats = Rapat::where('status', 'draft')->get();
        $users = User::where('role', 'opd')->where('id', '!=', auth()->id())->select('id', 'name')->get(); // Menampilkan data user yang role-nya adalah 'opd'
        return view('undangan.create', compact('rapats', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'template' => 'required|string|max:50',
            'penerima_id' => 'required|array',
            'penerima_id.*' => 'exists:users,id',
        ]);

        try {
            $undangan = Undangan::create([
                'rapat_id' => $validated['rapat_id'],
                'user_id' => $validated['user_id'],
                'judul' => $validated['judul'],
                'isi' => $validated['isi'],
                'template' => $validated['template'],
                'status' => 'terkirim'
            ]);

            // Insert multiple recipients
            $dispoBatch = array_map(function ($penerima_id) use ($undangan) {
                return [
                    'undangan_id' => $undangan->id,
                    'penerima_id' => $penerima_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $request->penerima_id);

            DB::table('undangan_dispos')->insert($dispoBatch);

            return redirect()->route('undangan.index')
                ->with('success', 'Undangan berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('undangan.index')
                ->with('error', 'Gagal membuat undangan: ' . $e->getMessage());
        }
    }


    public function show(Undangan $undangan)
    {
        $untuk = Undangan::join('undangan_dispos', 'undangan_dispos.undangan_id', '=', 'undangans.id')
            ->join('users', 'users.id', '=', 'undangan_dispos.penerima_id')
            ->join('opds', 'opds.id', '=', 'users.opd_id')
            ->where('undangan_dispos.undangan_id', $undangan->id)
            ->select('users.name', 'opds.nama as nama_opd')
            ->get();

        return view('undangan.show', compact('undangan', 'untuk'));
    }

    public function edit(Undangan $undangan)
    {
        $rapats = Rapat::where('status', 'draft')->get();
        $users = User::where('role', 'opd')->where('id', '!=', auth()->id())->select('id', 'name')->get(); // Menampilkan data user yang role-nya adalah 'opd'

        return view('undangan.edit', compact('undangan', 'rapats', 'users'));
    }

    public function update(Request $request, Undangan $undangan, UndanganDispo $undanganDispo)
    {
        $validated = $request->validate([
            'rapat_id' => 'exists:rapats,id',
            'judul' => 'string|max:255',
            'isi' => 'string',
            'template' => 'string|max:50',
            'penerima_id' => 'array',
            'penerima_id.*' => 'exists:users,id',
        ]);

        try {
            // Remove penerima_id from validated data
            $undanganData = collect($validated)->except(['penerima_id'])->toArray();

            // Update undangan
            $undangan->update($undanganData);

            // Update multiple recipients
            // $undanganDispo->where('undangan_id', $undangan->id)->delete();

            $dispoBatch = array_map(function ($penerima_id) use ($undangan) {
                return [
                    'undangan_id' => $undangan->id,
                    'penerima_id' => $penerima_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }, $request->penerima_id);

            DB::table('undangan_dispos')->insert($dispoBatch);

            return redirect()->route('undangan.index')
                ->with('success', 'Undangan berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('undangan.index')
                ->with('error', 'Gagal memperbarui undangan: ' . $e->getMessage());
        }
    }

    public function destroy(Undangan $undangan)
    {
        try {
            $undanganDelete = DB::table('undangan_dispos')->where('undangan_id', $undangan->id)->delete();
            $undangan->delete();

            if (!$undanganDelete || !$undangan) {
                throw new \Exception('Gagal menghapus undangan');
            }

            return redirect()->route('undangan.index')
                ->with('success', 'Undangan berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('undangan.index')
                ->with('error', 'Gagal menghapus undangan: ' . $e->getMessage());
        }
    }

    public function exportPdf(Undangan $undangan)
    {
        $undangan = Undangan::select('n.*', 'u.id', 'u.name', 'o.*')
            ->from('undangans as n')
            ->join('users as u', 'n.user_id', '=', 'u.id')
            ->join('opds as o', 'u.id', '=', 'o.id')
            ->where('n.id', $undangan->id)
            ->first();

        // var_dump($undangan);
        // die;

        // Configure DomPDF to handle images
        $pdf = Pdf::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'defaultPaperSize' => 'a4',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'chroot' => public_path()
        ]);

        $html = view()->make('template.pdf_undangan', compact('undangan'))->render();
        $pdf->loadHTML($html);

        try {
            if (!$undangan) {
                throw new \Exception('Anda tidak bisa mengakses undangan ini karena harus dibuat oleh Kepala OPD, bukan Admin.');
            }

            if (!$html) {
                throw new \Exception('Template undangan tidak dapat dibuat');
            }

            return $pdf->download('undangan-' . $undangan->id . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}