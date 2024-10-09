<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCsrfToken
{
    /**
     * @var array
     */
    protected $except = [
        'webhook/whatsapp', // Add your webhook route here
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request path is in the $except array and bypass CSRF for those
        foreach ($this->except as $uri) {
            if ($request->is($uri)) {
                return $next($request); // Skip CSRF check for the excepted routes
            }
        }

        // Otherwise, proceed with normal CSRF check
        return $next($request);
    }
}
