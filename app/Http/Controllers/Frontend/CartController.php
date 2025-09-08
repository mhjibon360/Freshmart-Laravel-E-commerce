<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{


    /**
     * Show the cart page.
     *
     * @return \Illuminate\View\View
     */
    public function cart()
    {
        return view('frontend.pages.cart');
    }

    /**
     * addToCart
     */
    public function addToCart(Request $request)
    {
        // find the product
        $product = Product::findOrFail($request->id);

        //product added on cart
        Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'qty' => $request->quantity ? $request->quantity : 1,
            'price' => $product->discount_price ? $product->discount_price : $product->price,
            'weight' => 0,
            'options' => [
                'size' => $request->size ? $request->size : '',
                'color' => $request->color ? $request->color : '',
                'image' => $product->thumbnail,
                'slug' => $product->slug,
            ]
        ]);

        return response()->json(['success' => 'Item successfully added to cart!']);

        // Validate and add the product to the cart
    }



    /**
     * get mini cart product
     */
    public function getminicartProduct(Request $request)
    {
        $carts = Cart::content();
        $Carttotal = Cart::total();
        $cartcount = Cart::count();
        return response()->json([
            'carts' => $carts,
            'Carttotal' => $Carttotal,
            'cartcount' => $cartcount,
        ]);
    }

    /**
     * getCartProduct
     */
    public function getCartProduct(Request $request)
    {
        $carts = Cart::content();
        $Carttotal = Cart::total();
        $cartcount = Cart::count();
        return response()->json([
            'carts' => $carts,
            'Carttotal' => $Carttotal,
            'cartcount' => $cartcount,
        ]);
    }

    /**
     * removeCartProduct
     */
    public function removeCartProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response()->json(['success' => 'Item successfully remove to cart!']);
    }

    /**
     * increment CartProduct
     */
    public function incrementCartProduct(Request $request)
    {
        Cart::update($request->rowId, Cart::get($request->rowId)->qty + 1);
        return response()->json(['success' => 'Item successfully inrement to cart!']);
    }

    /**
     * decrement CartProduct
     */
    public function decrementCartProduct(Request $request)
    {
        Cart::update($request->rowId, Cart::get($request->rowId)->qty - 1);
        return response()->json(['success' => 'Item successfully decrement to cart!']);
    }

    /**
     * cart clear
     */
    public function Cartclear(Request $request)
    {
        Cart::destroy();
        return response()->json(['success' => 'Cart successfully clear!']);
    }
}
