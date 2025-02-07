<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Undangan;
use App\Models\Rapat;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

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
        $undangans = Undangan::with(['rapat', 'user', 'opd'])
            ->when(auth()->user()->role !== 'admin', function($query) {
            return $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        // var_dump($Opds); die;
        return view('undangan.index', compact('undangans'));
    }

    public function create()
    {
        $rapats = Rapat::where('status', 'draft')->get();
        return view('undangan.create', compact('rapats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'template' => 'required|string|max:50',
            'status' => 'required|in:draft,terkirim,dibatalkan',
        ]);

        Undangan::create($validated);

        return redirect()->route('undangan.index')
            ->with('success', 'Undangan berhasil dibuat.');
    }

    public function show(Undangan $undangan)
    {
        return view('undangan.show', compact('undangan'));
    }

    public function edit(Undangan $undangan)
    {
        $rapats = Rapat::where('status', 'draft')->get();
        return view('undangan.edit', compact('undangan', 'rapats'));
    }

    public function update(Request $request, Undangan $undangan)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'template' => 'required|string|max:50',
            'status' => 'required|in:draft,terkirim,dibatalkan',
        ]);

        $undangan->update($validated);

        return redirect()->route('undangan.index')
            ->with('success', 'Undangan berhasil diperbarui.');
    }

    public function destroy(Undangan $undangan)
    {
        $undangan->delete();
        return redirect()->route('undangan.index')
            ->with('success', 'Undangan berhasil dihapus.');
    }

    public function exportPdf(Undangan $undangan)
    {
        $undangan = Undangan::select('n.*', 'u.id', 'u.name', 'o.*')
        ->from('notulens as n')
        ->join('users as u', 'n.admin_pj', '=', 'u.id')
        ->join('opds as o', 'u.id', '=', 'o.id')
        ->where('n.id', $undangan->id)
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

        $html = view()->make('template.pdf_undangan', compact('undangan'))->render();
        $pdf->loadHTML($html);

        return $pdf->download('undangan-' . $undangan->id . '.pdf');
    }
} 