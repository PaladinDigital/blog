# Blog Package

Status: Pre-release (Code may be subject to breaking changes).

This package provides the resources necessary to create a blog.

## Requirements

 - Laravel 5 (Tested from 5.5+).

## Installation

Add the package:

    composer require "paladindigital/blog"

Run the migrations:

    php artisan migrate

Add the filesystem to store blog images (the root can be adjusted as needed):

config/filesystems.php

    'blog' => [
        'driver' => 'local',
        'root' => public_path('images/blog'),
        'visibility' => 'public',
    ],
