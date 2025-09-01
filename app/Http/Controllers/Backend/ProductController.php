<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Multiimage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allproduct = Product::latest()->get();
        return view('backend.pages.product.index', compact('allproduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allcategory = Category::all();
        $allsubcategory = Subcategory::all();
        $allsize = Size::all();
        $allcolor = Color::all();
        return view('backend.pages.product.create', compact(['allcategory', 'allsubcategory', 'allsize', 'allcolor']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'nullable',
            'product_name' => 'required|unique:products,product_name',
            'product_code' => 'required|unique:products,product_code',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = hexdec(uniqid()) . $file->getClientOriginalName();
            $photourl = "upload/product/thumbnail/" . $filename;
            $file->move(public_path('upload/product/thumbnail'), $filename);
        }

        $product = Product::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'thumbnail' =>  $photourl,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'quantity' => $request->quantity,
            'product_code' => $request->product_code,
            'details' => $request->details,
            'informations' => $request->informations,
            'popular_products' => $request->popular_products ? $request->popular_products : 0,
            'best_sells' => $request->best_sells ? $request->best_sells : 0,
            'type' => $request->type,
            'status' => $request->status,
            'created_at' => now(),
        ]);

        // multiple image upload
        if ($request->hasFile('photo_name')) {
            foreach ($request->file('photo_name') as $photo) {
                $photoname = hexdec(uniqid()) . $photo->getClientOriginalName();
                $photourl = "upload/product/multiple-image/" . $photoname;
                $photo->move(public_path('upload/product/multiple-image'), $photoname);
                Multiimage::create([
                    'product_id' => $product->id,
                    'photo_name' => $photourl,
                ]);
            }
        }

        // if get size store size with pivot table data
        if ($request->size) {
            $product->sizes()->attach($request->size);
        }

        // if get color store color with pivot table data
        if ($request->color) {
            $product->colors()->attach($request->color);
        }

        notyf()->success('Product added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // unlink image
        if (file_exists($product->thumbnail)) {
            unlink($product->thumbnail);
        }

        // multi image delete and unlink
        $multiimage = Multiimage::where('product_id', $id)->get();
        foreach ($multiimage as $image) {
            if (file_exists($image->photo_name)) {
                unlink($image->photo_name);
            }
            //delete multi image
            $image->delete();
        }

        // delete pivot color
        $product->colors()->detach();

        // delete pivot size
        $product->sizes()->detach();

        // delete product
        $product->delete();

        notyf()->success('Product deleted successfully!');
        return back();
    }

    /**
     * Get subcategory by category id
     */
    public function getsubcategory(Request $request)
    {
        $allsubcategory = Subcategory::where('category_id', $request->category_id)->get();
        return response()->json($allsubcategory);
    }


    /**
     * product status change
     */
    public function productstatus(Request $request)
    {

        // return ($request->all());

        $product = Product::findOrFail($request->id);

        if ($product->status == 1) {
            $product->update([
                'status' => 0,
            ]);
            return response()->json(['deactive' => 'Product Deactive successfully!']);
        } else {
            $product->update([
                'status' => 1,
            ]);
            return response()->json(['active' => 'Product Active successfully!']);
        }
    }
}
