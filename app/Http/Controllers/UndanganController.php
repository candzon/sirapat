<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use App\Models\Rapat;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index()
    {
        $undangans = Undangan::with('rapat')->latest()->get();
        return view('undangan.index', compact('undangans'));
    }

    public function create()
    {
        $rapats = Rapat::where('status', 'belum_mulai')->get();
        return view('undangan.create', compact('rapats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rapat_id' => 'required|exists:rapats,id',
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
        $rapats = Rapat::where('status', 'belum_mulai')->get();
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
} 