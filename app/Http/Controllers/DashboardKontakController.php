<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class DashboardKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kontak.index',[
            'kontaks' => Kontak::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_panti' => 'required|max:225',
            'nama' => 'required',
            'telephone' => 'required|min:12|max:15',
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        kontak::create($validatedData);

        return redirect('/dashboard/kontak')->with('success','ketua baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kontak $kontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontak $kontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontak $kontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontak $kontak)
    {
        //
    }
}
