<?php
    include "NavBarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href=<?=CSS_URL."main.css"?>> -->
    <link rel="stylesheet" href=<?=CSS_URL."search-bar.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."menu-tab.css"?>>
    <title>MenuTabView</title>
</head>

<body>
    <!-- SEARCH BAR -->
    <div class="search-bar-container">
        <input class="search-bar" type="text" placeholder="Search Menu item by name or id">

        <button class="search-button"><img title="Search" class="search-icon" src="<?= RESOURCE_URL."search.png"?>" alt="Search Button"></button>
        
        <select class="search-bar-dropdown-1" name="tags" id="tags">
            <option disabled selected>Tags</option>
            <option value="savory">Savory</option>
            <option value="healthy">Healthy</option>
            <option value="dessert">Dessert</option>
        </select>

        <select class="search-bar-dropdown-2" name="price" id="price">
            <option disabled selected>Price</option>
            <option value="under-1000">Under 1000</option>
            <option value="1000-to-5000">1000 to 5000</option>
            <option value="over-5000">Over 5000</option>
        </select>
        
        <button class="search-bar-add-button"><img title="Add Item" class="add-icon" src="<?= RESOURCE_URL."add.png"?>" alt="Add button"></button>
    </div>
    <!-- SEARCH BAR -->

    <!-- SELECT * QUERY -->
    <?php
        $data = [
            [
                'id' => 1,
                'name' => 'Chocolate Chip Ice Cream',
                'price' => 1000,
                'description' => 'Creamy vanilla ice cream with swirls of chocolate chips.',
                'image' => 'chocolate-chip-ice-cream.png',
                'discount' => 150,
                'tags' => ['chocolate', 'dessert'],
                'ingredients' => ['ice cream', 'chocolate chips'],
            ],
            [
                'id' => 2,
                'name' => 'Strawberry Swirl Sundae',
                'price' => 1500,
                'description' => 'Fresh strawberries layered with vanilla ice cream and topped with whipped cream.',
                'image' => 'strawberry-swirl-sundae.png',
                'discount' => 200,
                'tags' => ['strawberry', 'dessert'],
                'ingredients' => ['strawberries', 'ice cream'],
            ],
        ];
    ?>

    <?php foreach ($data as $item): ?>
        <div class="menu-item-container">
            <div class="image-and-tags">
                <img class="menu-item-img" src="<?= RESOURCE_URL . $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <div class="tag-buttons">
                    <?php foreach ($item['tags'] as $tag): ?>
                        <button class="tag-button"><?php echo $tag; ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="menu-item-details">
                <p class="item-name"><?php echo $item['name']; ?></p>
                <p class="item-description"><?php echo $item['description']; ?></p>
                <p class="item-price">Price: $<?php echo $item['price']; ?></p>
            </div>

            <div class="action-buttons">
            <button class="action-button"><img class="action-button-image" src="<?= RESOURCE_URL."expand-icon.png"?>" alt="Expand" title="Expand"></button>
            <button class="action-button"><img class="action-button-image" src="<?= RESOURCE_URL."edit-icon.png"?>" alt="Edit" title="Edit"></button>
            <button class="action-button-right-most"><img class="action-button-image" src="<?= RESOURCE_URL."delete-icon.png"?>" alt="Delete" title="Delete"></button>
        </div>
        </div>
    <?php endforeach; ?>

</body>
</html>
