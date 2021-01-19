<?php

namespace App\Providers;

use App\Brand;
use App\Product;
use App\Category;
use App\Components\Recusive;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $recusive = new Recusive(Category::all());
        $htmlOptionSearchHeader = $recusive->handleRecusive($parentId = '');
        View::share('htmlOptionSearchHeader', $htmlOptionSearchHeader);

        $recusiveBrand = new Recusive(Brand::all());
        $htmlOptionBrandSearchHeader = $recusiveBrand->handleRecusive($parentId = '');
        View::share('htmlOptionBrandSearchHeader', $htmlOptionBrandSearchHeader);

        $topProducts = Product::where('active', 1)->where('hot', 1)->take(12)->get(['name', 'price', 'feature_image_path', 'slug']);
        View::share('topProducts', $topProducts);

    }
}
