<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allservice = Service::latest()->get();
        return view('backend.pages.service.index', compact('allservice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'heading' => 'required',
            'details' => 'required',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/services/" . $filename;
            $file->move(public_path('upload/services/'), $filename);
        }

        // Create the service
        Service::create([
            'icon' => $photourl,
            'heading' => $request->heading,
            'details' => $request->details,
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('service created successfully.');
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
        $service = Service::findOrFail($id);
        return view('backend.pages.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the slider
        $services = Service::findOrFail($id);

        // Validate the request
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
            'details' => 'required',
        ]);


        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/services/" . $filename;
            $file->move(public_path('upload/services/'), $filename);
            // delete the service's image
            if (file_exists($services->icon)) {
                unlink($services->icon);
            }
        }

        // Create the service
        $services->update([
            'icon' => isset($photourl) ? $photourl : $services->icon,
            'heading' => $request->heading,
            'details' => $request->details,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('service updated successfully.');
        return to_route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        $services = Service::findOrFail($id);

        // delete the service's image
        if (file_exists($services->icon)) {
            unlink($services->icon);
        }
        // Delete the service
        $services->delete();
        // Show a success message
        notyf()->warning('service deleted successfully.');
        return to_route('admin.services.index');
    }
}
