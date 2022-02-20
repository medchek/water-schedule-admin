<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        if (env("APP_ENV") === "local") {

            DB::listen(function ($query) {
                Log::channel("stderr")->debug("RAN QUERY : ________________________________");

                Log::channel("stderr")->debug($query->sql);
                Log::channel("stderr")->debug($query->bindings);
                Log::channel("stderr")->debug($query->time);
                Log::channel("stderr")->debug("________________________________ END QUERY ________________________________");
            });
        }
    }
}
