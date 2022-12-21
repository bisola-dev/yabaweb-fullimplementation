<?php

namespace App\Http\Middleware;
use Session;
use Auth;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class checklogin
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
        $vao2=Session::get('admail');
        $vao3=Session::get('hpazz');

      if(User::where('admail','=', $vao2)->where('hpazz', '=',  $vao3)->get()->first()){
           return $next($request);
       }
         return back()->witherrors('please browse site appropriately');
    }
}
