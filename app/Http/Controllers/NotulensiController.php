<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Rapat;
use App\Models\User;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\DB;
use App\Models\Kehadiran;

class NotulensiController extends Controller
{
    public function index()
    {
        // $notulens = Notulen::with(['rapat', 'notulis', 'opd'])->latest()->get();


        // $notulens = Notulen::select('n.*', 'u.id', 'u.name', 'o.*')
        // ->from('notulens as n')
        // ->join('users as u', 'n.admin_pj', '=', 'u.id')
        // ->join('opds as o', 'u.id', '=', 'o.id')
        // ->where('n.id', '=', 'u.id')
        // ->get();

        // if (auth()->user()->role === 'admin') {
        // Admin bisa melihat notulen yang dibuat oleh semua OPD
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'notulis') {
            $notulens = Notulen::with(['rapat', 'notulis', 'opd'])
                ->latest()
                ->get();
        } else {
            $notulens = Notulen::with(['rapat', 'notulis', 'opd'])
                ->where('notulis_id', auth()->id())
                ->latest()
                ->get();
        }


        // // Notulis atau user hanya bisa melihat notulen yang dibuat oleh dirinya sendiri 
        // $notulens = Notulen::with(['rapat', 'notulis', 'opd'])
        //     ->where('notulis_id', auth()->id())
        //     ->latest()
        //     ->get();

        // $notulens = DB::table('notulens')
        //     ->join('rapats', 'notulens.rapat_id', '=', 'rapats.id')
        //     ->join('users', 'notulens.notulis_id', '=', 'users.id')
        //     ->join('opds', 'users.id', '=', 'opds.id')
        //     ->select('notulens.*', 'rapats.judul', 'users.name', 'opds.nama')
        //     ->get();



        return view('notulensi.index', compact('notulens'));
    }

    public function create()
    {
        // $rapats = Rapat::where('status', 'draft')->get();
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'notulis') {
            $rapats = Rapat::where('status', 'draft')
                ->select('id', 'judul')
                ->get();
            $admin_pj = User::where('role', 'opd')->select('id', 'name')->get();
        } elseif (auth()->user()->role === 'opd') {
            $rapats = Rapat::where('status', 'draft')
                ->join('kehadirans', 'rapats.id', '=', 'kehadirans.rapat_id')
                ->where('kehadirans.keterangan', 'hadir')
                ->where('kehadirans.nama', auth()->id())
                ->select('rapats.id', 'rapats.judul')
                ->get();
            // echo "<pre>";
            // print_r($rapats);
            // echo "</pre>";
            // die;
            $admin_pj = User::where('role', 'opd')->select('id', 'name')->get();
        } else {
            $rapats = Rapat::where('status', 'draft')
                ->join('kehadirans', 'rapats.id', '=', 'kehadirans.rapat_id')
                ->where('kehadirans.keterangan', 'hadir')
                ->where('kehadirans.nama', auth()->id())
                ->select('rapats.id', 'rapats.judul')
                ->get();
            // var_dump(auth()->user()->opd_id); die;
            $admin_pj = DB::table('users')
                ->join('opd_members', 'users.opd_id', '=', 'opd_members.kepala_opd_id')
                ->select('users.id', 'users.name')
                ->where('users.role', 'opd')
                ->where('opd_members.staff_opd_id', auth()->id())
                ->get();
        }

        return view('notulensi.create', compact('rapats', 'admin_pj'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'isi' => 'required|string',
            'admin_pj' => 'required|exists:users,id',
            'status' => 'required|in:draft,selesai',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validated['notulis_id'] = auth()->id();

        // Upload image 
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image === null) {
                    throw new \Exception('Image file is null');
                }
                $imageName = time() . '.' . $image->extension();
                if (!$image->move(public_path('images'), $imageName)) {
                    throw new \Exception('Failed to upload image');
                }
                $validated['image'] = $imageName;
            } else {
                $validated['image'] = null;
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['image' => $e->getMessage()]);
        }


        Notulen::create($validated);

        return redirect()->route('notulensi.index')
            ->with('success', 'Notulensi berhasil dibuat.');
    }

    public function show(Notulen $notulen)
    {
        return view('notulensi.show', compact('notulen'));
    }

    public function edit(Notulen $notulen)
    {
        $rapats = Rapat::where('status', 'draft')->get();
        $users = User::where('role', 'opd')->select('id', 'name')->get(); // Menampilkan data user yang role-nya adalah 'opd'
        return view('notulensi.edit', compact('notulen', 'rapats', 'users'));
    }

    public function update(Request $request, Notulen $notulen)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'isi' => 'required|string',
            'status' => 'required|in:draft,selesai',
            'admin_pj' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // Upload image
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                if ($image === null) {
                    throw new \Exception('Image file is null');
                }
                // Delete old image if exists
                if ($notulen->image && file_exists(public_path('images/' . $notulen->image))) {
                    unlink(public_path('images/' . $notulen->image));
                }
                $imageName = time() . '.' . $image->extension();
                if (!$image->move(public_path('images'), $imageName)) {
                    throw new \Exception('Failed to upload image');
                }
                $validated['image'] = $imageName;
            } else {
                $validated['image'] = $notulen->image; // Keep existing image if no new upload
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['image' => $e->getMessage()]);
        }


        $notulen->update($validated);

        return redirect()->route('notulensi.index')
            ->with('success', 'Notulensi berhasil diperbarui.');
    }

    public function destroy(Notulen $notulen)
    {
        $notulen->delete();
        return redirect()->route('notulensi.index')
            ->with('success', 'Notulensi berhasil dihapus.');
    }

    public function exportPdf(Notulen $notulen)
    {
        $notulens = Notulen::select('n.*', 'u.id', 'u.name', 'o.*')
            ->from('notulens as n')
            ->join('users as u', 'n.admin_pj', '=', 'u.id')
            ->join('opds as o', 'u.id', '=', 'o.id')
            ->where('n.id', $notulen->id)
            ->first();

        // var_dump($notulens);
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

        $html = view()->make('template.pdf_notulen', compact('notulens'))->render();
        $pdf->loadHTML($html);

        try {
            if (!$notulens) {
                throw new \Exception('Data notulensi tidak ditemukan');
            }
            if (!$pdf) {
                throw new \Exception('PDF tidak dapat dibuat');
            }
            return $pdf->download('notulensi-' . $notulen->id . '.pdf');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}