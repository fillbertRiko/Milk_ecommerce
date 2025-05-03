<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

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
        // Nếu bạn mong muốn gọi mapApiRoutes() tại đây:
        $this->mapApiRoutes();
    }

    public function mapApiRoutes(): void
    {
        // Đảm bảo rằng $this->namespace đã được định nghĩa hoặc thay bằng chuỗi thích hợp.
        $namespace = 'App\\Http\\Controllers';

        Route::prefix('api')
            ->middleware('api')
            ->namespace($namespace)
            ->group(base_path('routes/api.php'));
    }
}
