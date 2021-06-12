<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// back-end
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth.web',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'AdminController@index')->name('index');
    
    // category
    Route::group([
        'prefix' => 'category',
        'as' => 'categories.',
    ], function () {
        Route::get('/', 'AdminCategoryController@index')->middleware('can:category-list')->name('index');
        Route::get('/create', 'AdminCategoryController@create')->middleware('can:category-add')->name('create');
        Route::post('/store', 'AdminCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->middleware('can:category-edit')->name('edit');
        Route::post('/update/{id}', 'AdminCategoryController@update')->name('update');
        Route::get('/delete/{id}', 'AdminCategoryController@delete')->middleware('can:category-delete')->name('delete');
    });

     // product
     Route::group([
        'prefix' => 'product',
        'as' => 'products.',
    ], function () {
        Route::get('/', 'AdminProductController@index')->name('index');
        Route::get('/create', 'AdminProductController@create')->name('create');
        Route::get('/remove', 'AdminProductController@removeProduct')->name('remove');
        Route::get('/search', 'AdminProductController@search')->name('search');
        Route::post('/store', 'AdminProductController@store')->name('store');
        Route::get('/edit/{id}', 'AdminProductController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminProductController@update')->name('update');
        Route::get('/restore/{id}', 'AdminProductController@restore')->name('restore');
        Route::get('/delete/{id}', 'AdminProductController@delete')->name('delete');
        Route::get('/kill/{id}', 'AdminProductController@kill')->name('kill');
        Route::get('/{action}/{id}', 'AdminProductController@action')->name('action');
    });

    // Slider

    Route::group([
        'prefix' => 'sliders',
        'as' => 'sliders.',
    ], function () {
        Route::get('/', 'AdminSliderController@index')->name('index');
        Route::get('/create', 'AdminSliderController@create')->name('create');
        Route::post('/store', 'AdminSliderController@store')->name('store');
        Route::get('/edit/{id}', 'AdminSliderController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminSliderController@update')->name('update');
        Route::get('/delete/{id}', 'AdminSliderController@delete')->name('delete');
    });

    // User
    Route::group([
        'prefix' => 'user',
        'as' => 'users.',
    ], function () {
        Route::get('/', 'AdminUserController@index')->name('index');
        Route::get('/create', 'AdminUserController@create')->name('create');
        Route::post('/store', 'AdminUserController@store')->name('store');
        Route::get('/edit/{id}', 'AdminUserController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminUserController@update')->name('update');
        Route::get('/delete/{id}', 'AdminUserController@delete')->name('delete');
    });

    // Brands
    Route::group([
        'prefix' => 'brands',
        'as' => 'brands.',
    ], function () {
        Route::get('/', 'AdminBrandController@index')->name('index');
        Route::get('/create', 'AdminBrandController@create')->name('create');
        Route::post('/store', 'AdminBrandController@store')->name('store');
        Route::get('/edit/{id}', 'AdminBrandController@edit')->name('edit');
        Route::post('/update/{id}', 'AdminBrandController@update')->name('update');
        Route::get('/delete/{id}', 'AdminBrandController@delete')->name('delete');
        Route::get('/{action}/{id}', 'AdminBrandController@action')->name('action');
    });

     // Transaction
     Route::group([
        'prefix' => 'transaction',
        'as' => 'transactions.',
    ], function () {
        Route::get('/', 'AdminTransactionController@index')->name('index');
        Route::get('/create', 'AdminTransactionController@create')->name('create');
        // Route::post('/store', 'AdminTransactionController@store')->name('store');
        Route::get('/show/{id}', 'AdminTransactionController@view')->name('view');
        // Route::post('/update/{id}', 'AdminTransactionController@update')->name('update');
        Route::get('/delete/{id}', 'AdminTransactionController@delete')->name('delete');
        Route::get('/delete-order/{id}', 'AdminTransactionController@deleteOrder')->name('delete.order');
        Route::get('/{action}/{id}', 'AdminTransactionController@action')->name('action');
    });
});

// Auth admin
Route::group([
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/admin/dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('/admin/dang-nhap', 'LoginController@postLogin')->name('post.login');
    Route::get('admin/dang-xuat', 'LoginController@logout')->name('get.logout');
});
