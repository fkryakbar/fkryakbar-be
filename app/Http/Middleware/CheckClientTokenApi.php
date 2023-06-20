<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClientTokenApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $value = $request->header('X-client-token');
        if ($value == env('CLIENT_TOKEN')) {
            return $next($request);
        }
        return response()->json([
            'code' => '400',
            'message' => 'Bad Request'
        ]);
    }
}
