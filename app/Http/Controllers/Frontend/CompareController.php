<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Compare;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CompareController extends Controller
{
    /** add to compare */
    public function  addTocompare(Request $request)
    {
        if (Auth::check()) {
            $compare = Compare::where('user_id', Auth::id())->where('product_id', $request->id)->first();
            if ($compare) {
                return response()->json(['warning' => 'This item already on your compare list']);
            } else {
                // add to wishlist
                Compare::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->id, //this one product id
                    'created_at' => now(),
                ]);
                return response()->json(['success' => 'Item successfully added to compare list!']);
            }
        } else {
            return response()->json(['error' => 'Please login to add to compare list']);
        }
    }
}
