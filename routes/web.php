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

Route::get('/', 'HomeController@index')->name('homepage.home');
Route::get('category/{id}', 'HomeController@view')->name('homepage.view');
Route::get('product/{id}', 'HomeController@detail')->name('homepage.detail');
Route::get('/shop', 'HomeController@shop')->name('homepage.shop');

Route::get('/search', 'HomeController@search')->name('homepage.search');
Route::get('/', 'HomeController@index')->name('homepage.home');
Route::get('/logout', 'HomeController@index')->name('homepage.logout');
Route::get('/login', 'HomeController@login')->name('homepage.login');
Route::post('/login', 'HomeController@post_login')->name('homepage.login');




// //category
// Route::get('/category', 'CategoryController@index');
// Route::get('category-del-{id}', 'CategoryController@delete')->name('cate_del');
// Route::get('category-edit-{id}', 'CategoryController@edit')->name('cate_edit');

Route::get('admin/login','AdminController@login')->name('login');
Route::post('admin/login','AdminController@post_login')->name('login');

Route::group(['prefix' => 'admin','middleware'=>'auth'], function(){
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('admin/logout','AdminController@logout')->name('admin.logout ');
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'user' => 'UserController',
        'order' => 'OrderController',
    ]);

});

Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}', 'CartController@add')->name('cart.add');
    Route::get('view', 'CartController@view')->name('cart.view');
    Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'CartController@update')->name('cart.update');
    Route::get('clear', 'CartController@clear')->name('cart.clear');
});

Route::group(['prefix' => 'checkout'], function() {
    Route::get('/', 'CheckoutController@form')->name('checkout');
    Route::post('/', 'CheckoutController@submit_form')->name('checkout');
    // Route::get('/', 'CheckoutController@success')->name('checkout.success');
});
