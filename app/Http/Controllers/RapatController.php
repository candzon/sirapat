<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use App\Models\JenisRapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RapatController extends Controller
{
    public function index()
    {
        $rapats = Rapat::with(['jenisRapat', 'creator'])->latest()->get();
        return view('rapat.index', compact('rapats'));
    }

    public function create()
    {
        $jenis_rapats = JenisRapat::all();
        return view('rapat.create', compact('jenis_rapats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required|string|max:255',
            'jenis_rapat_id' => 'required|exists:jenis_rapats,id',
            'deskripsi' => 'nullable|string',
        ]);

        $validated['created_by'] = Auth::id();
        $validated['status'] = 'draft';

        Rapat::create($validated);

        return redirect()->route('rapat.index')
            ->with('success', 'Rapat berhasil dibuat.');
    }

    public function jenisIndex()
    {
        $jenis_rapats = JenisRapat::latest()->get();
        return view('rapat.jenis', compact('jenis_rapats'));
    }

    public function jenisStore(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JenisRapat::create($validated);

        return redirect()->route('rapat.jenis')
            ->with('success', 'Jenis rapat berhasil ditambahkan.');
    }

    public function jenisDestroy(JenisRapat $jenisRapat)
    {
        $jenisRapat->delete();
        return redirect()->route('rapat.jenis')
            ->with('success', 'Jenis rapat berhasil dihapus.');
    }

    public function show(Rapat $rapat)
    {
        return view('rapat.show', compact('rapat'));
    }

    public function edit(Rapat $rapat)
    {
        $jenis_rapats = JenisRapat::all();
        return view('rapat.edit', compact('rapat', 'jenis_rapats'));
    }

    public function update(Request $request, Rapat $rapat)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tempat' => 'required|string|max:255',
            'jenis_rapat_id' => 'required|exists:jenis_rapats,id',
            'status' => 'required|string',
            'deskripsi' => 'nullable|string',
        ]);

        $rapat->update($validated);

        return redirect()->route('rapat.index')
            ->with('success', 'Rapat berhasil diperbarui.');
    }

    public function destroy(Rapat $rapat)
    {
        $rapat->delete();
        return redirect()->route('rapat.index')
            ->with('success', 'Rapat berhasil dihapus.');
    }
} 