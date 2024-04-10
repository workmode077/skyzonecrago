<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Admin\Entities\GeneralSettings;

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
        Schema::defaultStringLength(191);
        View::composer('admin::layouts.header', function($view) {
            $generalSettings = GeneralSettings::first();
          $view->with(compact('generalSettings'));
        });
        View::composer('admin::layouts.master', function($view) {
            $generalSettings = GeneralSettings::first();
          $view->with(compact('generalSettings'));
        });
    }
}
