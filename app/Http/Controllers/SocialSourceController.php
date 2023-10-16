<?php

namespace App\Http\Controllers;

use App\Models\SocialSource;
use Illuminate\Http\Request;

class SocialSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            'social_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]);

        $socialSource = new SocialSource();
        $socialSource->social_id = $request->social_id;
        $socialSource->name = $request->name;
        $socialSource->link = $request->link;
        $socialSource->save();

        return back()->with('success', 'Social Source added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialSource $socialSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialSource $socialSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialSource $socialSource)
    {
        $socialSource = SocialSource::find($request->id);
        $request->validate([
            'social_id' => 'required',
            'name' => 'required',
            'link' => 'required',
        ]);

        $socialSource->social_id = $request->social_id;
        $socialSource->name = $request->name;
        $socialSource->link = $request->link;
        $socialSource->save();


        
        return back()->with('success', 'Social Source updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request = SocialSource::find($request->id);
        $request->delete();

        return back()->with('success', 'Social Source deleted successfully.');
    }
}
