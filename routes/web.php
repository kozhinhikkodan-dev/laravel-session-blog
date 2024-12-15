<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

Route::middleware('web')->group(function (){

    Route::get('/',[BlogController::class,'home'])->name('home');

    Route::get('/trash',[BlogController::class,'trash'])->name('trash');
    Route::delete('/blogs-force-destroy/{blog}',[BlogController::class,'forceDestroy'])->name('blogs.force.destroy');
    
    Route::resource('/blogs',BlogController::class);
    
    Route::resource('/articles',ArticleController::class);
    Route::delete('/articles-force-destroy/{blog}',[ArticleController::class,'forceDestroy'])->name('articles.force.destroy');


    Route::get('switch-lang/{lang}', function ($lang) {
        Session::put('locale', $lang);
        return redirect()->route('home');
    })->name('lang');
    
    Route::get('/test-session', function () {
        session(['test_key' => 'test_value']);
        return session('test_key');
    });


							

    Route::post('/comments/store',[BlogController::class,'commentStore'])->name('comments.store');
    
});
