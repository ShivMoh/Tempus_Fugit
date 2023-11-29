<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS_URL."main.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."table.css"?>">
    <link rel="stylesheet" href="<?=CSS_URL."cash-register.css"?>">
    <title>Document</title>
</head>

<body>
    <form action="<?=BASE_URL."/register/test"?>" method="POST" id="order-form">
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
                            <input type='text' name=<?='id'.$x;?> value=<?=!empty($data[0][$x]["itemId"]) ? $data[0][$x]["itemId"] : ($x == $data[2] ? $data[1]['id'] : 0) ?>>
                        </td>
                        <td class="col2">

                            <?php if(empty($data[0][$x]["discount"])) :?>
                                <select name=<?='name-'.$x; ?> onchange="this.form.submit()">
                                    <option disabled selected>Select an item</option>
                                    <option value="0">Option 1</option>
                                    <option value="1">Option 2</option>
                                    <option value="2">Option 3</option>
                                </select>
                            <?php else: ?>
                                <select name=<?='name-'.$x;?>>
                                    <option disabled selected><?=($data[0][$x]["name"])?></option>
                                </select>
                            <?php endif; ?>
                        </td>
                        <td class="col3">
                            <input type='text' name=<?='amount'.$x; ?> value=<?=$data[0][$x]["amount"] ?? 0 ?>>
                        </td>
                        <td class="col4">
                            <input type='text' name=<?='discount'.$x;?> value=<?=!empty($data[1]) ? ($x == $data[2] ? $data[1]['discount'] : 0) : 0?>>
                        </td>
                        <td class="col5">
                            <input 
                                type='text' 
                                name=<?='total'.$x; ?> 
                                value=<?=$data[0][$x]["total"] ?? 0 ?>
                                onchange="this.form.submit()">
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
