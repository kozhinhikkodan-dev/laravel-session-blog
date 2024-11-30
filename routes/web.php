<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/',[BlogController::class,'home'])->name('home');

Route::resource('/blogs',BlogController::class);
