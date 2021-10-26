<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = ProductCategory::all();
        $subcategories = ProductSubcategory::all();

        if (request()->category) {
            $products = Product::with('subcategory')->whereHas('subcategory', function ($query) {
                $query->where('name', request()->category);
            });
            $categoryName = optional($subcategories->where('name', request()->category)->first())->name;
        } else {
            $products = Product::orderBy('created_at', 'desc');
            $categoryName = 'Featured';
        }

        if (request()->sort == 'low_price') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_price') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        // dd($products);
        return view('products', ['products' => $products, 'categoryName' => $categoryName, 'categories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = $product->comment()->orderBy('created_at', 'desc')->get();
        $category = $product->subcategory()->first();
        return view('singleProduct', ['product' => $product, 'comments' => $comments, 'category' => $category]);
    }

    /**
     * Display the specified resource for modal.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showModal(Product $product)
    {
        $comments = $product->comment()->orderBy('created_at', 'desc')->get();
        return response()->json(['product' => $product, 'comments' => $comments, 'success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
