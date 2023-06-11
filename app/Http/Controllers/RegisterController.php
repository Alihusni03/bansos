<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Role;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        $donaturRole = Role::where('name', 'Donatur')->first(); // Menemukan peran "Donatur" dari basis data
        $donaturRoleId = $donaturRole ? $donaturRole->id : null; // Mengambil ID peran "Donatur" jika ditemukan

        return view('register.index',[
            'donaturRoleId' => $donaturRoleId,
            'roles' => Role::all(),
        ]);
    
    } 

    public function store(Request $request)
    {
        $donaturRole = Role::where('name', 'Donatur')->first(); // Menemukan peran "Donatur" dari basis data
        $donaturRoleId = $donaturRole ? $donaturRole->id : null; // Mengambil ID peran "Donatur" jika ditemukan

        $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:225',
            // 'role_id' => '3'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 3;

        $user->save();


        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);
        // $validatedData['role_id'] = $request->role_id;
        
        // User::create($validatedData);

        // $request->session()->flash('success', 'Registration successful! Please login');
        

        return redirect('/login')->with('success', 'Registration successful! Please login');
    }
}
