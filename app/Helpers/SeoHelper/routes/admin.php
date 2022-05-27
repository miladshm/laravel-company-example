<?php

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

use App\Helpers\SeoHelper\src\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;


Route::prefix(config('app.admin_url').'seo')->group(function () {
    Route::get('{type}/{id}/{module?}', [SeoController::class, 'seo']);
    Route::put('{id}/{module?}', [SeoController::class, 'storeSeo']);
});
