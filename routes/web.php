<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

Route::get('/',[BlogController::class,'home'])->name('home');

Route::get('/trash',[BlogController::class,'trash'])->name('trash');
Route::delete('/blogs-force-destroy/{blog}',[BlogController::class,'forceDestroy'])->name('blogs.force.destroy');

Route::resource('/blogs',BlogController::class);

Route::get('switch-lang/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->route('home');
})->name('lang');