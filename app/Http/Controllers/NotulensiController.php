<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Models\Rapat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NotulensiController extends Controller
{
    public function index()
    {
        $notulens = Notulen::with(['rapat', 'notulis'])->latest()->get();
        return view('notulensi.index', compact('notulens'));
    }

    public function create()
    {
        $rapats = Rapat::where('status', 'draft')->get();
        return view('notulensi.create', compact('rapats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'isi' => 'required|string',
            'status' => 'required|in:draft,selesai',
        ]);

        $validated['notulis_id'] = auth()->id();

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
        return view('notulensi.edit', compact('notulen', 'rapats'));
    }

    public function update(Request $request, Notulen $notulen)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
            'isi' => 'required|string',
            'status' => 'required|in:draft,selesai',
        ]);

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
        $notulens = Notulen::select('n.*', 'u.id', 'o.*')
            ->from('notulens as n')
            ->join('users as u', 'n.notulis_id', '=', 'u.id')
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

        return $pdf->download('notulensi-' . $notulen->id . '.pdf');
    }
}