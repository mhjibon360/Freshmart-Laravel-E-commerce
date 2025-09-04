<?php

namespace App\Http\Controllers\Backend;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReviewImage;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // review message validate
        $request->validate([
            'message' => 'required',
        ]);
        // store review message
        $review = Review::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'message' => $request->message,
            'status' => '1',
            'created_at' => now(),
        ]);

        // store review image
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $url = "upload/review/" . $filename;
                $file->move(public_path('upload/review/'), $filename);
                ReviewImage::create([
                    'review_id' => $review->id,
                    'image' => $url,
                ]);
            }
        }
        // notification
        notyf()->success("Your review has been submitted successfully. Thank you for your feedback!");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
