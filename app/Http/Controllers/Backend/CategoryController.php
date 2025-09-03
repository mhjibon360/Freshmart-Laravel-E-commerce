<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcategory = Category::latest()->get();
        return view('backend.pages.category.index', compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'category_name' => 'required',
            'image' => 'required',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/categorys/" . $filename;
            $file->move(public_path('upload/categorys/'), $filename);
        }

        // Create the category
        Category::create([
            'category_name' => $request->category_name,
            'category_image' => $photourl,
            'featured_category' => $request->featured_category ? '1' : '0',
            'footer_category' => $request->footer_category ? '1' : '0',
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('category created successfully.');
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
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the slider
        $categorys = Category::findOrFail($id);

        // Validate the request
        $request->validate([
            'category_name' => 'required',
            'image' => 'nullable',
        ]);


        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/categorys/" . $filename;
            $file->move(public_path('upload/categorys/'), $filename);
            // delete the category's image
            if (file_exists($categorys->category_image)) {
                unlink($categorys->category_image);
            }
        }

        // Create the category
        $categorys->update([
            'category_name' => $request->category_name,
            'category_image' => isset($photourl) ? $photourl : $categorys->category_image,
            'featured_category' => $request->featured_category ? '1' : '0',
            'footer_category' => $request->footer_category ? '1' : '0',
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('category updated successfully.');
        return to_route('admin.product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        $categorys = Category::findOrFail($id);

        // delete the category's image
        if (file_exists($categorys->category_image)) {
            unlink($categorys->category_image);
        }
        // Delete the category
        $categorys->delete();
        // Show a success message
        notyf()->warning('category deleted successfully.');
        return to_route('admin.product-category.index');
    }


    /**
     * featured category status
     */
    public function featuredCategoryStatus(Request $request)
    {

        $category = Category::findOrFail($request->id);
        $category->featured_category = $request->featured_category;
        $category->save();

        return response()->json(['success' => 'Featured category updated successfully!']);
    }

    /**
     * footer category status
     */
    public function footerCategoryStatus(Request $request)
    {

        $category = Category::findOrFail($request->id);
        $category->footer_category = $request->footer_category;
        $category->save();

        return response()->json(['success' => 'Footer category updated successfully!']);
    }
}
