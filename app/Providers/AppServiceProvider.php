<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
    //    $recusive = new Recusive(Category::all());
    //    $htmlOptionSearchHeader = $recusive->handleRecusive($parentId = '');
    //    View::share('htmlOptionSearchHeader', $htmlOptionSearchHeader);
    //    $topProducts = Product::where('active', 1)->where('hot', 1)->take(12)->get(['name', 'price', 'feature_image_path', 'slug']);
    //    View::share('topProducts', $topProducts);
    }
}
