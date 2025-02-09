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
        // Depurar el valor recibido
        if (!$request->has('img_url')) {
            return redirect('/')->with('error', 'El campo image_url no está presente.');
        }
    
        if (!$this->isValidUrl($request->img_url)) {
            return redirect('/')->with('error', 'La URL no es correcta.');
        }
    
        return $next($request);
    }

    private function isValidUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }
}
