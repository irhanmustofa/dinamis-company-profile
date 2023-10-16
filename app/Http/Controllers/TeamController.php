<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.team', compact('teams'));
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
            'name'=>'required|max:255',
            'position'=>'required|max:255',
            'description'=>'required',
        ]);
        $team = new Team;
        $team->name = $request->name;
        $team->position = $request->position;
        $team->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $newName = $team->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-team'), $newName);
            $team->image = $newName;
        }
        $team->save();
        return redirect('team')->with('status', 'Team has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $team = Team::findOrFail($request->id);
        $request->validate([
            'name'=>'required|max:255',
            'position'=>'required|max:255',
            'description'=>'required',
        ]);

        $team->name = $request->name;
        $team->position = $request->position;
        $team->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $team->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-team'), $newName);
            $team->image = $newName;
        }
        $team->save();
        return redirect('team')->with('status', 'Team has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Team $team)
    {
        $team = Team::findOrFail($request->id);
        $team->delete();
        return redirect('team')->with('status', 'Team has been deleted');
    }
}
