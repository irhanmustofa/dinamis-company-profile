<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();
        // dd($blogs);
        return view('admin.blog' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author = auth()->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $blog->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-blog'), $newName);
            $blog->image = $newName;
        }

        $blog->save();
        return redirect('blog')->with('status', 'Blog has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        return view('admin.blog-detail', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        return view('admin.blog-edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);

        $blog = Blog::where('id', $request->id)->first();
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->author = auth()->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newName = $blog->title . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img-blog'), $newName);
            $blog->image = $newName;
        }

        $blog->save();
        return redirect('blog')->with('status', 'Blog has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $blog = Blog::where('id', $request->id)->first();
        $blog->delete();
        return redirect('blog')->with('status', 'Blog has been deleted');
    }
}
