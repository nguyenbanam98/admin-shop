<?php

namespace App\Providers;

use App\Category;
use App\Components\Recusive;
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
        $recusive = new Recusive(Category::all());
        $htmlOptionSearchHeader = $recusive->handleRecusive($parentId = '');
        View::share('htmlOptionSearchHeader', $htmlOptionSearchHeader);

    }
}
