<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controller;
use App\Models\Subscription;
use App\Attributes\Route;
use App\Enums\Route as EnumsRoute;
use App\Enums\ViewName;

/**
 * Class SubscriptionController
 * 
 * Controller for handling subscription related actions.
 */
class SubscriptionController extends Controller
{
    /**
     * Handles subscription request.
     * @return void
     */
    #[Route(route: EnumsRoute::Subscribe)]
    #[Route(route: EnumsRoute::Verify)]
    #[Route(route: EnumsRoute::Unsubscribe)]
    public function handle(string $method): void
    {
        // Instantiate a new Subscription object
        $subscription = new Subscription();

        // Handle the subscription request
        $result = $subscription->$method();

        $data = ['message' => $result];
        $this->render(ViewName::Message, $data);
    }
}
