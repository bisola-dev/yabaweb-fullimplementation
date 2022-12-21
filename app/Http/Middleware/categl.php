<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class categl
{ 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


 

    public function handle(Request $request, Closure $next)
    {     $vao=Session::get('categl');

        if($vao == '1')
        {
        return $next($request);
    }
   
    else{
 return back()->witherrors('you do no have access to view that page');
    }
}
}