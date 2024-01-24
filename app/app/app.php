<?php

declare(strict_types=1);
function getTransactionFiles(string $DIR_PATH): array
{
    $transactionFiles = [];
    $dir = scandir($DIR_PATH);
    foreach ($dir as $file) {
        if (is_dir($file)) {
            continue;;
        }
        $transactionFiles[] = $DIR_PATH . $file;
    }
    return $transactionFiles;
}

function getTransactions(array $transactionFiles, ?callable $handler = null): array
{
    $transactions = [];
    foreach ($transactionFiles as $transactionFile) {
        if (!file_exists($transactionFile)) continue;
        $file = fopen($transactionFile, "r");
        fgetcsv($file);
        while (($transaction = fgetcsv($file)) !== false) {
            if ($handler !== null) {
                $transactions[] = $handler($transaction);
            } else {
                $transactions[] = $transaction;
            }
        }
    }
    return $transactions;
}

function extractTransaction(array $transactionRow): array
{
    [$date, $checkNumber, $description, $amount] = $transactionRow;
    $amount = (float) str_replace(["$", ","], "", $amount);
    return [
        "date" => $date,
        "checkNumber" => $checkNumber,
        "description" => $description,
        "amount" => $amount
    ];
}

function getTransactionTotal(array $transactions): array
{
    $transactionTotal = ["totalIncome" => 0, "totalExpense" => 0, "netTotal" => 0];
    foreach ($transactions as $transaction) {
        $amount = $transaction["amount"];
        if ($amount > 0) {
            $transactionTotal["totalIncome"] += $amount;
            continue;
        }
        $transactionTotal["totalExpense"] += abs($amount);
    }
    $transactionTotal["netTotal"] += ($transactionTotal["totalIncome"] - $transactionTotal["totalExpense"]);
    return $transactionTotal;
}
