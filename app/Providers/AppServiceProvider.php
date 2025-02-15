<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// Repositories
use App\Repositories\TodoRepository\TodoRepository;
use App\Repositories\TodoRepository\TodoRepositoryInterface;
use App\Repositories\PokemonRepository\PokemonRepository;
use App\Repositories\PokemonRepository\PokemonRepositoryInterface;
// Services
use App\Services\AuthService\AuthService;
use App\Services\AuthService\AuthServiceInterface;
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
        $this->app->bind(PokemonRepositoryInterface::class, PokemonRepository::class);
        // Services
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
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
