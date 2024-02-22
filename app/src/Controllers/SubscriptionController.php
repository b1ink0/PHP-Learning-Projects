<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Controller;
use App\Models\Subscription;
use App\Attributes\Route;

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
    #[Route(path: '/subscribe')]
    public function subscribe(): void
    {
        // Instantiate a new Subscription object
        $subscription = new Subscription();

        // Handle the subscription request
        $result = $subscription->handleSubscribe();

        $data = ['message' => $result];
        $this->render('Message', $data);
    }

    /**
     * Handles verification request.
     * @return void
     */
    #[Route(path: '/verify')]
    public function verify(): void
    {
        // Instantiate a new Subscription object
        $subscription = new Subscription();

        // Handle the verification of the subscription
        $result = $subscription->handleVerify();

        $data = ['message' => $result];
        $this->render('Message', $data);
    }

    /**
     * Handles unsubscription request.
     * @return void
     */
    #[Route(path: '/unsubscribe')]
    public function unsubscribe(): void
    {
        // Instantiate a new Subscription object
        $user = new Subscription();

        // Handle the unsubscription request 
        $result = $user->handleUnsubscribe();
        
        $data = ['message' => $result];
        $this->render('Message', $data);
    }
}
