<?php

namespace App\Http\Middleware\Check;

use App\Models\Employee;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Employee::where('user_id', '=', auth()->id())->exists()) {
            return $next($request);
        }
        return redirect()->back();
    }
}
