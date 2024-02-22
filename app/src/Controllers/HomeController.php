<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controller;

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
    public function index(): void
    {
        $this->render('Home');
    }
}
