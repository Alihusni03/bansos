<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Bansos;
use Illuminate\Http\Request;

class DashboardDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.donatur.index',[
            'donaturs' => Donatur::where('user_id', auth()->user()->id)->get()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.donatur.create',[
            'bansos' => Bansos::all()
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
            'bansos_id' => 'required',
            'bentuk' => 'required',
            'tanggal' => 'required|date',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        donatur::create($validatedData);

        return redirect('/dashboard/donatur')->with('success','Donatur baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donatur $donatur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donatur $donatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donatur $donatur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donatur $donatur)
    {
        //
    }
}
