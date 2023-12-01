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
    <link rel="stylesheet" href=<?=CSS_URL."employee-tab.css"?>>
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

    <table class="employees-table">
        <thead>
            <tr>
                <th class="column-1">Name</th>
                <th class="column-2">Role</th>
                <th class="column-3">Email</th>
                <th class="column-4">Contact Number</th>
                <th class="column-5">Status</th>
                <th class="column-6">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['first_name'] . ' ' . $row['other_names'] . ' ' . $row['last_name'] ?></td>
                    <td><?= $row['job_role'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['contact_number'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td>
                        <button><img src="<?= RESOURCE_URL."expand-icon.png"?>" alt="Expand Icon" title="Expand"></button>
                        <button><img src="<?= RESOURCE_URL."delete-icon.png"?>" alt="Delete Icon" title="Delete"></button>
                        <button><img src="<?= RESOURCE_URL."trash-icon.png"?>" alt="Edit Icon" title="Edit"></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>