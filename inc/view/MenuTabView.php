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
    <link rel="stylesheet" href=<?=CSS_URL."menu-tab.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."modal.css"?>>
    <title>MenuTabView</title>
</head>

<body>
    <!-- SEARCH BAR -->
    <div class="search-bar-container">
        <input class="search-bar" type="text" placeholder="Search Menu item by name">
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

        <form action="<?=BASE_URL."/MenuItem/view/MenuItemAdd"?>" method="POST">        
            <button class="search-bar-add-button"><img title="Add Item" class="add-icon" src="<?= RESOURCE_URL."add.png"?>" alt="Add button"></button>
        </form>
    </div>
    <!-- SEARCH BAR -->

    <!-- SELECT * QUERY -->

    <?php foreach ($data as $item): ?>
        <div class="menu-item-container">
            <div class="image-and-tags">
                <img class="menu-item-img" src="<?= RESOURCE_URL . $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                <div class="tag-buttons">
                    <?php $tags = explode(',', $item['tags']); ?>
                    <?php foreach ($tags as $tag): ?>
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
                <button class="action-button expand-button" data-id="<?php echo $item['id']; ?>">
                    <img class="action-button-image" src="<?= RESOURCE_URL."expand-icon.png"?>" alt="Expand" title="Expand">
                </button>
                <button class="action-button"><img class="action-button-image" src="<?= RESOURCE_URL."edit-icon.png"?>" alt="Edit" title="Edit"></button>
                <button class="action-button-right-most"><img class="action-button-image" src="<?= RESOURCE_URL."delete-icon.png"?>" alt="Delete" title="Delete"></button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="modal-<?php echo $item['id']; ?>">
        <div class="modal-content">
            <div class="image-and-tags-modal-div">
               
                <img class="modal-menu-item-img" src="<?=RESOURCE_URL.$item['image'];?>" alt="<?php echo $item['name']; ?>">
                <div class="modal-tag-buttons">
                    <?php foreach ($item['tags'] as $tag): ?>
                        <button class="modal-tag-button"><?php echo $tag; ?></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="menu-item-details-modal-div">
                <p class="modal-item-name"><?php echo $item['name']; ?></p>
                <p class="modal-item-description"><?php echo $item['description']; ?></p>
                <ul class="item-ingredients">
                    <p class="modal-item-ingredients">Ingredients</p>
                    <?php foreach ($item['ingredients'] as $ingredient): ?>
                        <li><?php echo $ingredient; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

    <script>
        var modals = document.querySelectorAll('.modal');
        var expandButtons = document.querySelectorAll('.expand-button');
        var closeButtons = document.querySelectorAll('.close');

        // Loop through each modal and add click event listeners to the expand buttons
        expandButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var modalId = this.getAttribute('data-id');
                var modal = document.getElementById('modal-' + modalId);
                modal.style.display = 'block';
            });
        });

        // Closes the modal
        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var modalId = this.getAttribute('data-id');
                var modal = document.getElementById('modal-' + modalId);
                modal.style.display = 'none';
            });
        });

        window.addEventListener('click', function (event) {
            modals.forEach(function (modal) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
<?php endforeach; ?>
</body>
</html>
