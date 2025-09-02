<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcoupon = Coupon::latest()->get();
        return view('backend.pages.coupon.index', compact('allcoupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'coupon_name' => 'required|string|unique:coupons,coupon_name',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        // Create the coupon
        Coupon::create([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => $request->status ? $request->status : '1',
            'created_at' => now(),
        ]);
        // Show a success message
        notyf()->success('coupon created successfully.');
        return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.pages.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validate the request
        $request->validate([
            'coupon_name' => 'required|string|unique:coupons,coupon_name,' . $id,
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        // update the coupon
        Coupon::findOrFail($id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'status' => $request->status ? $request->status : 0,
            'updated_at' => now(),
        ]);

        // Show a success message
        notyf()->info('coupon updated successfully.');
        return to_route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the slider
        Coupon::findOrFail($id)->delete();

        // Show a success message
        notyf()->warning('coupon deleted successfully.');
        return to_route('admin.coupon.index');
    }



    /**
     * product status change
     */
    public function couponStatus(Request $request)
    {
        // find a coupon
        $coupon = Coupon::findOrFail($request->id);

        if ($coupon->status == '1') {
            $coupon->update([
                'status' => '0',
            ]);
            return response()->json(['deactive' => 'Coupon Deactive successfully!']);
        } else {
            $coupon->update([
                'status' => '1',
            ]);
            return response()->json(['active' => 'Coupon Active successfully!']);
        }
    }
}
