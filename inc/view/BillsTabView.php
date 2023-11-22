<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <link rel="stylesheet" href="../../public/css/bills-tab.css">
    <title>Data Table</title>
</head>

<body>
    <!-- SEARCH BAR -->

    <!-- SEARCH BAR -->

    <?php
        // Select * query here
        $data = [
            [
                'id' => 1,
                'number_of_items' => 10,
                'total_cost' => 50.00,
                'order_date' => '2023-11-22',
                'status' => 'Completed',
            ],
            [
                'id' => 2,
                'number_of_items' => 5,
                'total_cost' => 25.50,
                'order_date' => '2023-11-23',
                'status' => 'Pending',
            ],
        ];
    ?>

    <table class="table">
        <thead>
            <tr>
                <th class="column-1">Bill ID</th>
                <th class="column-2">Number of Items</th>
                <th class="column-3">Total Cost</th>
                <th class="column-4">Order Date</th>
                <th class="column-5">Status</th>
                <th class="column-6">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['number_of_items'] ?></td>
                    <td><?= '$' . $row['total_cost'] ?></td>
                    <td><?= $row['order_date'] ?></td>
                    <td><?=$row['status'] ?></td>
                    <td>
                        <button><img src="../../public/images/expand-icon.png" alt="Expand Icon" title="Expand"></button>
                        <button><img src="../../public/images/delete-icon.png" alt="Delete Icon" title="Delete"></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
