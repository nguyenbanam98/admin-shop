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

    // Menu
    Route::group([

        'prefix' => 'menu',
        'as' => 'menus.',

    ], function () {

        Route::get('/', 'AdminMenuController@index')->name('index');

        Route::get('/create', 'AdminMenuController@create')->name('create');

        Route::post('/store', 'AdminMenuController@store')->name('store');

        Route::get('/edit/{id}', 'AdminMenuController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminMenuController@update')->name('update');

        Route::get('/delete/{id}', 'AdminMenuController@delete')->name('delete');

    });


    // tag
    Route::group([

        'prefix' => 'tag',
        'as' => 'tags.',

    ], function () {

        Route::get('/', 'AdminTagController@index')->name('index');

        Route::get('/create', 'AdminTagController@create')->name('create');

        Route::post('/store', 'AdminTagController@store')->name('store');

        Route::get('/edit/{id}', 'AdminTagController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminTagController@update')->name('update');

        Route::get('/delete/{id}', 'AdminTagController@delete')->name('delete');

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


    // Settings

    Route::group([

        'prefix' => 'settings',
        'as' => 'settings.',

    ], function () {

        Route::get('/', 'AdminSettingController@index')->name('index');

        Route::get('/create', 'AdminSettingController@create')->name('create');

        Route::post('/store', 'AdminSettingController@store')->name('store');

        Route::get('/edit/{id}', 'AdminSettingController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminSettingController@update')->name('update');

        Route::get('/delete/{id}', 'AdminSettingController@delete')->name('delete');

    });

    // // user
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

    // Roles

    Route::group([

        'prefix' => 'roles',
        'as' => 'roles.',

    ], function () {

        Route::get('/', 'AdminRoleController@index')->name('index');

        Route::get('/create', 'AdminRoleController@create')->name('create');

        Route::post('/store', 'AdminRoleController@store')->name('store');

        Route::get('/edit/{id}', 'AdminRoleController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminRoleController@update')->name('update');

        Route::get('/delete/{id}', 'AdminRoleController@delete')->name('delete');

    });

    // Permission
    Route::group([

        'prefix' => 'permissions',
        'as' => 'permissions.',

    ], function () {

        Route::get('/', 'AdminPermissionController@index')->name('index');

        Route::get('/create', 'AdminPermissionController@create')->name('create');

        Route::post('/store', 'AdminPermissionController@store')->name('store');

        Route::get('/edit/{id}', 'AdminPermissionController@edit')->name('edit');

        Route::post('/update/{id}', 'AdminPermissionController@update')->name('update');

        Route::get('/delete/{id}', 'AdminPermissionController@delete')->name('delete');

    });


});

// Auth admin

Route::group([
    'namespace' => 'Admin',

], function () {
    Route::get('/admin/dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('/admin/dang-nhap', 'LoginController@postLogin')->name('post.login');
    
    Route::get('admin/dang-xuat', 'LoginController@logout')->name('get.logout');

});


