<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use auth, Session;

class Brand
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
        
         if(auth::user()->dashboard == 'brand'){
            if(auth::user()->email_verified_at == null){
                Session::flush();
                $request->session()->flash('error','Please verify your Email ID to access portal.');
                return redirect()->route('brand.login');
            }
            return $next($request);
        }
        return redirect()->route('admin.dashboard');
    }
}
