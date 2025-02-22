<?php

namespace App\Providers;

use App\Models\Domain;
use App\Models\Tenant;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('currentTenant', function ($app) {
            $request = $app->make('request');

            $host = $request->getHost();
            $parts = explode('.', $host);
            $subdomain = $parts[0];

            $domain = Domain::with('tenant')->where('tenant_id', $subdomain)
                ->first();

            if (!$domain) {
                throw new \Exception('Domínio não encontrado.');
            }

            return $domain->tenant;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
