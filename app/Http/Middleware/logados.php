<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class logados
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            return $next($request);
        }
        // Redirecionamento quando expirar sessao por falta de login
        if (auth()->check() == null) {
            toast('Acesso Bloqueado', 'error');
            return redirect()->route('login');
        } else {
            // Erro para caso o usuario tente acessar uma rota nao permitida para o seu login
            toast('Acesso Bloqueado', 'error');
            return back();
        }
    }
}
