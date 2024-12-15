<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        DB::listen(function ($query) {
            
            info(sprintf(
                '%s %s',
                $query->sql,
                json_encode($query->bindings)
            ), [
                'time' => $query->time,
            ]);
            
        });
    }
}
