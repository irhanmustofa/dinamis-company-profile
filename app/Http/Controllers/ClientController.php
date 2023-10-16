<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        return view('admin.client', compact('clients'));
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
        $request->validate(
            [
                'name' => 'required',
                'logo' => 'required',
            ]
        );

        $client = new Client();

        $client->name = $request->name;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $client->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-client'), $filename);
            $client->logo = $filename;
        }

        $client->save();

        return redirect()->back()->with('success', 'Client added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $client = Client::find($request->id);

        $request->validate(
            [
                'name' => 'required',
            ]
        );

        $client->name = $request->name;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $client->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-client'), $filename);
            $client->logo = $filename;
        }

        $client->save();
        return redirect()->back()->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $client = Client::find($request->id);
        $client->delete();
        return redirect()->back()->with('success', 'Client deleted successfully');
    }
}
