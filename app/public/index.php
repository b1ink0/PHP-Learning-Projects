<?php

declare(strict_types=1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'src' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transactions' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require_once APP_PATH . "app.php";
require_once APP_PATH . "helper.php";

$transactinFiles = getTransactionFiles(FILES_PATH);
$transactions = getTransactions($transactinFiles, "extractTransaction");
$transactionTotals = getTransactionTotal($transactions);

require_once VIEWS_PATH . "transactions.php";