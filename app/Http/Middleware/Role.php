<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected  $hierarchy = [
        'cliente'           =>'1',
        'distribuidor'      =>'2',
        'comercial'         =>'3',
        'admin'             =>'4',
        'superadmin'        =>'5'
    ];

    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        if ($this->hierarchy[$user->role]<$this->hierarchy[$role]){
            //return redirect()->route('home')->with('error', 'No tiene permisos para ir a esa seccion, pongase en contacto con el administrador');
            abort(404); //  tambien sirve pues no revelamos si exixte esas seccion
        }

        return $next($request);
    }
}
