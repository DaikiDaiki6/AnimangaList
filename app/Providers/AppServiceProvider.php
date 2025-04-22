<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (!in_array(Route::currentRouteName(), ['login', 'register'])) {
                $user = Auth::user();

                // Pass the authenticated user to all views
                $view->with('user', $user);
            }
        });

        // Add a global function to fix image paths
        View::composer('*', function ($view) {
            $view->with('fixImagePath', function ($path) {
                if (!$path) return '';

                // Convert backslashes to forward slashes
                $path = str_replace('\\', '/', $path);

                // Add leading slash if not present
                if (!empty($path) && $path[0] !== '/') {
                    $path = '/' . $path;
                }

                return $path;
            });
        });
    }
}
