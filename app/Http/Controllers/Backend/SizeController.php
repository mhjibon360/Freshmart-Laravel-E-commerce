<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allsize = Size::latest()->get();
        return view('backend.pages.size.index', compact('allsize'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $request->validate([
            'size_name' => 'required|unique:sizes,size_name',
        ]);

        // Create the size
        Size::create([
            'size_name' => $request->size_name,
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('size created successfully.');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        return view('backend.pages.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request
        $request->validate([
            'size_name' => 'required|unique:sizes,size_name,' . $id,
        ]);

        // update the size
        Size::findOrFail($id)->update([
            'size_name' => $request->size_name,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('size updated successfully.');
        return to_route('admin.product-size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        Size::findOrFail($id)->delete();
        // Show a success message
        notyf()->warning('size deleted successfully.');
        return to_route('admin.product-size.index');
    }
}
