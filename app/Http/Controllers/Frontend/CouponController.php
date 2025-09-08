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

    /**
     * coupon calculaiton data
     */
    public function couponcalculation(Request $request)
    {

        if (session::has('coupon')) {
            return response()->json([
                'yes_coupon' => true,
                'coupon_name' => Session()->get('coupon')['coupon_name'],
                'coupon_discount' => Session()->get('coupon')['coupon_discount'],
                'discount_amount' => Session()->get('coupon')['discount_amount'],
                'total_amount' => Session()->get('coupon')['total_amount'],
            ]);
        } else {
            return response()->json([
                'yes_coupon' => false,
                'total_amount' => Cart::total(),
            ]);
        }
    }
    /**
     * coupon remove
     */
    public function couponremove(Request $request)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return response()->json('Coupon remove successfully');
    }
}
