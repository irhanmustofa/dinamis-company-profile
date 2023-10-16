<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Hero;
use App\Models\Logo;
use App\Models\Team;
use App\Models\About;
use App\Mail\MailSend;
use App\Models\Client;
use App\Models\Mision;
use App\Models\Vision;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\Testimonial;
use App\Models\SocialSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $hero = Hero::where('tipe', 'static')->first();
        $logo = Logo::first();
        $services = Service::all();
        $about = About::all()->count() ? About::all()->first() : new About();
        $testimonials = Testimonial::all();
        $teams = Team::all();
        $socialSources = SocialSource::with('mediaSocial')->get();
        $clients = Client::all();

        return view('home.index', compact(
            'hero',
            'logo',
            'services',
            'about',
            'testimonials',
            'teams',
            'socialSources',
            'clients',
        ));
    }

    //ke halaman about
    public function about()
    {
        $hero = Hero::where('tipe', 'static')->first();
        $logo = Logo::first();
        $services = Service::all();
        $about = About::first();
        $testimonials = Testimonial::all();
        $teams = Team::all();
        $socialSources = SocialSource::with('mediaSocial')->get();
        $clients = Client::all();
        $misi = Mision::with('about')->get();
        $visi = Vision::with('about')->get();

        return view('home.about', compact(
            'hero',
            'logo',
            'services',
            'about',
            'testimonials',
            'teams',
            'socialSources',
            'clients',
            'misi',
            'visi'
        ));
    }

    //ke halaman service
    public function service($slug)
    {
        $logo = Logo::first();
        $services = Service::all();
        $about = About::first();
        $service = Service::where('slug', $slug)->first();
        $socialSources = SocialSource::with('mediaSocial')->get();
        $serviceItem = ServiceItem::where('service_id', $service->id)->get();

        return view('home.service', compact(
            'logo',
            'services',
            'about',
            'service',
            'socialSources',
            'serviceItem'
        ));
    }

    //ke halaman emailForm
    public function emailForm()
    {

        $logo = Logo::first();
        $services = Service::all();
        $about = About::first();
        $socialSources = SocialSource::with('mediaSocial')->get();

        return view('home.form-email', compact(
            'logo',
            'services',
            'about',
            'socialSources',
        ));
    }

    //ke halaman emailSend
    public function kirim(Request $request)
    {

        $data = [
            'nama' => $request->nama,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to("123lainlain@gmail.com")->send(new MailSend($data));
        
        // return back()->with('success', 'Thanks for contacting us!');
        return ("berhasil");
    }

    //ke halaman blog
    public function blog(Request $request)
    {
        $logo = Logo::first();
        $services = Service::all();
        $about = About::first();
        $socialSources = SocialSource::with('mediaSocial')->get();
        // $blog = Blog::paginate(5);
        // $bloglist = Blog::latest()->take(7)->get();

        if ($request->title) {
            $bloglist = Blog::where('title', 'like', "%" . $request->title . "%")->paginate(5);
            $blog = Blog::where('title', 'like', "%" . $request->title . "%")->paginate(5);
        }
        else{
            $blog = Blog::paginate(5);
            $bloglist = Blog::latest()->take(7)->get();
        }

        return view('home.blog', compact(
            'logo',
            'services',
            'about',
            'socialSources',
            'blog',
            'bloglist'
        ));
    }

    //ke halaman blogDetail
    public function blogDetail($id)
    {
        $logo = Logo::first();
        $services = Service::all();
        $about = About::first();
        $socialSources = SocialSource::with('mediaSocial')->get();
        $blog = Blog::find($id);
        $bloglist = Blog::latest()->take(7)->get();

        return view('home.blog-detail', compact(
            'logo',
            'services',
            'about',
            'socialSources',
            'blog',
            'bloglist'
        ));
    }
}
