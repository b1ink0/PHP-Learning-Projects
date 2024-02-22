<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Route Enum
 *
 * This enum represents different routes as string values.
 */
enum Route: string
{
    case Home = '';
    case Subscribe = 'subscribe';
    case Verify = 'verify';
    case Unsubscribe = 'unsubscribe';

    /**
     * Get the path associated with the route.
     *
     * @return string The path of the route.
     */
    public function getPath(): string
    {
        return match ($this) {
            self::Home => '/' . self::Home->value,
            self::Subscribe => '/' . self::Subscribe->value,
            self::Verify => '/' . self::Verify->value,
            self::Unsubscribe => '/' . self::Unsubscribe->value
        };
    }

    /**
     * Get the method name associated with the route.
     *
     * @return string The method name.
     */
    public function getMethodName(): string
    {
        return match ($this) {
            self::Home => 'index',
            self::Subscribe => 'handle' . ucfirst(self::Subscribe->value),
            self::Verify => 'handle' . ucfirst(self::Verify->value),
            self::Unsubscribe => 'handle' . ucfirst(self::Unsubscribe->value),
        };
    }
}
