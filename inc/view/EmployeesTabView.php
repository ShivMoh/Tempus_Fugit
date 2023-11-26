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
    <link rel="stylesheet" href="../../public/css/employees-tab.css">
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
                'first-name' => "Ricardo",
                'last-name' => "Narine",
                'other-names' => "Joshua",
                'gender' => "True",
                'age' => 18,
                'dob' => '2005-01-23',
                'job-role' => 'Manager',
                'email' => 'ricardo@gmail.com',
                'contact-number' => '666-1234',
            ],
            [
                'id' => 2,
                'first-name' => "Monica",
                'last-name' => "Lee",
                'other-names' => "Amy",
                'gender' => "False",
                'age' => 19,
                'dob' => '2004-01-23',
                'job-role' => 'Cashier',
                'email' => 'monica@gmail.com',
                'contact-number' => '666-4321',
            ],
        ];
    ?>

    <table class="table">
        <thead>
            <tr>
                <th class="column-1">Name</th>
                <th class="column-2">Role</th>
                <th class="column-3">Email</th>
                <th class="column-4">Contact Number</th>
                <th class="column-5">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['first-name'] . ' ' . $row['other-names'] . ' ' . $row['last-name'] ?></td>
                    <td><?= $row['job-role'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['contact-number'] ?></td>
                    <td>
                        <button><img src="../../public/images/expand-icon.png" alt="Expand Icon" title="Expand"></button>
                        <button><img src="../../public/images/delete-icon.png" alt="Delete Icon" title="Delete"></button>
                        <button><img src="../../public/images/writing-icon.png" alt="Edit Icon" title="Edit"></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>