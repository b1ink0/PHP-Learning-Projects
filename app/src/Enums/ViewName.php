<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * ViewName Enum
 *
 * This enum represents different view names as string values.
 */
enum ViewName: string {
    case Home = 'Home';
    case Message = 'Message';
    case NotFound = '404';
}