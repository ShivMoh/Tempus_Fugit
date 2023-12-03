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
        <form action=<?=BASE_URL."/bill/searchById"?> method="POST">
            <input class="search-bar" type="text" placeholder="Search Bills by ID" name="search-query">
            <button type="submit" class="search-button"><img title="Search" class="search-icon" src="<?= RESOURCE_URL."search.png"?>" alt="Search Button"></button>
        </form>

        <form action=<?=BASE_URL."/bill"?>>
            <button class="clear-search" type="submit">Clear Search</button>
        </form>
      
        <form action=<?=BASE_URL."/bill/filterByStatus"?> method="POST">
            <select class="search-bar-dropdown-1" name="status" id="status" onchange="this.form.submit()">
                <option disabled selected>Status</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </form>

        <form action=<?=BASE_URL."/bill/filterByDate"?> method="POST">
            <select class="search-bar-dropdown-2" name="date" id="date" onchange="this.form.submit()">
                <option disabled selected>Date</option>
                <option value="last-week">Last Week</option>
                <option value="last-month">Last Month</option>
                <option value="last-six-months">Last 6 Months</option>
            </select>
        </form>

        <form action=<?=BASE_URL."/register"?> method="POST">
            <button type="submit"class="search-bar-add-button"><img title="Add Bill" class="add-icon" src="<?= RESOURCE_URL."add.png"?>" alt="Add button"></button>
        </form>
     
      
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
            <?php if (!empty($data[0])) : ?>
                <?php foreach ($data as $bill): ?>
                    <tr>
                        <td><?= $bill['id'] ?></td>
                        <td><?= $bill['number_of_items'] ?></td>
                        <td><?= '$' . $bill['total_cost'] ?></td>
                        <td><?= $bill['order_date'] ?></td>
                        <td>
                            <?php
                                $imageSource = '';
                                switch ($bill['status']) {
                                    case 'pending':
                                        $imageSource = RESOURCE_URL . "pending_icon.png";
                                        break;
                                    case 'completed':
                                        $imageSource = RESOURCE_URL . "active_icon.png";
                                        break;
                                    case 'cancelled':
                                        $imageSource = RESOURCE_URL . "cancelled_icon.png";
                                        break;
                                    default:
                                        $imageSource = RESOURCE_URL . "empty_icon.png"; 
                                }
                            ?>
                            <div class="status-container">
                                <img src="<?= $imageSource ?>" title="status-icon">
                                <span class="status-text"><?= ucfirst($bill['status']) ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="action-container">
                                <form class="button-form" action="<?=BASE_URL."/bill/findOne/".$bill['id']?>" method="POST">
                                    <button class="action-button"><img src="<?= RESOURCE_URL."expand-icon.png"?>" alt="Expand Icon" title="Preview"></button>
                                </form>
                                <form class="button-form" action="<?=BASE_URL."/bill/delete/".$bill['id']?>" method="POST">
                                    <button class="action-button"><img src="<?= RESOURCE_URL."cancel-icon.png"?>" alt="Cancel Icon" title="Cancel"></button>
                                </form>   
                                <form class="button-form" action="<?=BASE_URL."/bill/update/".$bill['id']?>" method="POST">
                                    <button class="action-button"><img src="<?= RESOURCE_URL."done-icon.png"?>" alt="Edit Icon" title="Mark As Completed"></button>
                                </form>   
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
