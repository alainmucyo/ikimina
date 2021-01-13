<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;


class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer(['layouts.app', 'layouts.president', 'statistics.index', 'statistics.accountant', 'welcome'], function (View $view) {
            $app_name = auth()->user() ? auth()->user()->cooperative->name : 'IBIMINA';
            $view->with('app_name', $app_name);
        });

    }
}
