<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Repositories
use App\Repositories\TodoRepository\TodoRepository;
use App\Repositories\TodoRepository\TodoRepositoryInterface;
// Services
use App\Services\TodoService\TodoService;
use App\Services\TodoService\TodoServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
        // Services
        $this->app->bind(TodoServiceInterface::class, TodoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
