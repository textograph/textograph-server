<?php

namespace App\Providers;

use Illuminate\Http\Request;
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
        Request::macro('filter', function (...$filters) {

            $filters = empty($filters) ? [null , ''] : $filters;
            
            return array_filter($this->all(), function($element) use ($filters) {
                return ! in_array($element, $filters, true);
            });

        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
