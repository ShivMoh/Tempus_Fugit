<?php
    include "NavbarView.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/cash-register.css">
</head>

<body>
    <form action="/personal/Practice/oop-mvc/test/test" method="POST">
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
                <?php for($x = 0; $x < 10; $x++) : ?>
                    <tr>
                        <td class="col1">
                            <input type='text' name=<?='id'.$x; ?>>
                        </td>
                        <td class="col2">
                            <input type='text' name=<?='name'.$x; ?>>
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
        <button type="submit">Pay Bill</button>
    </form>
</body>
</html>
