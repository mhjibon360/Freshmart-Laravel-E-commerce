<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alladvertisement = Ads::latest()->get();
        return view('backend.pages.advertisement.index', compact('alladvertisement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'heading' => 'required',
            'discount_title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/advertisement/" . $filename;
            $file->move(public_path('upload/advertisement/'), $filename);
        }

        // Create the advertisement
        Ads::create([
            'discount_title' => $request->discount_title,
            'heading' => $request->heading,
            'image' => $photourl,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        // Show a success message
        notyf()->success('advertisement created successfully.');
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
        $advertisement = Ads::findOrFail($id);
        return view('backend.pages.advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the advertisement
        $advertisement = Ads::findOrFail($id);

        // Validate the request
        $request->validate([
            'heading' => 'required',
            'discount_title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/advertisement/" . $filename;
            $file->move(public_path('upload/advertisement/'), $filename);
            // Update the advertisement's image
            if (file_exists($advertisement->image)) {
                unlink($advertisement->image);
            }
        }

        // Create the advertisement
        $advertisement->update([
            'discount_title' => $request->discount_title,
            'heading' => $request->heading,
            'image' => isset($photourl) ? $photourl : $advertisement->image,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('advertisement updated successfully.');
        return to_route('admin.advertisement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the advertisement
        $advertisement = Ads::findOrFail($id);

        // Update the advertisement's image
        if (file_exists($advertisement->image)) {
            unlink($advertisement->image);
        }
        // Delete the advertisement
        $advertisement->delete();

        // Show a success message
        notyf()->warning('advertisement deleted successfully.');
        return to_route('admin.advertisement.index');
    }

    /**
     * advertisement status change
     */
    public function changeStatus(Request $request)
    {

        $advertisement = Ads::findOrFail($request->id);
        $advertisement->status = $request->status;
        $advertisement->save();

        return response()->json(['success' => 'advertisement updated successfully!']);
    }
}
