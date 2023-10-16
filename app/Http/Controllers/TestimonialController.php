<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimoni', compact('testimonials'));
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
            'name'=>'required|max:255|unique:testimonials',
            'keterangan'=>'required|max:255',
            'description'=>'required',
            'image'=>'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->keterangan = $request->keterangan;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $testimonial->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-testimonial'), $newName);
            $testimonial->image = $newName;
        }
        $testimonial->save();
        return redirect('testimoni')->with('status', 'Testimonial has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial = Testimonial::findOrFail($request->id);
        $request->validate([
            'name'=>'required|max:255',
            'keterangan'=>'required|max:255',
            'description'=>'required',
            'image'=>'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $testimonial->name = $request->name;
        $testimonial->keterangan = $request->keterangan;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $testimonial->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-testimonial'), $newName);
            $testimonial->image = $newName;
        }
        $testimonial->save();
        return redirect('testimoni')->with('status', 'Testimonial has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request = Testimonial::findOrFail($request->id);
        $request->delete();
        return redirect('testimoni')->with('status', 'Testimonial has been deleted');
    }
}
