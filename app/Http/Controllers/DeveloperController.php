<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.developer.index',[
            'developers' => developer::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.developer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_panti' => 'required|max:225',
            'tentang' => 'required',
            'foto' => 'image|file|max:2048',
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('developer-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        developer::create($validatedData);

        return redirect('/dashboard/developer')->with('success','developer baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        //
    }
}
