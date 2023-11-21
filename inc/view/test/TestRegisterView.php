<table class="table">
  <thead>
    <tr>
      <th scope="col">Item Id</th>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <form action="/personal/Practice/oop-mvc/test/test" method="POST">
        <?php for($x = 0; $x < 10; $x++) : ?>
            <tr>
                <th scope='row'>
                    <input type='text' name=<?='id'.$x; ?>>
                </th>
                <td>
                    <input type='text' name=<?='name'.$x; ?>>
                </td>
                <td>
                    <input type='text' name=<?='amount'.$x; ?>>
                </td>
                <td>
                    <input type='text' name=<?='discount'.$x; ?>>
                </td>
                <td>
                    <input type='text' name=<?='total'.$x; ?>>
                </td> 
            </tr>
        <?php endfor; ?>
        
        <tr>
            <th scope='row'>
                <button type="submit">Pay Bill</button>
            </th>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
                
            </td> 
        </tr>
        
    </form>
 
  </tbody>
</table>