<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle($request, Closure $next)
    {
        // Verifica se o administrador está autenticado
        if (!Auth::guard('admin')->check()) {
            // Se não estiver autenticado, redireciona para a página de login
            return redirect()->route('admin.login'); // Altere a rota conforme necessário
        }

        // Se o administrador estiver autenticado, continua com a requisição
        return $next($request);
    }
}
