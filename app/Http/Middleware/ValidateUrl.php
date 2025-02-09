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
        if (!$this->isValidUrl($request->image_url)) {
            return redirect('/')->with('error' , 'La url no es correcta.');
        }

        return $next($request);
    }

    private function isValidUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
