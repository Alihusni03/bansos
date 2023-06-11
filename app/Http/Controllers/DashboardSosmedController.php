<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class DashboardSosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.sosmed.index',[
            'sosmeds' => sosmed::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sosmed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'fb' => 'required',
            'tw' => 'required',
            'yt' => 'required',
            'ig' => 'required',
            'wa' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        sosmed::create($validatedData);

        return redirect('/dashboard/sosmed')->with('success','sosmed baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        return view('dashboard.sosmed.edit',[
            'sosmed' => $sosmed
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sosmed $sosmed)
    {
        $rules = [
            'fb' => 'required',
            'tw' => 'required',
            'yt' => 'required',
            'ig' => 'required',
            'wa' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        
        Sosmed::where('id', $sosmed->id)
            ->update($validatedData);

        return redirect('/dashboard/sosmed')->with('success','sosmed berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sosmed $sosmed)
    {
        if($sosmed->foto) {
            Storage::delete($sosmed->foto);
        }   

        sosmed::destroy($sosmed->id);
        return redirect('/dashboard/sosmed')->with('success','Data berhasil dihapus!');
    }
}
