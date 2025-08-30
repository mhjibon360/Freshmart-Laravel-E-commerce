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

    /**
     * Show the category page.
     *
     * @return \Illuminate\View\View
     */
    public function category()
    {
        return view('frontend.pages.category');
    }

    /**
     * Show the blog page.
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        return view('frontend.pages.blog');
    }

    /**
     * Show the blog details page.
     *
     * @return \Illuminate\View\View
     */
    public function blogdetails()
    {
        return view('frontend.pages.blog-details');
    }

    /**
     * Show the blog category page.
     *
     * @return \Illuminate\View\View
     */
    public function blogcategory()
    {
        return view('frontend.pages.blog-category');
    }

}
