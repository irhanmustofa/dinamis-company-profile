<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service-category', compact('services'));
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
            'service_code'=>'required|max:255',
            'name'=>'required|max:255',
            'description'=>'required',
        ]);
        $service = new Service;
        $service->service_code = $request->service_code;
        $service->name = $request->name;
        $service->description = $request->description;
        if ($request->hasFile('service_img')) {
            $file = $request->file('service_img');
            $filename = $file->getClientOriginalName();
            $newName = $service->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-service'), $newName);
            $service->service_img = $newName;
        }
        $service->save();
        return redirect('service')->with('status', 'Service has been created');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $serviceItem = ServiceItem::where('service_id', $service->id)->get();
        return view('admin.service-list', compact('service', 'serviceItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'service_code'=>'required|max:255',
            'name'=>'required|max:255',
            'description'=>'required',
        ]);
        $service = Service::where('slug', $slug)->first();
        
        $service->service_code = $request->service_code;
        $service->name = $request->name;
        $service->description = $request->description;
        if ($request->hasFile('service_img')) {
            $file = $request->file('service_img');
            $filename = $file->getClientOriginalName();
            $newName = $service->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-service'), $newName);
            $service->service_img = $newName;
        }
        $service->update();
        
        return redirect('service')->with('status', 'Service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $service = Service::where('slug', $slug)->first();
        $service->delete();

        return redirect('service')->with('status', 'Service has been deleted');
    }
}
