<?php

namespace App\Http\Middleware;

use Closure;
use App\Crm\Converter;

class ConvertNumber
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
        if($request->phone)
        {           
            $converter = new Converter();
            $request->phone = $converter->convertNums($request->phone);
        }
       
        return $next($request);
    }
}
