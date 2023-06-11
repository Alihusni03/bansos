<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan;
use Illuminate\Http\Request;


class DashboardKebutuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kebutuhan.index',[
            'kebutuhans' => Kebutuhan::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kebutuhan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // return $request;
         $validatedData = $request->validate([
            'program' => 'required|max:225',
            'perbulan' => 'required',
            'pertahun' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        kebutuhan::create($validatedData);

        return redirect('/dashboard/kebutuhan')->with('success','kebutuhan baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kebutuhan $kebutuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kebutuhan $kebutuhan)
    {
        return view('dashboard.kebutuhan.edit',[
            'kebutuhan' => $kebutuhan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kebutuhan $kebutuhan)
    {
         // return $request;
         $rules = [
            'program' => 'required|max:225',
            'perbulan' => 'required',
            'pertahun' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        
        Kebutuhan::where('id', $kebutuhan->id)
            ->update($validatedData);

        return redirect('/dashboard/kebutuhan')->with('success','kebutuhan berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kebutuhan $kebutuhan)
    {
        if($kebutuhan->foto) {
            Storage::delete($kebutuhan->foto);
        }   

        kebutuhan::destroy($kebutuhan->id);
        return redirect('/dashboard/kebutuhan')->with('success'
        ,'Data berhasil dihapus!');
    }
}
