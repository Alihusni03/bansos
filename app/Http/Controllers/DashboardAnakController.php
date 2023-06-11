<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\jenis_kelamin;
use App\Models\Status;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class DashboardAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.anak.index',[
            'anaks' => Anak::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.anak.create',[
            'statuses' => Status::all(),
            'lokasis' => Lokasi::all(),
            'jenis_kelamins' => Jenis_kelamin::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'alamat' => 'required',
            'jenis_kelamin_id' => 'required',
            'sekolah' => 'required',
            'status_id' => 'required',
            'lokasi_id' => 'required',
        ]);
        
        $validatedData['user_id'] = auth()->user()->id;

        anak::create($validatedData);

        return redirect('/dashboard/anak')->with('success','Anak baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anak $anak)
    {
        return view('dashboard.anak.show', [
            'anak' => $anak,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anak $anak)
    {
        return view('dashboard.anak.edit',[
            'anak' => $anak,
            'statuses' => Status::all(),
            'lokasis' => Lokasi::all(),
            'jenis_kelamins' => Jenis_kelamin::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anak $anak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anak $anak)
    {
        if($anak->foto) {
            Storage::delete($anak->foto);
        }   

        anak::destroy($anak->id);
        return redirect('/dashboard/anak')->with('success'
        ,'Data berhasil dihapus!');
    }
}
