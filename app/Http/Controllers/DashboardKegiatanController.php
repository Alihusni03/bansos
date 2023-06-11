<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kegiatan.index',[
            'kegiatans' => Kegiatan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kegiatan.create');
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
            'penjelasan' => 'required'
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('kegiatan-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Kegiatan::create($validatedData);

        return redirect('/dashboard/kegiatan')->with('success','kegiatan baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('dashboard.kegiatan.edit',[
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        // return $request;
        $rules = [
            'nama' => 'required|max:225',
            'foto' => 'image|file|max:2048',
            'penjelasan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('kegiatan-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Kegiatan::where('id', $kegiatan->id)
            ->update($validatedData);

        return redirect('/dashboard/kegiatan')->with('success','kegiatan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if($kegiatan->foto) {
            Storage::delete($kegiatan->foto);
        }   

        kegiatan::destroy($kegiatan->id);
        return redirect('/dashboard/kegiatan')->with('success','Data berhasil dihapus!');
    }
}
