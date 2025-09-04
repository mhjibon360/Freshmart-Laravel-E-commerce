<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ads;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class FrontendController extends Controller
{
    /**
     * Show the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $allsliders = Slider::where('status', 1)->get();
        $featured_categorys = Category::where('featured_category', 1)->get();
        $ads = Ads::where('status', 1)->get();
        $popularproducts = Product::with('category')->where('status', 1)->where('popular_products', 1)->take(10)->get();
        $bestproducts = Product::with('category')->where('status', 1)->where('best_sells', 1)->take(3)->get();
        $allservices = Service::get();

        return view('frontend.pages.index', compact(['allsliders', 'featured_categorys', 'ads', 'popularproducts', 'bestproducts', 'allservices']));
    }

    /**
     * Show the product details page.
     *
     * @return \Illuminate\View\View
     */
    public function productDetails($id, $slug)
    {
        $product = Product::with(['category', 'subcategory', 'colors', 'sizes'])->find($id);
        $relatedproduct = Product::with(['category', 'subcategory', 'colors', 'sizes'])->where('status', 1)->where('category_id', $product->category_id)->where('id', '!=', $id)->take(10)->get();
        return view('frontend.pages.product-details', compact(['product', 'relatedproduct']));
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
     * Show the compare page.
     *
     * @return \Illuminate\View\View
     */
    public function compare()
    {
        return view('frontend.pages.compare');
    }
}
