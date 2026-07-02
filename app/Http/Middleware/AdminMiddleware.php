<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        
        if (!$user) {
            return redirect()->route('login');
        }

        
        if (!str_ends_with($user->email, '@easylecture.fr')) {
            abort(403, 'Accès interdit.');
        }

        return $next($request);
    }
}