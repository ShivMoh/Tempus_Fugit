<?php
    include "NavBarView.php";
    echo "Menu tab";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/menu-tab.css">
    <title>MenuTabView</title>
</head>
<body>
    <div class="header-container">
        <div class="logo-section">
            <img
                loading="lazy"
                srcset="../../public/images/img.png"
                class="logo-img"
            />
            <div class="search-box">Search Menu Item by name or id</div>
        </div>
        <div class="menu-section">
            <div class="tags-title">Tags</div>
            <img
                loading="lazy"
                src="../../public/images/img-2.png"
                class="tags-img"
            />
            <div class="price-title">Price</div>
            <img
                loading="lazy"
                src="../../public/images/img-3.png"
                class="price-img"
            />
        </div>
        <img
            loading="lazy"
            srcset="../../public/images/img-4.png"
            class="background-img"
        />
    </div>
    <div class="rectangle"></div>
</body>
</html>