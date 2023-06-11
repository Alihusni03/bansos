<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Login berhasil
            $user = Auth::user();

            if ($user->Role('Admin')) {
                return redirect()->route('admin');
            } elseif ($user->Role('Donatur')) {
                return redirect()->route('donatur');
            } elseif ($user->Role('Relawan')) {
                return redirect()->route('admin');
            } elseif ($user->Role('Developer')) {
                return redirect()->route('admin');
            }
            // return redirect()->route('admin');
        }

        // Login gagal
        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }
    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}

