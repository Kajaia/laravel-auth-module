<?php

namespace Modules\auth\app\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'auth');
    }
}