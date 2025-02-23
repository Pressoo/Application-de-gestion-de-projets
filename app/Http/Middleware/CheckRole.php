<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect('login'); // Redirige vers la connexion si non authentifié
        }

        $user = Auth::user();

        if ($user->role->name == $role) {
            return $next($request);
        }

        return abort(403, 'Accès non autorisé.'); // Retourne une erreur 403 si le rôle n'est pas autorisé
    }
}

