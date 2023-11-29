<?php
    include "NavbarView.php";
    $total = 0;
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
    <form action="<?=BASE_URL."/register/create"?>" method="POST" id="order-form">
        <table>
            <thead>
                <tr>
                    <th class="col2" scope="col">Name</th>
                    <th class="col4" scope="col">Amount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="col2">
                            <select name=<?='name';?>>
                                <option disabled selected>Select an item</option>
                                <?php foreach($data['menuList'] as $menuItem) :?>
                                    <option value=<?=$menuItem['id'].",".$menuItem['name'];?>>
                                        <?=$menuItem['name'];?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td class="col3">
                            <input 
                                type='text' 
                                name=<?='amount'?> 
                            >
                        </td>
                        <td>
                            <button type="submit">Add Item</button>   
                        </td>
                        
                    </tr>

                    
            </tbody>
        </table>
        
        </div>
      
 


        
    </form>
            <table>
            <thead>
                <tr>
                    <th class="col1" scope="col">Item Id</th>
                    <th class="col2" scope="col">Name</th>
                    <th class="col4" scope="col">Amount</th>
                    <th class="col3" scope="col">Discount</th>
                    <th class="col5" scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
             
                <tbody>
        <?php foreach($data['billItems'] as $item) : ?>
            
            <tr>
                <td class="col1">
                    <input type='text' 
                    name=<?='id-x';?>
                    value=<?=$item['id']?>
                    >
                </td>
                <td class="col2">
                    <input type='text' 
                    name=<?='name-x';?>
                    value=<?=$item['name']?>
                >
                </td>
                <td class="col3">
                    <input 
                        type='text' 
                        name=<?='amount-x'?>
                        value=<?=$item['amount']?> 
                    >
                </td>
                <td class="col4">
                    <input type='text' 
                        name=<?='discount-x';?>
                        value=<?=$item['discount'];?>>
                </td>
                <td class="col5">
                    <input 
                        type='text' 
                        name=<?='total-x'?>
                        value=<?=$item['price']?>
                    >   
                </td>
                <td>

           
                    <form action="<?=BASE_URL."/register/delete/".$item['id']?>" method="POST" id="order-form">
                        <button type="submit">Delete</button>   
                    </form>
                </td>
            </tr>
        <?php $total += $item['price']?>
        <?php endforeach ?>
        </tbody>
        </table>
        
        <form action="<?=BASE_URL."/register/create"?>" method="POST" id="order-form">
            <div class="container">
                <label for="total">Total</label>
                <textarea 
                    name="total" 
                    id="total"
                  
                    >
                    <?=$total?>
                </textarea>

                <button class="button-1" type="submit" form="order-form">Confirm & Print Bill</button>
                <button class="button-2" type="submit" form="order-form">Confirm</button>
                <button class="button-1" type="submit" form="order-form">Manage Bills</button>
            </div>
        </form>
</body>
</html>
