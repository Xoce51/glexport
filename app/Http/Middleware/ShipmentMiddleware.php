<?php

namespace App\Http\Middleware;

use Closure;

class ShipmentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $companyId = $request->get('company_id', null);
        if (is_null($companyId) && $request->isMethod('get')) {
            return (response(['errors' => ['company_id is required']], 422));
        }
        return $next($request);
    }
}
