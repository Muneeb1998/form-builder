<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->query('locale');
        if ($locale && in_array($locale, ['en', 'de'])) {
            App::setLocale($locale);
        } else {
            // Optionally set a default locale if needed.
            App::setLocale(config('app.locale'));
        }

        return $next($request);
    }
}
