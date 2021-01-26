<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    $filesystem = new Filesystem;

    if ($filesystem->exists($dir = app_path('Components'))) {
        foreach ($filesystem->allFiles($dir) as $file) {
            $namespace = 'App\\Components\\' . str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname());
            $class = app($namespace);

            if (property_exists($class, 'routeUri') && $class->routeUri) {
                $route = Route::get($class->routeUri, $namespace);

                if (property_exists($class, 'routeName') && $class->routeName) {
                    $route->name($class->routeName);
                }

                if (property_exists($class, 'routeMiddleware') && $class->routeMiddleware) {
                    $route->middleware($class->routeMiddleware);
                }

                if (property_exists($class, 'routeDomain') && $class->routeDomain) {
                    $route->domain($class->routeDomain);
                }

                if (property_exists($class, 'routeWhere') && $class->routeWhere) {
                    $route->where($class->routeWhere);
                }
            }
        }
    }
});
