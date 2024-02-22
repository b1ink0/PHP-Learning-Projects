<?php

declare(strict_types=1);

namespace App\Attributes;

use App\Enums\Route as EnumsRoute;
use Attribute;

/**
 * Route Attribute
 *
 * This attribute is used to mark controller methods with the route
 * they should respond to in a web application.
 */
#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
class Route
{
    /**
     * Constructor
     *
     * Initializes the Route attribute with the specified URL path.
     *
     * @param EnumsRoute $route The route information.
     */
    public function __construct(public readonly EnumsRoute $route)
    {
        // The constructor automatically assigns the provided path to the $path property.
    }
}
