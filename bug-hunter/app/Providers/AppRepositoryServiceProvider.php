<?php
declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppRepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
}