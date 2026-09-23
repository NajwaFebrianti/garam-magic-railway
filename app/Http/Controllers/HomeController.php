<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::active()->orderBy('id')->get();
        return view('home', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function education()
    {
        return view('education');
    }

    public function faq()
    {
        return view('faq');
    }

    public function contact()
    {
        return view('contact');
    }
}
