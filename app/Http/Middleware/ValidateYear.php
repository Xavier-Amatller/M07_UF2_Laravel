<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateYear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $year = $request->route('year');

        // in case year is not numeric go to homepage
        if(isset($year)){
            if(is_null($year) || !is_numeric($year)){
                  return redirect('/')->with("error", "Introduce un año valido");
            }
        }
        return $next($request);        
    }
}
