<?php

namespace App\Providers;

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
        //
        View::composer('*', function ($view) {
            $dataFooter = \App\Models\DetailInformation::first();
            $mottoInFooter = \App\Models\VisiMisiTujuanMotto::where('tipe', 'motto')->first();
            $view->with('dataFooter', $dataFooter);
            $view->with('mottoInFooter', $mottoInFooter);
        });
    }
}
