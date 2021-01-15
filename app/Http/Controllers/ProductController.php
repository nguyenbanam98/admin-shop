<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();


        return view('fontend.page.products.detail', compact('product'));
    }

    // public function topProducts()
    // {

    // }
}
