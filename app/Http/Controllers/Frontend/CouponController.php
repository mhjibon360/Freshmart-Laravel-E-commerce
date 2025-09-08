<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponController extends Controller
{
    /**
     * apply couopn
     */
    public function couponapply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('status', 1)
            ->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();

        if ($coupon) {
            // Cart এর numeric total
            $cartTotal = (float) Cart::total(0, '', '');

            $discountAmount = $cartTotal * $coupon->coupon_discount / 100;
            $totalAfterDiscount = $cartTotal - $discountAmount;

            Session::put('coupon', [
                'coupon_name'     => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($discountAmount, 2),
                'total_amount'    => round($totalAfterDiscount, 2),
            ]);

            return response()->json(['success' => 'Coupon applied successfully!']);
        } else {
            return response()->json(['error' => 'Invalid or expired coupon!']);
        }
    }
}
