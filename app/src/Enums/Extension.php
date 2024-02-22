<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * Extension Enum
 *
 * This enum represents file extensions as string values.
 */
enum Extension: string {
    // Represents the PHP file extension
    case PHP = '.php';

    // Represents the HTML file extension
    case HTML = '.html';
};