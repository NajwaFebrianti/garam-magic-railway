<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::active()->orderBy('id')->get();
        return view('products.index', compact('products'));
    }

    public function show(string $slug)
    {
        $product = Product::active()->where('slug', $slug)->firstOrFail();
        $others = Product::active()->where('id', '!=', $product->id)->get();
        return view('products.show', compact('product', 'others'));
    }
}
