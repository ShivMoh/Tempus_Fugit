<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=CSS_URL."main.css"?>>
    <link rel="stylesheet" href=<?=CSS_URL."menu-item-add.css"?>>
    <title>Menu Item Form</title>
</head>

<body>
    <form action="<?=BASE_URL."/MenuItem"?>"method="POST" id="menu-back-form"></form>
    <form class="menu-item-add-form" action="<?=BASE_URL."/MenuItem/create"?>" method="post">
        <p class="form-name-text">
            MENU ITEM REGISTRATION
        </p>
        <label for="name">Name</label>
        <input type="text" name="name" required>

        <label for="tags">Tags</label>
        <input type="text" name="tags" title="No spaces, separated by commas(,)" required>

        <label for="price">Price</label>
        <input type="text" name="price" required>

        <label for="description">Description</label>
        <input type="text" name="description" required>

        <label for="image">Image</label>
        <input type="text" name="image" required>

        <label for="discount">Discount</label>
        <input type="text" name="discount" required>

        <label for="ingredients">Ingredients</label>
        <input type="text" name="ingredients" title="No spaces, separated by commas(,)" required>

        <button type="submit">Submit</button>
        <button type="submit" class="menu-back-button" form="menu-back-form">Back To List</button>
    </form>
</body>
</html>