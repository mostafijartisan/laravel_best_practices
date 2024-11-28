<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Log;
use DB;

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
    public function boot(Request $request): void
    {
        // test purpose
        Log::channel('daily')->info(PHP_EOL);
        Log::channel('daily')->info('New ===================================================================');
        Log::channel('daily')->info($request->url());
        DB::listen(function ($query) {
            Log::channel('daily')->info('--- db query ---------');
            Log::channel('daily')->info('sql : '. $query->sql); // the query being executed
            Log::channel('daily')->info('time : '. $query->time . ' ms'); // query time in milliseconds
        });
    }
}
