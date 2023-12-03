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

        <select class="search-bar-dropdown-2" name="Sort" id="sort">
            <option disabled selected>Sort</option>
            <option value="Price-High-to-Low">Price: High to Low</option>
            <option value="Price-Low-to-Hight">Price: Low to High</option>
            <option value="A-to-Z">A to Z</option>
            <option value="Z-to-A">Z to A</option>
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
                <button class="action-button edit-button" data-id="<?php echo $item['id']; ?>">
                    <img class="action-button-image" src="<?= RESOURCE_URL."edit-icon.png"?>" alt="Edit" title="Edit">
                </button>
                
                <form action="<?=BASE_URL."/MenuItem/delete/".$item['id']?>" method="post">
                    <button class="action-button-right-most"><img class="action-button-image" src="<?= RESOURCE_URL."delete-icon.png"?>" alt="Delete" title="Delete"></button>
                </form>
            </div>
        </div>

        <!-- Expand Modal -->
        <div class="modal" id="modal-<?php echo $item['id']; ?>">
            <div class="modal-content">
                <div class="image-and-tags-modal-div">
                    <img class="modal-menu-item-img" src="<?=RESOURCE_URL.$item['image'];?>" alt="<?php echo $item['name']; ?>">
                    <div class="modal-tag-buttons">
                        <?php $tags = explode(',', $item['tags']); ?>
                        <?php foreach ($tags as $tag): ?>
                            <button class="modal-tag-button"><?php echo $tag; ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="menu-item-details-modal-div">
                    <p class="modal-item-name"><?php echo $item['name']; ?></p>
                    <p class="modal-item-description"><?php echo $item['description']; ?></p>
                    <ul class="item-ingredients">
                        <p class="modal-item-ingredients">Ingredients</p>
                        <?php $ingredients = explode(',', $item['ingredients']); ?>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <li><?php echo $ingredient; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal edit-modal" id="edit-modal-<?php echo $item['id']; ?>">
            <div class="modal-content">

                <form action=<?= BASE_URL."/MenuItem/update/".$item['id']?> method="post">
                    <label for="edit-item-name">Name</label>
                    <input type="text" id="edit-item-name" name="edit-item-name" value="<?php echo $item['name']; ?>" required>

                    <label for="edit-item-description">Description</label>
                    <input type="text" id="edit-item-description" name="edit-item-description" value="<?php echo $item['description']; ?>" required>

                    <label for="edit-item-ingredients">Ingredients</label>
                    <input type="text" id="edit-item-ingredients" name="edit-item-ingredients" value="<?php echo $item['ingredients']; ?>" required>

                    <label for="edit-item-price">Price</label>
                    <input type="text" id="edit-item-price" name="edit-item-price" value="<?php echo $item['price']; ?>" required>

                    <label for="edit-item-image">Image</label>
                    <input type="text" id="edit-item-image" name="edit-item-image" value="<?php echo $item['image']; ?>" required>

                    <label for="edit-item-discount">Discount</label>
                    <input type="text" id="edit-item-discount" name="edit-item-discount" value="<?php echo $item['discount']; ?>" required>

                    <label for="edit-item-discount">Tags</label>
                    <input type="text" id="edit-item-tags" name="edit-item-tags" value="<?php echo $item['tags']; ?>" required>



                    <button type="submit">Save Changes</button>
                    
                </form>
            </div>
        </div>
    <?php endforeach; ?>

    <script>
        var modals = document.querySelectorAll('.modal');
        var editModals = document.querySelectorAll('.edit-modal');
        var expandButtons = document.querySelectorAll('.expand-button');
        var editButtons = document.querySelectorAll('.edit-button');

        // Function to display a modal by ID
        function displayModal(modalId) {
            var modal = document.getElementById(modalId);
            modal.style.display = 'block';
        }

        // Loop through each modal and add click event listeners to the expand buttons
        expandButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var modalId = 'modal-' + this.getAttribute('data-id');
                displayModal(modalId);
            });
        });

        // Loop through each edit button and add click event listeners to open the edit modal
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var editModalId = 'edit-modal-' + this.getAttribute('data-id');
                displayModal(editModalId);
            });
        });

        // Close the modal if the user clicks outside of it
        window.addEventListener('click', function (event) {
            modals.forEach(function (modal) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });

            editModals.forEach(function (modal) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
