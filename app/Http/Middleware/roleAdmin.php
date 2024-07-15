<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class roleAdmin
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
        $user = Auth::user();
        if(Auth::check()){
            if(Auth::check() == 'Administrador' or Auth::check() == 'Administrador Global'){
                return $next($request);
            }else{
                return redirect()->route('AdminIni')->with('noAuth','No tienes permisos de administrador.');
            }
        }else{
            return redirect()->route('AdminIni')->with('noAuth','Debes iniciar sessión para administrar el sistema.');
        }
    }
}
