<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."main.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."navbar.css"?>>
    <title>Navigation Bar</title>
</head>

<body>
    <div class="navigation-bar">
        <a class="nav-button" href="<?= BASE_URL."/Register/index"?>">Register</a> 
        <a class="nav-button" href="<?= BASE_URL."/MenuItem/index/" ?>">Menu</a>
        <a class="nav-button" href="<?= BASE_URL."/Employee/index/" ?>">Employees</a> 
        <a class="nav-button" href="<?= BASE_URL."/Bill/index/" ?>">Bills</a>
    </div>
</body>
</html>