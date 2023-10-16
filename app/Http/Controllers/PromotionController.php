<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion', compact('promotions'));
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
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $promotion = new Promotion();
        $promotion->code = $request->code;
        $promotion->name = $request->name;
        $promotion->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $promotion->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-promotion'), $filename);
            $promotion->image = $filename;
        }

        $promotion->save();

        return back()->with('success', 'Promotion has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $promotion = Promotion::find($request->id);
        $promotion->code = $request->code;
        $promotion->name = $request->name;
        $promotion->description = $request->description;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);
            $file = $request->file('image');
            $filename = $promotion->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-promotion'), $filename);
            $promotion->image = $filename;
        }

        $promotion->save();

        return back()->with('success', 'Promotion has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $promotion = Promotion::find($request->id);
        $promotion->delete();
        return back()->with('success', 'Promotion has been deleted');
    }
}
