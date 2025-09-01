<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allslider = Slider::latest()->get();
        return view('backend.pages.slider.index', compact('allslider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'heading' => 'required',
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/slider/" . $filename;
            $file->move(public_path('upload/slider/'), $filename);
        }

        // Create the slider
        Slider::create([
            'title' => $request->title,
            'heading' => $request->heading,
            'details' => $request->details,
            'image' => $photourl,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        // Show a success message
        notyf()->success('Slider created successfully.');
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
        $slider = Slider::findOrFail($id);
        return view('backend.pages.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the slider
        $slider = Slider::findOrFail($id);

        // Validate the request
        $request->validate([
            'heading' => 'required',
            'title' => 'required',
            'details' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/slider/" . $filename;
            $file->move(public_path('upload/slider/'), $filename);
            // Update the slider's image
            if (file_exists($slider->image)) {
                unlink($slider->image);
            }
        }

        // Create the slider
        $slider->update([
            'title' => $request->title,
            'heading' => $request->heading,
            'details' => $request->details,
            'image' => isset($photourl) ? $photourl : $slider->image,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('Slider updated successfully.');
        return to_route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        $slider = Slider::findOrFail($id);

        // Update the slider's image
        if (file_exists($slider->image)) {
            unlink($slider->image);
        }
        // Delete the slider
        $slider->delete();

        // Show a success message
        notyf()->warning('Slider deleted successfully.');
        return to_route('admin.slider.index');
    }

    /**
     * slider status change
     */
    public function changeStatus(Request $request)
    {

        $slider = Slider::findOrFail($request->id);
        $slider->status = $request->status;
        $slider->save();

        return response()->json(['success' => 'Slider updated successfully!']);
    }
}
