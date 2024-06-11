<?php

namespace App\Http\Middleware\Check;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\App\Models\Admin::where('user_id', auth()->id())->exists()) {
            return $next($request);
        }
        else {
            return redirect()->back();
        }
    }
}
