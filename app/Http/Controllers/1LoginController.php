<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Gate::allows('isAdmin')) {
                return redirect('/dashboard');
            } elseif (Gate::allows('isDeveloper')) {
                return redirect('/dashboard');
            } elseif (Gate::allows('isDonatur')) {
                return redirect('/dashboard');
            } elseif (Gate::allows('isRelawan')) {
                return redirect('/dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->with('loginError', 'Login failed!');

        // $request->validate([
        //     'email' => 'required|email:dns',
        //     'password' => 'required',
        // ]);

        // $credentials = $request->only('email','password');
        // if (Auth::attempt($credentials)){
        //     return redirect()->route('dashboard')->with('success','Login telah berhasil');
        // }else{
        //     return redirect()->route('login')->with('error','Email atau Password yang anda masukan salah');
        // }

    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}
