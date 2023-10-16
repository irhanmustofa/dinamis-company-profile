<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $tipe = 'static')
    {
        $hero = Hero::where('tipe', $tipe)->first();
        $hero = [
            'hero' => $hero
        ];
        return view('admin.hero', $hero);
        // return view('admin.hero', $hero);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public static function quickRandom($length = 8)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'sub_judul' => 'required',
            'link' => 'required',
            'gambar' => 'required'
        ]);
        $hero = new Hero;
        $hero->judul = $request->judul;
        $hero->sub_judul = $request->sub_judul;
        $hero->link = $request->link;
        $hero->tipe = 'static';
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $newName = $this->quickRandom(8) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $newName);
            $hero->gambar = $newName;
        }
        $hero->save();
        return redirect('hero/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $tipe = 'static')
    {
        $hero = Hero::where('tipe', $tipe)->first();
        $hero = [
            'hero' => $hero
        ];
        return view('admin.hero-edit', $hero);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $tipe = 'static')
    {
        $hero = Hero::where('tipe', $tipe)->first();
        $hero->judul = $request->judul;
        $hero->sub_judul = $request->sub_judul;
        $hero->link = $request->link;
        $hero->tipe = $tipe;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $hero->gambar = $filename;
        }
        $hero->save();
        return redirect('hero/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
