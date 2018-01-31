<?php

namespace PaladinDigital\Blog;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $packagePath = __DIR__ . '/../';

        $this->loadMigrationsFrom($packagePath . 'database/migrations');

        $this->loadRoutesFrom($packagePath . 'routes/web.php');

        $this->loadViewsFrom($packagePath . 'resources/views', 'blog');

        // Allow config publish.
        $this->publishes([
            $packagePath.'config/pd-blog.php' => config_path('pd-blog.php'),
        ]);
    }

    public function register()
    {
    }
}
