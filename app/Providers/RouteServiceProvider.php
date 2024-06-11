<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->group(base_path('routes/v1/app.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/note.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/classroom.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/group.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/employee.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/lesson.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/user.php'));

            Route::middleware('api')
                ->group(base_path('routes/v1/ask.php'));


            /*
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));


            Route::middleware('web')
                ->group(base_path('routes/web.php'));
            */
        });
    }
}
