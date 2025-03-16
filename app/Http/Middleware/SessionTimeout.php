<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        $timeout = 300; // 5 minutos en segundos
        $lastActivity = Session::get('last_activity', time());

        if (time() - $lastActivity > $timeout) {
            Session::put('locked', true); // Solo bloqueamos la sesión
            return redirect()->route('lockscreen'); // Redirigir a la pantalla de bloqueo
        }

        Session::put('last_activity', time());

        return $next($request);
    }
}
