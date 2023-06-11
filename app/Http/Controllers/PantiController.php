<?php

namespace App\Http\Controllers;

use App\Models\Pantiasuhan;
use App\Models\Profile;
use App\Models\Anak;
use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Kebutuhan;
use App\Models\Sosmed;
use App\Models\Pengurus;
use App\Models\Ketua;
use Illuminate\Http\Request;

class PantiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.pantiasuhan.index',[
            'user' => $user,
            'profiles' => Profile::where('user_id', auth()->user()->id)->get(),
            'anaks' => Anak::where('user_id', auth()->user()->id)->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pantiasuhan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.pantiasuhan.index',[
            'user' => $user,
            'profiles' => Profile::where('user_id', $user->id)->get(),
            'kegiatans' => Kegiatan::where('user_id', $user->id)->get(),
            'kebutuhans' => Kebutuhan::where('user_id', $user->id)->get(),
            'sosmeds' => Sosmed::where('user_id', $user->id)->get(),
            'penguruses' => Pengurus::where('user_id', $user->id)->get(),
            'ketuas' => Ketua::where('user_id', $user->id)->get(),
            'anaks' => Anak::where('user_id', $user->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pantiasuhan $pantiasuhan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pantiasuhan $pantiasuhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pantiasuhan $pantiasuhan)
    {
        //
    }
}
