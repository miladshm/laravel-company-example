<?php

namespace App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\SlideshowController;
use Illuminate\Support\Facades\Route;

Route::redirect('/',config('app.admin_url').'dashboard');
Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::resource('setting',SettingController::class)->only(['index','store']);
Route::resource('social', SocialNetworkController::class)->only(['store']);
Route::resource('contact-info', ContactInfoController::class);

Route::resource('post', BlogController::class);

Route::resource('category', CategoryController::class);
Route::post('category/{category}/move', [CategoryController::class, 'move']);

Route::resource('product', ProductController::class);

Route::resource('attribute', AttributeController::class);
Route::post('attribute/{attribute}/move', [AttributeController::class, 'move']);

Route::resource('attribute-product', AttributeProductController::class);
Route::get('get-options/{attribute}',[AttributeProductController::class,'getOptions'])->name('getOptions');


Route::resource('slideshow', SlideshowController::class);

Route::post('slideshow/{slideshow}/move', [SlideshowController::class, 'move']);

