<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {
        Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'guest:admin'], function () {
            Route::get('login', 'Auth\LoginController@showAdminLoginForm');
            Route::get('register', 'Auth\RegisterController@showAdminRegisterForm');
            Route::post('login', 'Auth\LoginController@adminLogin')->name('admin.login');
            Route::post('register', 'Auth\RegisterController@createAdmin')->name('admin.register');

        });
    });

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard', 'middleware' => 'auth:admin'], function () {

        // Homepage Route
        Route::get('/', 'HomeController@index')->name('admin.dashboard');

        // User Profile Routes
        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@edit')->name('edit.profile');
            Route::put('update', 'ProfileController@update')->name('update.profile');
        });

        // Settings Routes
        Route::group(['prefix' => 'settings'], function () {
            Route::get('shipping-methods/{type}', 'SettingController@editShippingMethods')->name('shipping.edit.methods');
            Route::put('shipping-methods/{id}', 'SettingController@updateShippingMethods')->name('shipping.update.methods');
        });

        // Main Categories Routes
        Route::resource('main_categories', 'MainCategoryController');

        // SubCategories Routes
        Route::resource('brands', 'BrandController');

        // Brands Routes
        Route::resource('sub_categories', 'SubCategoryController');

        // Tags Routes
        Route::resource('tags', 'TagController');

        // Products Routes
        Route::resource('products', 'ProductController');
        // Product Price
        Route::get('price/{id}', 'ProductController@getPrice')->name('admin.product.price');
        Route::post('price', 'ProductController@storePrice')->name('admin.product.price.store');
        // Product Stock
        Route::get('stock/{id}', 'ProductController@getStock')->name('admin.product.stock');
        Route::post('stock', 'ProductController@storeStock')->name('admin.product.stock.store');
        // Product Images
        Route::get('images/{id}', 'ProductController@getImages')->name('admin.product.images');
        Route::post('images', 'ProductController@storeImages')->name('admin.product.images.store');
        Route::post('images/db', 'ProductController@storeImagesDb')->name('admin.product.images.store.db');

        // Attributes Routes
        Route::resource('attributes', 'AttributeController');

        // Logout Route
        Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
    });
});
