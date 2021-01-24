<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Services\ProcessViewService;

class ProductController extends Controller
{
    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        ProcessViewService::view('products', 'view', 'product', $product->id);

        return view('fontend.page.products.detail', compact('product'));
    }

}
