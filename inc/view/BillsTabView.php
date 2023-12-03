<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."main.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."search-bar.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."table.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."bills-tab.css"?>>
    <title>Bills Table</title>
</head>

<body>
    <!-- SEARCH BAR -->
    <div class="search-bar-container">
        <input class="search-bar" type="text" placeholder="Search Bills by Transaction ID">
        <button class="search-button"><img title="Search" class="search-icon" src="<?= RESOURCE_URL."search.png"?>" alt="Search Button"></button>
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
        <button class="search-bar-add-button"><img title="Add Bill" class="add-icon" src="<?= RESOURCE_URL."add.png"?>" alt="Add button"></button>
    </div>
    <!-- SEARCH BAR -->



    <table class="bills-table">
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
            <?php foreach ($data as $bill): ?>
                <tr>
                    <td><?= $bill['id'] ?></td>
                    <td><?= $bill['number_of_items'] ?></td>
                    <td><?= '$' . $bill['total_cost'] ?></td>
                    <td><?= $bill['order_date'] ?></td>
                    <td><?=$bill['status'] ?></td>
                    <td>
                        <div class="action-container">
                            <form class="button-form" action="<?=BASE_URL."/bill/findOne/".$bill['id']?>" method="POST">
                                <button class="action-button"><img src="<?= RESOURCE_URL."expand-icon.png"?>" alt="Expand Icon" title="Preview"></button>
                            </form>
                            <form class="button-form" action="<?=BASE_URL."/bill/delete/".$bill['id']?>" method="POST">
                                <button class="action-button"><img src="<?= RESOURCE_URL."cancel_icon.png"?>" alt="Cancel Icon" title="Cancel"></button>
                            </form>   
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
