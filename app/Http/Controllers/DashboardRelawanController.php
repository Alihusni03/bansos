<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
use App\Models\Agama;
use App\Models\Jenis_kelamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardRelawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Relawan::where('id', auth()->user()->id)->get();
        return view('dashboard.relawan.index',[
            'relawans' => Relawan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.relawan.create',[
            'agamas' => Agama::all(),
            'jenis_kelamins' => Jenis_kelamin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:225',
            'np' => 'required|max:25',
            'jenis_kelamin_id' => 'required',
            'tl' => 'required|date',
            'agama_id' => 'required',
            'nowa' => 'required|min:12|max:15',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required',
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('relawan-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        relawan::create($validatedData);

        return redirect('/dashboard/relawan')->with('success','Relawan baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Relawan $relawan)
    {
        return view('dashboard.relawan.show', [
            'relawan' => $relawan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Relawan $relawan)
    {
        return view('dashboard.relawan.edit',[
            'relawan' => $relawan,
            'agamas' => Agama::all(),
            'jenis_kelamins' => Jenis_kelamin::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relawan $relawan)
    {

        // return $request;
        $rules = [
            'nama' => 'required|max:225',
            'np' => 'required|max:25',
            'jenis_kelamin_id' => 'required',
            'tl' => 'required|date',
            'agama_id' => 'required',
            'nowa' => 'required|min:12|max:15',
            'foto' => 'image|file|max:2048',
            'alamat' => 'required',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('relawan-foto');
        }

        $validatedData['user_id'] = auth()->user()->id;
        
        Relawan::where('id', $relawan->id)
            ->update($validatedData);

        return redirect('/dashboard/relawan')->with('success','Relawan berhasil di edit!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Relawan $relawan)
    {

        if($relawan->foto) {
            Storage::delete($relawan->foto);
        }   

        relawan::destroy($relawan->id);
        return redirect('/dashboard/relawan')->with('success','Data berhasil dihapus!');
    }
}

