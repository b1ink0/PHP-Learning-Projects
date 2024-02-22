<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    /**
     * Autoloads classes based on path
     *
     * @param string $class The fully qualified class name.
     */

    // First replacing backword slash with for forward slash
    // Second replacing `App/` with empty string
    // example App\Models => app/src/Models
    $path = __DIR__ . '/' . str_replace('App/', '', str_replace('\\', '/', $class)) . '.php';
    require $path;
});
