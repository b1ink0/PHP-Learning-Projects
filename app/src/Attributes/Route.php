<?php

declare(strict_types=1);

namespace App\Attributes;

use Attribute;

/**
 * Route Attribute
 *
 * This attribute is used to mark controller methods with the URL path
 * they should respond to in a web application.
 */
#[Attribute]
class Route
{
    /**
     * Constructor
     *
     * Initializes the Route attribute with the specified URL path.
     *
     * @param string $path The URL path associated with the route.
     */
    public function __construct(public readonly string $path)
    {
        // The constructor automatically assigns the provided path to the $path property.
    }
}
