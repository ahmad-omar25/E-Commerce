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

        // Logout Route
        Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
    });
});
