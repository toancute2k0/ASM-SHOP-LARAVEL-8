<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Runner\Hook;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;


Route::get('/', 'HomeController@index') -> name('home.index');
Route::get('/san-pham', 'HomeController@shop') -> name('home.shop');
Route::get('/bai-viet', 'HomeController@blog') -> name('home.blog');
Route::get('/tim-kiem', 'HomeController@search') -> name('home.search');
Route::get('/gioi-thieu', 'HomeController@about') -> name('home.about');
Route::get('/lien-he', 'ContactController@contact') -> name('home.contact');
Route::post('/lien-he', 'ContactController@postContact') -> name('home.contact');


Route::get('/cart', 'CartController@cart')->name('home.cart');
Route::get('/add-to-cart/{id}', 'CartController@addToCart')->name('add.to.cart');
Route::patch('/update-cart', 'CartController@update')->name('update.cart');
Route::delete('/remove-from-cart', 'CartController@remove')->name('remove.from.cart');
Route::delete('/remove-all-cart', 'CartController@removeAll')->name('remove.all.cart');

Route::group(['prefix' => 'checkout', 'middleware' => ['auth' => 'customer']], function (){
    Route::get('/', 'CheckOutController@checkout_form')->name('checkout');
    Route::post('/', 'CheckOutController@checkout_submit')->name('checkout');
    Route::get('/checkout-success', 'CheckOutController@checkout_success')->name('checkout.success');
});

// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth' => 'admin']], function () {
    Route::get('/', 'AdminController@dashboard') -> name('admin.dashboard');
    Route::get('/product/deleteimage/{id}', 'ImageController@destroy');
    Route::get('/logout', 'AdminController@logout') -> name('logout');
    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'banner' => 'BannerController',
        'account' => 'AccountController',
        'blog' => 'BlogController',
        'order' => 'OrderController',
        'user' => 'UserController',
    ]);

});

Route::get('/admin/login', 'Admin\AdminController@login') -> name('login');
Route::post('/admin/login', 'Admin\AdminController@postLogin') -> name('login');
Route::get('/login',['as'=>'admin.login','uses'=>'Admin\AdminController@login'])
    ->name('login');
Route::post('/login',['as'=>'admin.postLogin','uses'=>'Admin\AdminController@postLogin'])   ->name('login');
Route::get('/register',['as'=>'admin.register','uses'=>'Admin\AdminController@register'])->name('register');
Route::post('/register',['as'=>'admin.postRegister','uses'=>'Admin\AdminController@postRegister'])->name('register');
Route::get('/logout',['as'=>'admin.logout','uses'=>'Admin\AdminController@logout'])->name('logout');

Route::get('/{slug}', 'HomeController@view') -> name('view');
Route::get('bai-viet/{slug}', 'HomeController@getBlog') -> name('getBlog');



/**
    *GET => account.index => show list
    * GET => account.create => add
    * POST => account.store => when click submit
    * GET => account.show => show details
    * GET => account.edit => show form edit
    * PUT => account.update => when click form edit
    * DELETE => account.destroy => when delete
**/

