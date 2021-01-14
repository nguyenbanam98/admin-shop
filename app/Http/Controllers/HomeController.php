<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $categories = Category::latest()->get();

        $brands = Brand::where('active', 1)->latest()->get();

        $products = Product::where('active', 1)->latest()->take(9)->get();

        $dataView = [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $products,
        ];
        return view('fontend.page.home.index', $dataView);
    }
}
