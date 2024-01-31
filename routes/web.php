<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('admin/dashboard','index')->name('dashboard');
    });
    Route::controller(CategoryController::class)->group(function (){
        Route::get('admin/allcategory','index')->name('allcategory');
        Route::get('admin/addcategory','create')->name('addcategory');
        Route::post('admin/storecategory','store')->name('storecategory');
        Route::delete('admin/deletecategory/{id}','destroy')->name('deletecategory');
        Route::get('admin/editcategory/{id}','edit')->name('editcategory');
        Route::put('admin/updatecategory/{category}','update')->name('updatecategory');
    });
    Route::controller(ProductController::class)->group(function (){
        Route::get('admin/allproduct','index')->name('allproduct');
        Route::get('admin/addproduct','create')->name('addproduct');
        Route::post('admin/storeproduct','store')->name('storeproduct');
        Route::delete('admin/deleteproduct/{id}','destroy')->name('deleteproduct');
        Route::get('admin/editproduct/{id}','edit')->name('editproduct');
        Route::put('admin/updateproduct/{product}','update')->name('updateproduct');
        Route::post('admin/searchproduct','search')->name('searchproduct');
    });
});


Route::controller(HomePageController::class)->group(function (){
    Route::get('/','index')->name('homepage');

    Route::get('contactus','contact')->name('contactus');
    Route::post('contactus','store')->name('storecontactus');

    Route::get('about','About')->name('about');

    Route::get('category','Category')->name('category');

    Route::get('product','Product')->name('product');

    Route::get('register','register')->name('userregister');
    Route::post('user/signup','signup')->name('usersignup');

    Route::get('subcategory/{id}','subcategory')->name('subcategory');

    Route::get('single-product/{id}','singleproduct')->name('single_product');

    Route::post('search','Search')->name('search');
});

Route::middleware(['auth'])->group(function (){
    Route::controller(HomePageController::class)->group(function (){
        Route::get('user','user')->name('user');
        Route::get('user/logout','userlogout')->name('userlogout');
        Route::get('cart','cart')->name('cart');
        Route::post('add-to-cart/{id}','AddToCart')->name('addtocart');
        Route::get('buynow{id}','BuyNow')->name('buynow');
        Route::delete('removefromcart/{id}','RemoveFromCart')->name('removefromcart');
        Route::get('shipping-address','GetShippingAddress')->name('shippingaddress');
        Route::post('storeorder','StoreOrder')->name('storeoreder');
    });
});

Route::controller(AuthController::class)->group(function (){
    Route::get('login','login')->name('login');
    Route::post('signin','signin')->name('signin');
    // logout Dashbord ...............................
    Route::get('admin/logout','logout')->name('logout');
});



// Route::get('test',function (){
//     User::create([
//         'name'=>'mohammad',
//         'email' =>'admin@gmail.com',
//         'password'=>'admin'
//     ]);
// });
