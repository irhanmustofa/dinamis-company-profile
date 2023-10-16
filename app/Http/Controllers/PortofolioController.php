<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('admin.portofolio', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $portofolio = new Portofolio;
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $portofolio->title.'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/portofolio', $filename);
            $portofolio->image = $filename;
        }
        $portofolio->save();
        return redirect('/portofolio')->with('status', 'Portofolio berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);
        $portofolio = Portofolio::find($request->id);
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = $portofolio->title.'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/portofolio', $filename);
            $portofolio->image = $filename;
        }
        $portofolio->save();
        return redirect('/portofolio')->with('status', 'Portofolio berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request = Portofolio::find($request->id);
        $request->delete();
        return redirect('/portofolio')->with('status', 'Portofolio berhasil dihapus!');
    }
}
