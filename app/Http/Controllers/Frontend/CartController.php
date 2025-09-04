<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
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
     * getCartProduct
     */
    public function getCartProduct(Request $request)
    {
        // Retrieve the cart products
    }

    /**
     * removeCartProduct
     */
    public function removeCartProduct(Request $request)
    {
        // Remove the product from the cart
    }

    /**
     * updateCartProduct
     */
    public function updateCartProduct(Request $request)
    {
        // Update the cart product quantity
    }
}
