<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Ads;
use App\Models\Size;
use App\Models\Color;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

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
    public function shop(Request $request)
    {

        // return($request->all());

        $allcategorys = Category::with('subcategories')->orderBy('category_name', 'asc')->get();
        $allcolors = Color::orderBy('color_name', 'asc')->get();
        $allsize = Size::orderBy('size_name', 'asc')->get();
        // QueryBuilder with filter
        $allshopproducts = QueryBuilder::for(Product::class)
            ->with(['category', 'subcategory', 'colors', 'sizes'])
            ->allowedFilters([
                AllowedFilter::exact('colors.id'),  // filter by color id
                AllowedFilter::exact('sizes.id'),   // filter by size id (optional)
                AllowedFilter::exact('category_id') // filter by category id (optional)
            ])
            ->when($request->price_min && $request->price_max, function ($query) use ($request) {
                $query->whereBetween('price', [$request->price_min, $request->price_max]);
            })
            ->where('status', 1)
            ->paginate(100);

        // return ($filterproducts);
        return view('frontend.pages.shop', compact(['allshopproducts', 'allcategorys', 'allcolors', 'allsize']));
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
    public function category($category_slug)
    {
        $category = Category::where('category_slug', $category_slug)->firstOrFail();
        $categoryproducts = Product::with(['category', 'subcategory', 'colors', 'sizes'])->where('status', 1)->where('category_id', $category->id)->paginate(15);
        return view('frontend.pages.category', compact(['category', 'categoryproducts']));
    }

    /**
     * Show the category page.
     *
     * @return \Illuminate\View\View
     */
    public function subcategory($subcategory_slug)
    {
        $subcategory = Subcategory::where('subcategory_slug', $subcategory_slug)->firstOrFail();
        $subcategoryproducts = Product::with(['category', 'subcategory', 'colors', 'sizes'])->where('status', 1)->where('subcategory_id', $subcategory->id)->paginate(15);
        return view('frontend.pages.subcategory', compact(['subcategory', 'subcategoryproducts']));
    }

    /**
     * Show the blog page.
     *
     * @return \Illuminate\View\View
     */
    public function blog()
    {
        $allblogs = BlogPost::with(['category', 'user'])->where('status', 1)->orderBy('id', 'asc')->paginate(10);
        // return($allblogs);
        return view('frontend.pages.blog', compact('allblogs'));
    }

    /**
     * Show the blog details page.
     *
     * @return \Illuminate\View\View
     */
    public function blogdetails($slug)
    {
        $blog = BlogPost::with(['category', 'user'])->where('slug', $slug)->first();
        return view('frontend.pages.blog-details', compact('blog'));
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
    /**
     * quick view modal
     */
    public function quickView(Request $request)
    {
        $product = Product::with(['category', 'subcategory', 'colors', 'sizes'])->find($request->id);
        return view('frontend.layouts.inc.quick-product-modal', compact('product'));
    }
}
