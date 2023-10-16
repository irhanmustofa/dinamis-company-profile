<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use App\Models\About;
use App\Models\Mision;
use App\Models\Vision;
use App\Models\MediaSocial;
use App\Models\SocialSource;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all()->count() ? About::all()->first() : new About();
        $socialSources = SocialSource::with('mediaSocial')->get();
        $mediaSocials = MediaSocial::orderBy('name', 'asc')->get();
        $misi = Mision::with('about')->get();
        $visi = Vision::with('about')->get();
        return view('admin.about', compact('about', 'socialSources', 'mediaSocials', 'misi', 'visi'));
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
            'company_name' => 'required',
            'description' => 'required',    
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_map' => 'required',
            'company_logo' => 'required|image|mimes:png',
            'company_image' => 'required|image|mimes:png',
        ]);

        $about = new About();
        $about->company_name = $request->company_name;
        $about->description = $request->description;
        $about->company_address = $request->company_address;
        $about->company_email = $request->company_email;
        $about->company_phone = $request->company_phone;
        $about->company_map = $request->company_map;

        if($request->hasFile('company_logo')){
            $file = $request->file('company_logo');
            $filename = $about->company_name."_logo_".$file->getClientOriginalName();
            $file->move(public_path('img-about'), $filename);
            $about->company_logo = $filename;
        }

        if($request->hasFile('company_image')){
            $file = $request->file('company_image');
            $filename = $about->company_name."_image_".$file->getClientOriginalName();
            $file->move(public_path('img-about'), $filename);
            $about->company_image = $filename;
        }

        $about->save();
        return redirect('about')->with('status', 'About has been created');
    }

    public function storeMisi(Request $request)
    {
        $request->validate([
            'mission' => 'required',
        ]);

        $about = About::first();

        $misi = new Mision();
        $misi->id_about = $about->id;
        $misi->mission = $request->mission;
        $misi->save();

        return back()->with('status', 'Misi has been created');
    }

    public function storeVisi(Request $request)
    {
        $request->validate([
            'vission' => 'required',
        ]);

        $about = About::first();

        $visi = new Vision();
        $visi->about_id = $about->id;
        $visi->vission = $request->vission;
        $visi->save();

        return back()->with('status', 'visi has been created');
    }

    public function updateMisi(Request $request)
    {
        $request->validate([
            'mission' => 'required',
        ]);

        $misi = Mision::find($request->id);
        $misi->mission = $request->mission;
        $misi->save();

        return back()->with('status', 'Misi has been updated');

    }

    public function updateVisi(Request $request)
    {
        $request->validate([
            'vission' => 'required',
        ]);

        $visi = Vision::find($request->id);
        $visi->vission = $request->vission;
        $visi->save();

        return back()->with('status', 'visi has been updated');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'company_name' => 'required',
            'description' => 'required',    
            'company_address' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_map' => 'required',
            'company_logo' => 'image|mimes:png,svg,jpg,jpeg,gif',
            'company_image' => 'image|mimes:png,svg,jpg,jpeg,gif',
        ]);

        $about = About::first();
        $about->company_name = $request->company_name;
        $about->description = $request->description;
        $about->company_address = $request->company_address;
        $about->company_email = $request->company_email;
        $about->company_phone = $request->company_phone;
        $about->company_map = $request->company_map;

        if($request->hasFile('company_logo')){
            $file = $request->file('company_logo');
            $filename = $about->company_name."_logo_".$file->getClientOriginalName();
            $file->move(public_path('img-about'), $filename);
            $about->company_logo = $filename;
        }

        if($request->hasFile('company_image')){
            $file = $request->file('company_image');
            $filename = $about->company_name."_image_".$file->getClientOriginalName();
            $file->move(public_path('img-about'), $filename);
            $about->company_image = $filename;
        }

        $about->save();
        return redirect('about')->with('status', 'About has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $about = About::first();
        $about->delete();
        return redirect('about')->with('status', 'About has been deleted');
    }

    public function destroyMisi(Request $request)
    {
        $misi = Mision::find($request->id);
        $misi->delete();
        return back()->with('status', 'Misi has been deleted');
    }

    public function destroyVisi(Request $request)
    {
        $visi = Vision::find($request->id);
        $visi->delete();
        return back()->with('status', 'Visi has been deleted');
    }
}
