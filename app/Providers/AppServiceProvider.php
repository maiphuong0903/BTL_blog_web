<?php

namespace App\Providers;

use App\Models\Tutorial;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        if(!Schema::hasTable('tutorials')) return;

        $tutorials = Tutorial::get();
        View::share('tutorials', $tutorials);
    }
}
