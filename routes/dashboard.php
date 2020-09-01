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
        Route::get('/', 'HomeController@index')->name('admin.dashboard');
        Route::any('logout', 'Auth\LoginController@logout')->name('admin.logout');
    });
});
