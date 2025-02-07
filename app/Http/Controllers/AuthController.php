<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Opd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_active == 1) {
                return redirect()->intended('/');
            }

            // Hancurkan session ketika user belum aktif
            $request->session()->regenerate();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/waiting');

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerForm()
    {
        $opd = Opd::all('id', 'nama');
        return view('auth.register', compact('opd'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'opd' => 'required|exists:opds,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
            'is_active' => 0,
        ]);

        DB::table('opd_members')->insert([
            'staff_opd_id' => $user->id,
            'kepala_opd_id' => $validated['opd'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Auth::login($user);
        
        // Hancurkan session ketika user belum aktif
        $request->session()->regenerate();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/waiting');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function waiting()
    {
        return view('auth.waiting');
    }
}