<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    /**
     * Show the wishlist page.
     *
     * @return \Illuminate\View\View
     */
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }
    /**
     * Show the wishlist product in ajax.
     *
     * @return \Illuminate\View\View
     */
    public function wishlistproducts()
    {
        $wishlists = Wishlist::with('product')->where('user_id', Auth::id())->get();
        return response()->json([
            'wishlists' => $wishlists,
            'wishlistcount' => count($wishlists),
        ]);
    }
    /**
     * Show the wishlist product in ajax.
     *
     * @return \Illuminate\View\View
     */
    public function topwishlistcounter()
    {
        $wishlists = Wishlist::with('product')->where('user_id', Auth::id())->get();
        return response()->json(count($wishlists));
    }


    /** add to wishlist */
    public function  addToWishlist(Request $request)
    {
        if (Auth::check()) {
            $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $request->id)->first();
            if ($wishlist) {
                return response()->json(['warning' => 'This item already on your wishlist']);
            } else {
                // add to wishlist
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->id, //this one product id
                    'created_at' => now(),
                ]);
                return response()->json(['success' => 'Item successfully added to wishlist!']);
            }
        } else {
            return response()->json(['error' => 'Please login to add to wishlist']);
        }
    }

    /**
     * remove wishlist
     */
    public function removeproductwishlist(Request $request)
    {
        Wishlist::where('id', $request->id)->delete();
        return response()->json('successfully remove to wishlist');
    }
}
