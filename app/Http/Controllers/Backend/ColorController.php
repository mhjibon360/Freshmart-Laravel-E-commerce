<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcolor = Color::latest()->get();
        return view('backend.pages.color.index', compact('allcolor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'color_name' => 'required|unique:colors,color_name',
        ]);

        // Create the color
        Color::create([
            'color_name' => $request->color_name,
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('Color created successfully.');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color = Color::findOrFail($id);
        return view('backend.pages.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request
        $request->validate([
            'color_name' => 'required|unique:colors,color_name,' . $id,
        ]);

        // update the color
        Color::findOrFail($id)->update([
            'color_name' => $request->color_name,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('Color updated successfully.');
        return to_route('admin.product-color.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        Color::findOrFail($id)->delete();
        // Show a success message
        notyf()->warning('Color deleted successfully.');
        return to_route('admin.product-color.index');
    }
}
