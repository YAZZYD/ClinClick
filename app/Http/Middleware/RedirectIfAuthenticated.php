<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? ['admin','gerant','maintenancier','fournisseur'] : $guards;

        foreach ($guards as $guard) {
           
            if (Auth::guard($guard)->check()) {
        
                if($guard=='admin'){

                return redirect('/admin/dashboard');
            
            }elseif($guard == 'fournisseur'){
                
                return redirect('/fournisseur/dashboard');
               
            }elseif($guard == 'maintenancier'){
             
                return redirect('/maintenancier/dashboard');
             
            }elseif($guard == 'gerant'){
            
                return redirect('/gerant/dashboard');
            
            }
            
            return redirect(RouteServiceProvider::HOME);
            
        }
        }

        return $next($request);
    }
}
