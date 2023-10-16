<?php

namespace App\Http\Controllers;

use App\Models\MediaSocial;
use Illuminate\Http\Request;

class MediaSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mediaSocials = MediaSocial::all();
        return view('admin.sosmed', compact('mediaSocials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
            $request->validate([
                'name' => 'required',
                'icon' => 'required',
            ]);
    
            $mediaSocial = new MediaSocial();
            $mediaSocial->name = $request->name;
            $mediaSocial->icon = $request->icon;
            $mediaSocial->save();
    
            return redirect('sosmed')->with('status', 'Media Social has been created');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(MediaSocial $mediaSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaSocial $mediaSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaSocial $mediaSocial)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $mediaSocial = MediaSocial::findOrFail($request->id);
        $mediaSocial->name = $request->name;
        $mediaSocial->icon = $request->icon;
        $mediaSocial->save();

        return redirect('sosmed')->with('status', 'Media Social has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $mediaSocial = MediaSocial::findOrFail($request->id);
        $mediaSocial->delete();
        return redirect('sosmed')->with('status', 'Media Social has been deleted');
    }
}
