<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
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
        Config::set([
            'payroll.rates' => [
                'epf' => 0.11,
                'socso' => 0.005,
                'eis' => 0.002,
                'epf_employer_low' => 0.13,
                'epf_employer_high' => 0.12,
                'socso_employer' => 0.0175,
                'eis_employer' => 0.002
            ]
        ]);
    }
}
