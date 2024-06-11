<?php

namespace App\Http\Middleware\Check;

use App\Models\Admin;
use App\Models\Methodist;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMethodist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Methodist::where('user_id', auth()->id())->exists() or Admin::where('user_id', auth()->id())->exists()) {
            return $next($request);
        }
    }
}
