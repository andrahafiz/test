<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //jika name dari route tidak mengandung "mcs"
            if ($request->routeIs('mcs.*')) {
                return route('mcs.login');
                //jika name dari route tidak mengandung "r"
            } else if ($request->routeIs('rscm.*')) {
                return route('rscm.login');
            } else if ($request->routeIs('medco.*')) {
                return route('medco.login');
            } else {
                return route('customer.login');
            }
            // return route('warga.login');
        }
    }
}
