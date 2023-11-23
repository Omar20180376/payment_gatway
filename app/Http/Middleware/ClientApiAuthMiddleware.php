<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientApiAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $access_token = $request->cookies->get('access_token');
        if ($access_token) {
            $request->headers->add([
                'Authorization' => "Bearer $access_token",
            ]);
        }

        return $next($request);
    }
}
