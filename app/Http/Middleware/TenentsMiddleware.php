<?php

namespace App\Http\Middleware;

use App\Facade\Tenants;
use App\Http\Service\TenantService;
use App\Models\Tenant;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TenentsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = request()->getHost();
        $tenant = Tenant::where('domain', $host)->first();
        if (!$tenant && $host == parse_url(env('APP_URL'), PHP_URL_HOST)) {
            return redirect('/admin');
        }
        Tenants::switchToTenant($tenant);

        return $next($request);
    }
}
