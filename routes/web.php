<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\IpBlock;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

Route::get('/login',action: [BlogController::class,'home'])->name(name: 'login');

Route::middleware(['web','ipblock:you have no access,127.0.0.1'])->group(function (){

    Route::get('/',[BlogController::class,'home'])->name('home');


    // auth, guest , throttle

    Route::get('/trash',[BlogController::class,'trash'])->name('trash')->middleware('throttle:5,1');

    Route::delete('/blogs-force-destroy/{blog}',[BlogController::class,'forceDestroy'])->name('blogs.force.destroy');
    
    Route::resource('/blogs',BlogController::class);
    
    Route::resource('/articles',ArticleController::class);
    Route::delete('/articles-force-destroy/{article}',[ArticleController::class,'forceDestroy'])->name('articles.force.destroy');

    Route::post('/article-comments/store',[ArticleController::class,'commentStore'])->name('articles.comments.store');


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
