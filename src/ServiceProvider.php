<?php

namespace PaladinDigital\Blog;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $packagePath = __DIR__ . '/../';

        $this->loadMigrationsFrom($packagePath . 'database/migrations');
    }

    public function register()
    {
    }
}
