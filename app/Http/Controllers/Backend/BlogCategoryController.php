<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allblogcategory = BlogCategory::latest()->get();
        return view('backend.pages.blogcategory.index', compact('allblogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.blogcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            // 'category_name' => 'required|string|unique:blog_categories,blogcategory_name',
        ]);

        // Create the blogcategory
        BlogCategory::create([
            'category_name' => $request->category_name,
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('Blog-category created successfully.');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.pages.blogcategory.edit', compact('blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request
        $request->validate([
            'category_name' => 'required|string|unique:blog_categories,category_name,' . $id,
        ]);

        // update the blogcategory
        BlogCategory::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('Blogcategory updated successfully.');
        return to_route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        BlogCategory::findOrFail($id)->delete();

        // Show a success message
        notyf()->warning('Blog-category deleted successfully.');
        return to_route('admin.blog-category.index');
    }
}
