<?php

namespace App\Helpers\SettingHelper\src\Http\Controllers;


use Illuminate\Support\Facades\Route;

Route::get('setting/{name}',[SettingController::class,'get'])->name('getSetting');
