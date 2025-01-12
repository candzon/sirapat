<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Rapat;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kehadirans = Kehadiran::with(['Rapat' => function($query) {
            $query->select('id', 'judul');
        }])->get();
        return view('kehadiran.index', compact('kehadirans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rapats = Rapat::all();
        return view('kehadiran.create', compact('rapats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
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
            'nama' => 'required|string|max:100',
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
}
