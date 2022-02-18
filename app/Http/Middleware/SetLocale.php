<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = 'id'; // set en as the fallback locale
        if ($request->is('/en/*')) { // if the route starts with /es/* set locale to EN
            $locale = 'en';
        }

        //set the derived locale
        App::setLocale($locale);
        
        return $next($request);
        // return $next($request);
    }
}
