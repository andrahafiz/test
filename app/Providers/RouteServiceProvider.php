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
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    // public const HOME = '/home';
    public const HOME = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('pelanggan')
                ->name('customer.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/customer.php'));

            Route::prefix('mcs')
                ->name('mcs.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mcs.php'));

            Route::prefix('rscm')
                ->name('rscm.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/rscm.php'));

            Route::prefix('medco')
                ->name('medco.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/medco.php'));

            Route::prefix('supervisor')
                ->name('supervisor.')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/supervisor.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
