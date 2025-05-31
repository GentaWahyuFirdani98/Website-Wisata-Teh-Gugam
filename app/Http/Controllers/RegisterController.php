<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'nama' => $validated['nama'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'pengunjung',
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
}



}
