<?php include "functions.php" ?>
<style>
    table,
    tr,
    th,
    td {
        border-collapse: collapse;
        border: 1px solid black;
        padding-right: 10px;
        padding-left: 10px;
    }

    .red {
        color: red;
    }

    .green {
        color: green;
    }
</style>
<table>
    <thead>
        <tr>
            <?php foreach (array_shift($array) as $key => $item) echo "<th>{$item}</th>" ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($array as $key => $item) : ?>
            <tr>
                <?php foreach ($item as $key => $child) : ?>
                    <td class="<?php echo $key == "3" ? ($child[1] == "-" ? "red" : "green") : "" ?>"><?php echo $child ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    <tbody>
    <tfoot>
        <?php
        $income = 0;
        $expense = 0;
        foreach ($array as $item) {
            $amount = $item[3];
            $remove_arr = [",", "$", "\""];
            $amount = (float) str_replace($remove_arr, "", $amount);
            $amount > 0 ? $income += $amount : $expense += abs($amount);
        }
        ?>
        <tr>
            <th colspan="3">Total Income:</th>
            <td class="green">
                <?php echo "$" . number_format($income) ?>
            </td>
        </tr>
        <tr>
            <th colspan="3">Total Expense:</th>
            <td class="red">
                <?php echo "-$" . number_format($expense) ?>
            </td>
        </tr>
        <tr>
            <th colspan="3">Net Total:</th>
            <td class="green">
                <?php echo "$" . number_format( $income - $expense) ?>
            </td>
        </tr>
    </tfoot>
</table>