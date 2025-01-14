<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OpdController extends Controller
{
    public function index()
    {
        $opds = Opd::latest()->get();
        return view('opd.index', compact('opds'));
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
                'is_active' => 'boolean'
            ]);

            $opd = Opd::create($validated);

            // Create user account for OPD
            User::create([
                'name' => $validated['kepala'],
                'email' => $validated['email'],
                'password' => Hash::make('12345678'),
                'role' => 'opd'
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
            'is_active' => 'boolean'
        ]);

        $opd->update($validated);

        return redirect()->route('opd.index')
            ->with('success', 'OPD berhasil diperbarui.');
    }

    public function destroy(Opd $opd)
    {
        $opd->delete();
        return redirect()->route('opd.index')
            ->with('success', 'OPD berhasil dihapus.');
    }
} 