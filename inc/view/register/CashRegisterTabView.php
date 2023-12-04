<?php
    include __DIR__."/../NavbarView.php";
    $total = 0;
    $numberOfItems = 0;
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
    <h3 class="cash-register-instructions">Select your items from the dropdown menu below.</h3>
    <form  action="<?=BASE_URL."/register/create"?>" method="POST" id="order-form">
        <div class="cash-register-input-section">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Name of Item</th>
                        <th scope="col">Amount</th>   
                        <th scope="col">Action</th>   
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                <select name='name' required>
                                    <?php foreach($data['menuList'] as $menuItem) :?>
                                        <option value=<?=$menuItem['id'].",".$menuItem['name'];?>>
                                            <?=$menuItem['name'];?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                            <td>
                                <input 
                                    type='text' 
                                    name=<?='amount'?> 
                                    placeholder="Enter the number of items here..."
                                    required
                                >
                            </td>
                            <td>
                                <button 
                                    class="cash-register-add-item-button"
                                    type="submit">Add Item
                                </button>  
                            </td>
                        </tr>
                </tbody>
            </table>
       
        </div>
       
        
   
       
    <h3 class="cash-register-instructions">Items added will populate this table:</h3>
    </form>
        <table >
            <thead>
                <tr>
                    <th class="col1" scope="col">Item Id</th>
                    <th class="col2" scope="col">Name</th>
                    <th class="col3" scope="col">Amount</th>
                    <th class="col4" scope="col">Price</th>
                    <th class="col5" scope="col">Discount</th>
                  
                    <th class="col6" scope="col">Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach($data['billItems'] as $item) : ?>
                    
                    <tr>
                        <td class="col1">
                            <input type='text' 
                                name=<?='id-x';?>
                                value=<?=$item['id']?>
                                readonly
                            >
                        </td>
                        <td class="col2">
                            <input type='text' 
                                name=<?='name-x';?>
                                value=<?=$item['name']?>
                                readonly
                        >
                        </td>
                        <td class="col3">
                            <input 
                                type='text' 
                                name=<?='amount-x'?>
                                value=<?=$item['amount']?> 
                                readonly
                            >
                        </td>
                        <td class="col4">
                            <input 
                                type='text' 
                                name=<?='price-x'?>
                                value=<?=$item['price']?> 
                                readonly
                            >
                        </td>
                        <td class="col5">
                            <input type='text' 
                                name=<?='discount-x';?>
                                value=<?=$item['discount'];?>
                                readonly
                                >
                                
                        </td>
                        <td class="col6">
                            <input 
                                type='text' 
                                name=<?='total-x'?>
                                value=<?=$item['total']?>
                                readonly
                            >   
                        </td>
                        <td>
                            <form action="<?=BASE_URL."/register/delete/".$item['id']?>" method="POST" id="order-form">
                                <button type="submit" class="cash-register-delete-button">
                                    <img src="<?=RESOURCE_URL."trash-icon.png"?>" alt="">
                                </button>   
                            </form>
                        </td>
                    </tr>
                <?php 
                    $total += $item['total'];
                    $numberOfItems += 1;
                ?>
                <?php endforeach ?>
            </tbody>
        </table>

        <form action="<?=BASE_URL."/register/update"?>" method="POST" id="confirm-form">
            <div class="container">  
                <input 
                    type="hidden" 
                    name="total" 
                   
                    value=<?=$total?>
                    >
                <input 
                    type="hidden" 
                    name="number-of-items" 
                    id="confirm-button-number-of-items" 
                    value=<?=$numberOfItems?>
                    >       
                <button 
                    class="cash-register-button button-2" 
                    type="submit" 
                    form="confirm-form">
                        Confirm
                    </button>
            </div>
        </form>

        <form action="<?=BASE_URL."/bill"?>" method="POST" id="manage-bills-form">
            <div class="container">         
                <button class="cash-register-button button-1" type="submit" form="manage-bills-form">Manage Bills</button>
            </div>
        </form>

        <script>
            let confirmButtonItems = document.getElementById("confirm-button-number-of-items");
            let confirmButton = document.getElementsByClassName("button-2")[0];

            confirmButtonItems.value == 0 ? confirmButton.disabled = true : confirmButton.disabled = false;
        </script>
</body>
</html>
