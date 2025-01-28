<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->input('url');

        // in case url is not numeric go to homepage
        if (isset($url)) {
            if (is_null($url) || is_numeric($url)) {
                return redirect('/')->with("error","Introduce una url valida");
            }
        }
        return $next($request);
    }
}
