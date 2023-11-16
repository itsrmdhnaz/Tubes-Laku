<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheImages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    $response = $next($request);

    $contentTypes = ['image/svg+xml', 'image/png'];

    if ($response->isSuccessful() && in_array($response->headers->get('Content-Type'), $contentTypes)) {
        $response->headers->set('Cache-Control', 'public, max-age=86400'); // Mengatur cache selama 1 hari (86400 detik)
    }

    return $response;
}


}
