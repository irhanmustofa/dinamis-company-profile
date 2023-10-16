<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ServiceItem::with('Service')->get();
        return view('admin.service-item', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service-item-add', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id'=>'required',
            'item_code'=>'required|unique:service_items|max:255|unique:service_items',
            'name'=>'required|max:255|unique:service_items',
            'price'=>'required|max:255',
            'tipe'=>'max:255',
            'item_img'=>'mimes:jpeg,jpg,png,bmp,gif,svg'
        ]);

        $item = new ServiceItem();
        $item->service_id = $request->service_id;
        $item->item_code = $request->item_code;
        $item->name = $request->name;
        $item->slug = Str::slug($request->name);
        $item->price = $request->price;
        $item->tipe = $request->tipe;
        $item->description = $request->description;
        
        $newName = '';
        if ($request->hasFile('item_img')) {
            $file = $request->file('item_img');
            $newName = $item->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-service'), $newName);
            $item->item_img = $newName;
        }
        $item->save();  
        return redirect('service-item')->with('status', 'Service Item has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceItem $serviceItem)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceItem $serviceItem,$slug)
    {
        $item = ServiceItem::where('slug', $slug)->first();
        $services = Service::all();
        return view('admin.service-item-edit', compact('item','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceItem $serviceItem)
    {
        if ($request->hasFile('item_img')) {
            $file = $request->file('item_img');
            $newName = $serviceItem->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-service'), $newName);
            $serviceItem->item_img = $newName;
        }
        $item = ServiceItem::where('slug', $request->slug)->first();
        $item->update($request->all());
        $item->save();
        return redirect('service-item')->with('status', 'Service Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, ServiceItem $serviceItem)
    {
        $item = ServiceItem::where('slug', $slug)->first();
        $item->delete();
        return back()->with('status', 'Service Item has been deleted');
    }
}
