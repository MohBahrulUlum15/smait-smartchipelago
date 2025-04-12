<?php

namespace App\Providers;

use App\Models\DetailInformation;
use App\Models\VisiMisiTujuanMotto;
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
            $dataFooter = DetailInformation::first();
            $mottoInFooter = VisiMisiTujuanMotto::where('tipe', 'motto')->first();
            $view->with('dataFooter', $dataFooter);
            $view->with('mottoInFooter', $mottoInFooter);
        });
    }
}
