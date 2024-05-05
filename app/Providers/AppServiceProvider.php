<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en','uk', 'ru'])
                ->labels(['ua' => __('Ukraine')])
                ->flags([
                    'en' => asset('images/flags/us.svg'),
                    'uk' => asset('images/flags/ua.svg'),
                    'ru' => asset('images/flags/ru.svg'),
                ]);
        });
    }
}
