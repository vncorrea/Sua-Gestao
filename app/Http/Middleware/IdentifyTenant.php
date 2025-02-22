<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
// app/Http/Middleware/IdentifyTenant.php
    public function handle($request, Closure $next)
    {
        $domain = $request->getHost();

        $tenant = Tenant::where('domain', $domain)->firstOrFail();

        config(['database.connections.pgsql.search_path' => "tenant_{$tenant->id}"]);
        DB::purge('pgsql');
        DB::reconnect();

        return $next($request);
    }
}
