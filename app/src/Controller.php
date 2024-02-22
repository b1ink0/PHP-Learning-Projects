<?php

declare(strict_types=1);

namespace App;

use App\Enums\Extension;
use App\Enums\ViewName;

/**
 * Class Controller
 *
 * This class serves as the base controller for the application.
 */
class Controller
{
    /**
     * Render a view file with optional data.
     *
     * @param string $view The name of the view file to render.
     * @param array  $data Optional data to pass to the view.
     */
    protected function render(ViewName $viewName, array $data = []): void
    {
        $path = VIEW_PATH . $viewName->value . Extension::PHP->value;

        // Check if the view file exists, otherwise include the 404 view.
        if (!file_exists($path)) {
            include VIEW_PATH . ViewName::NotFound->value . Extension::PHP->value;
        }

        // Extract data array to variables accessible within the view file.
        extract($data);

        // Include the view file.
        include $path;
    }
}
