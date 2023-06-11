<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class DashboardProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.profile.index',[
            'profiles' => Profile::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'nama' => 'required|max:225',
            'tentang' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        profile::create($validatedData);

        return redirect('/dashboard/profile')->with('success','profile baru telah di tambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('dashboard.profile.edit',[
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $rules = [
            'nama' => 'required|max:225',
            'tentang' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        
        Profile::where('id', $profile->id)
            ->update($validatedData);

        return redirect('/dashboard/profile')->with('success','profile berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        if($profile->foto) {
            Storage::delete($profile->foto);
        }   

        profile::destroy($profile->id);
        return redirect('/dashboard/profile')->with('success'
        ,'Data berhasil dihapus!');
    }
}
