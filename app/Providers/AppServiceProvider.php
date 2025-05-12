<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\frontend;
use App\Models\WorkingDay;
use Illuminate\Pagination\Paginator;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
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
        View::composer(['User.layout.header', 'testhome', 'User.layout.main', 'User.layout.footer', 'User.contact', 'User.about'], function ($view) {
            $setting = Setting::first();

            $view->with([
                'email' => $setting->email ?? '',
                'address' => $setting->address ?? '',
                'contact' => $setting->contact ?? '',
                'description' => $setting->description ?? '',
                'about_us_description' => $setting->about_us_description ?? '',
                'footer_description' => $setting->footer_description ?? '',
                'logo' => $setting->logo ?? '',
                'work_description' => $setting->work_description ?? '',
                'facebook' => $setting->facebook_url ?? '',
                'twitter' => $setting->twitter_url ?? '',
                'instagram' => $setting->instagram_url ?? '',
                'github' => $setting->github_url ?? '',
                'footer_description'=>$setting->footer_description,
                'workdesc'=>WorkingDay::all(),

            ]);
        });

        // View::composer('*',  function ($view) {
        //     $routeName = Route::currentRouteName();
        //     $scripts = config('js-map.' . $routeName, []);

        //     $view->with('scripts', $scripts);
        // });

        Paginator::useBootstrapFive();
    }
}
