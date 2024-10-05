<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetRequestDefault
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Assuming the company ID comes from the user or request
         $user = Auth::user();
         // Store it in the request object
         $request->add(['company_id'=> $user->company_id, 'user_id'=> $user->id, $user->role_id]);
 
         return $next($request);
    }
}
