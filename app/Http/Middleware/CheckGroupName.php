<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckGroupName
{
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::check()) {
            // Récupère l'utilisateur connecté
            $user = Auth::user();


            if (!$user->groups()->where('name', 'Admin')->exists()) {

                return response()->json(['error' => 'Accès interdit. Vous devez appartenir au groupe Admin.'], 403);
            }
        } else {

            return response()->json(['error' => 'Non autorisé. Vous devez être connecté.'], 401);
        }

        // Si l'utilisateur appartient au groupe "Admin", continuer la requête
        return $next($request);
    }
}
