<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/main.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <link rel="stylesheet" href="../../public/css/cash-register.css">
    <title>Document</title>
</head>

<body>
    <form action="/personal/Practice/oop-mvc/test/test" method="POST" id="order-form">
        <table>
            <thead>
                <tr>
                    <th class="col1" scope="col">Item Id</th>
                    <th class="col2" scope="col">Name</th>
                    <th class="col3" scope="col">Amount</th>
                    <th class="col4" scope="col">Discount</th>
                    <th class="col5" scope="col">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php for($x = 0; $x < 15; $x++) : ?>
                    <tr>
                        <td class="col1">
                            <input type='text' name=<?='id'.$x; ?>>
                        </td>
                        <td class="col2">
                            <select name=<?='name'.$x; ?> form="order-form">
                                <option>Select an item</option>
                                <option value="Option 1">Option 1</option>
                                <option value="Option 2">Option 2</option>
                                <option value="Option 3">Option 3</option>
                        </td>
                        <td class="col3">
                            <input type='text' name=<?='amount'.$x; ?>>
                        </td>
                        <td class="col4">
                            <input type='text' name=<?='discount'.$x; ?>>
                        </td>
                        <td class="col5">
                            <input type='text' name=<?='total'.$x; ?>>
                        </td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
        
        <div class="container">
            <label for="total">Total</label>
            <textarea name="total" id="total"></textarea>

            <button class="button-1" type="submit" form="order-form">Confirm & Print Bill</button>
            <button class="button-2" type="submit" form="order-form">Confirm</button>
            <button class="button-1" type="submit" form="order-form">Manage Bills</button>
        </div>

        
    </form>
</body>
</html>
