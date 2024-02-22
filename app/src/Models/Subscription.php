<?php

declare(strict_types=1);

namespace App\Models;


/**
 * Class Subscription
 *
 * Handles subscription-related operations such as subscribing, verifying, and unsubscribing.
 */
class Subscription
{
    /**
     * Handles the subscription process.
     * @return string The subscription status message.
     */
    public function handleSubscribe(): string
    {
        return "Subscribe";
    }

    /**
     * Handles the verification process.
     * @return string The verification status message.
     */
    public function handleVerify(): string
    {
        return "Verify";
    }

    /**
     * Handles the unsubscription process.
     * @return string The unsubscription status message.
     */
    public function handleUnsubscribe(): string
    {
        return "Unsubscribe";
    }
}
