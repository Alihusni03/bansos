<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pengurus.index',[
            'penguruses' => Pengurus::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:225',
            'foto' => 'image|file|max:2048',
            'jabatan' => 'required',
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('pengurus-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        pengurus::create($validatedData);

        return redirect('/dashboard/pengurus')->with('success','pengurus baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengurus = Pengurus::find($id);
        return view('dashboard.pengurus.show',[
            'pengurus' => $pengurus 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengurus = Pengurus::find($id);
        return view('dashboard.pengurus.edit',[
            'pengurus' => $pengurus 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::find($id);
        $rules = [
            'nama' => 'required|max:225',
            'foto' => 'image|file|max:2048',
            'jabatan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('pengurus-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Pengurus::where('id', $pengurus->id)
            ->update($validatedData);

        return redirect('/dashboard/pengurus')->with('success','pengurus berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::find($id);
        if($pengurus->foto) {
            Storage::delete($pengurus->foto);
        }   

        Pengurus::destroy($pengurus->id);
        return redirect('/dashboard/pengurus')->with('success','Data berhasil dihapus!');
    }
}
