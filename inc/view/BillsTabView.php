<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/search-bar.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <link rel="stylesheet" href="../../public/css/bills-tab.css">
    <title>Data Table</title>
</head>

<body>
    <!-- SEARCH BAR -->
    <div class="search-bar-container">
        <input class="search-bar" type="text" placeholder="Search Bills by Transaction ID">
        <button class="search-button"><img title="Search" class="search-icon" src="../../public/images/search.png" alt="Search Button"></button>
        <select class="search-bar-dropdown-1" name="status" id="status">
            <option disabled selected>Status</option>
            <option value="completed">Completed</option>
            <option value="pending">Pending</option>
            <option value="cancelled">Cancelled</option>
        </select>
        <select class="search-bar-dropdown-2" name="date" id="date">
            <option disabled selected>Date</option>
            <option value="last-week">Last Week</option>
            <option value="last-month">Last Month</option>
            <option value="last-six-months">Last 6 Months</option>
        </select>
        <button class="search-bar-add-button"><img title="Add Bill" class="add-icon" src="../../public/images/add.png" alt="Add button"></button>
    </div>
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
