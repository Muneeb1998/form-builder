<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoadHelpers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Load common helpers
        // require_once app_path('Helpers/common_helper.php');

        // Load backend helpers for API requests
        require_once app_path('Helpers/helper.php');
        return $next($request);
    }
}
