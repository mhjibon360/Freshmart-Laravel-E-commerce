<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allsubcategory = Subcategory::with('category')->latest()->get();
        return view('backend.pages.subcategory.index', compact('allsubcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory = Category::all();
        return view('backend.pages.subcategory.create', compact('allcategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        // Create the subcategory
        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('subcategory created successfully.');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $allcategory = Category::all();
        return view('backend.pages.subcategory.edit', compact(['subcategory', 'allcategory']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);



        // update the subcategory
        Subcategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('subcategory updated successfully.');
        return to_route('admin.product-subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        Subcategory::findOrFail($id)->delete();

        // Show a success message
        notyf()->warning('subcategory deleted successfully.');
        return to_route('admin.product-subcategory.index');
    }
}
