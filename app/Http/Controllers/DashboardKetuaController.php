<?php

namespace App\Http\Controllers;

use App\Models\Ketua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardKetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.ketua.index',[
            'ketuas' => Ketua::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ketua.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:225',
            'umur' => 'required',
            'telephone' => 'required|min:12|max:15',
            'bahasa' => 'required',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required',
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('ketua-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        ketua::create($validatedData);

        return redirect('/dashboard/ketua')->with('success','ketua baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketua $ketua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketua $ketua)
    {
        return view('dashboard.ketua.edit',[
            'ketua' => $ketua
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ketua $ketua)
    {
        $rules = [
            'nama' => 'required|max:225',
            'umur' => 'required',
            'telephone' => 'required|min:12|max:15',
            'bahasa' => 'required',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('ketua-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Ketua::where('id', $ketua->id)
            ->update($validatedData);

        return redirect('/dashboard/ketua')->with('success','ketua berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ketua $ketua)
    {
        if($ketua->foto) {
            Storage::delete($ketua->foto);
        }   

        ketua::destroy($ketua->id);
        return redirect('/dashboard/ketua')->with('success','Data berhasil dihapus!');
    }
}
