<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/menu-item-add.css">
    <title>Menu Item Form</title>
</head>

<body>
    <form class="menu-item-add-form" action="" method="post">
        <p class="form-name-text">
            MENU ITEM REGISTRATION
        </p>
        <label for="name">Name</label>
        <input type="text" name="name" required>

        <label for="tags">Tags</label>
        <input type="text" name="tags" required>

        <label for="price">Price</label>
        <input type="text" name="price" required>

        <label for="description">Description</label>
        <input type="text" name="description" required>

        <label for="image">Image</label>
        <input type="text" name="image" required>

        <label for="discount">Discount</label>
        <input type="text" name="discount" required>

        <label for="ingredients">Ingredients</label>
        <input type="text" name="ingredients" required>

        <button type="submit">Submit</button>
    </form>
</body>
</html>