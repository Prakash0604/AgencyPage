<?php

namespace App\Providers;

use App\Models\frontend;
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
        View::composer(['header','footer'],function($view){
            $setting=frontend::first();
            $view->with([
                'email'=>$setting->contact_us_email ?? '',
                'address'=>$setting->contact_us_address ?? '',
                'contact'=>$setting->contact_us_number ?? '',
            ]);
        });
    }
}
