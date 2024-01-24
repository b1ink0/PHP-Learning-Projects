<?php

declare(strict_types=1);
function formatAmount(float $amount): string
{
    $isNagative = $amount < 0;
    $string = $isNagative ? "-" : "";
    $string .= "$" . number_format(abs($amount), 2);
    return $string;
}

function formatDate(string $date) : string {
    $formatedDate = date("M j, Y", strtotime($date));
    return $formatedDate;
}