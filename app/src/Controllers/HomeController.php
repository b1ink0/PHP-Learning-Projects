<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controller;
use App\Attributes\Route;
use App\Enums\Route as EnumsRoute;
use App\Enums\ViewName;

/**
 * Class HomeController
 * 
 * This class represents the controller for the home page.
 */
class HomeController extends Controller
{
    /**
     * Renders the home page.
     *
     * This method renders the home page by invoking the `render` method
     * from the parent class `Controller` and passing the view name as 'Home'.
     * @return void
     */
    #[Route(route: EnumsRoute::Home)]
    public function index(string $param): void
    {
        $this->render(ViewName::Home);
    }
}
