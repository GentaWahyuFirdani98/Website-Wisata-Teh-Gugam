<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.show');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'current_password' => 'nullable|required_with:new_password|string',
            'new_password' => 'nullable|string|min:8|different:current_password|confirmed',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password saat ini salah']);
            }
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('admin.profile.show')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

     public function index()
    {
        $user = Auth::user();
        // $riwayat = Deteksi::where('user_id', $user->id)->latest()->get();

        return view('user.profile.profile', compact('user'));
    }

    public function updateNama(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user->nama = $request->nama;
        $user->save();

        return back()->with('nama_updated', 'Nama berhasil diperbarui.');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('status', 'Password berhasil diperbarui.');
    }

}