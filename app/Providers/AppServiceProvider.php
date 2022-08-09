<?php

namespace App\Providers;

use App\Model\TentangPerusahaan;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $tp = TentangPerusahaan::first();
        URL::forceScheme('https');
      // Sharing is caring
    //   dd($tp);
      View::share('tp', $tp);
    }
}
