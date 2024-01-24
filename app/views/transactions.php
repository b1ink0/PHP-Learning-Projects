<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Check #</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= formatDate($transaction["date"]) ?></td>
                    <td><?= $transaction["checkNumber"] ?></td>
                    <td><?= $transaction["description"] ?></td>
                    <td class="<?= $transaction["amount"] < 0 ? "red" : "green" ?>"><?= formatAmount($transaction["amount"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Income:</th>
                <td class="green"><?= formatAmount($transactionTotals["totalIncome"]) ?></td>
            </tr>
            <tr>
                <th colspan="3">Total Expense:</th>
                <td class="red"><?= formatAmount($transactionTotals["totalExpense"]) ?></td>
            </tr>
            <tr>
                <th colspan="3">Net Total:</th>
                <td class="<?= $transactionTotals["netTotal"] < 0 ? "red" : "green" ?>"><?= formatAmount($transactionTotals["netTotal"]) ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>