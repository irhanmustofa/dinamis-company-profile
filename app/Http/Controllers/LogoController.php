<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        // dd($logo->title);
        return view('admin.dashboard', compact('logo'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png',
        ]);

        $logo = Logo::first();
        $logo->title = $request->title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $logo->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-logo'), $newName);
            $logo->image = $newName;
        }
        $logo->save();
        return redirect('dashboard')->with('status', 'Logo has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        //
    }
}
