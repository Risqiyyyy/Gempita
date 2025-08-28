<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{

    public function authlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors([
                'email' => 'User tidak ditemukan.',
            ])->withInput();
        }
        
        if ($user->status === 'block') {
            return back()->withErrors([
                'email' => 'Akun Anda diblokir. Mohon hubungi admin.',
            ])->withInput();
        }
        
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.',
            ])->withInput();
        }
        
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
        
            return redirect()->intended(route('dashboard'));
        }
        
        return back()->withErrors([
            'email' => 'Gagal login. Silakan coba lagi.',
        ])->withInput();        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

