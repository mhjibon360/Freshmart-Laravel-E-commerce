<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.pages.index');
    }

    /**
     * Show the product details page.
     *
     * @return \Illuminate\View\View
     */
    public function productDetails()
    {
        return view('frontend.pages.product-details');
    }

    /**
     * Show the shop page.
     *
     * @return \Illuminate\View\View
     */
    public function shop()
    {
        return view('frontend.pages.shop');
    }

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
     * Show the checkout page.
     *
     * @return \Illuminate\View\View
     */
    public function checkout()
    {
        return view('frontend.pages.checkout');
    }
}
