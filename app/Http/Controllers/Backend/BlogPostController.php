<?php

namespace App\Http\Controllers\Backend;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblog = BlogPost::latest()->get();
        return view('backend.pages.blog.index', compact('allblog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory = BlogCategory::all();
        return view('backend.pages.blog.create', compact('allcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validate
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|unique:blog_posts,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details' => 'required'
        ]);

        // handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/blog/thumbnail/" . $filename;
            $file->move(public_path('upload/blog/thumbnail'), $filename);
        }

        // store data insert
        BlogPost::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image' =>  $photourl,
            'details' => $request->details,
            'status' => $request->status ? $request->status : '1',
            'created_at' => now(),
        ]);


        // notification
        notyf()->success('Blog added successfully');
        return back();
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
    public function edit(string $id)
    {
        $allcategory = BlogCategory::all();
        $blog = BlogPost::findOrFail($id);
        return view('backend.pages.blog.edit', compact(['allcategory', 'blog']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = BlogPost::findOrFail($id);

        // validate
        $request->validate([
            'category_id' => 'required',
            'title' => 'required|unique:blog_posts,title',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'details' => 'required'
        ]);

        // handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/blog/thumbnail/" . $filename;
            $file->move(public_path('upload/blog/thumbnail'), $filename);
            // unlink image
            if (file_exists($blog->image)) {
                unlink($blog->image);
            }
        }

        // update data
        $blog->update([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'image' =>  isset($photourl) ? $photourl : $blog->image,
            'details' => $request->details,
            'status' => $request->status ? $request->status : '1',
            'created_at' => now(),
        ]);

        // notification
        notyf()->success('Blog update successfully');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = BlogPost::findOrFail($id);
        // unlink image
        if (file_exists($blog->image)) {
            unlink($blog->image);
        }
        // delete blog
        $blog->delete();

        notyf()->success('Blog deleted successfully!');
        return back();
    }


    /**
     * blog status change
     */
    public function blogstatus(Request $request)
    {

        // return ($request->all());

        $blog = BlogPost::findOrFail($request->id);

        if ($blog->status == 1) {
            $blog->update([
                'status' => 0,
            ]);
            return response()->json(['deactive' => 'blog Deactive successfully!']);
        } else {
            $blog->update([
                'status' => 1,
            ]);
            return response()->json(['active' => 'blog Active successfully!']);
        }
    }
}
