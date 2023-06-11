<?php

namespace App\Http\Controllers;

use App\Models\Halamandonatur;
use App\Models\User;
use App\Models\Profile;
use App\Models\Anak;
use Illuminate\Http\Request;

class HalamandonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('halamandonatur.index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function edit(Halamandonatur $halamandonatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Halamandonatur $halamandonatur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Halamandonatur $halamandonatur)
    {
        //
    }

    public function show($id)
    {
        
    }
}
