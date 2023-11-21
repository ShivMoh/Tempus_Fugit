<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Role</th>
      <th scope="col">Role</th>
      <th scope="col">Role</th>
    </tr>
  </thead>

  <tbody>
    <form action="/personal/Practice/oop-mvc/user/view/UserRegistration" method="POST">
        <input type="hidden" name="add-user">
        <button class="btn" type="submit">Add New User</button>
    </form>
    <?php foreach($data as $user) : ?>
        <tr>
            <td><?=$user->get_first_name() ?></td>
            <td><?=$user->get_last_name() ?></td>
            <td><?=$user->get_email() ?></td>
            <td><?=$user->get_role() ?></td>
            
              <?php
                $user_id = $user->get_id();
                 echo "<td>
                  <form action='/personal/Practice/oop-mvc/user/delete/$user_id' method='POST'>
                      <button class='btn' type='submit'>Delete User</button>
                  </form>
                 </td>";
                
                 echo "
                  <td>
                    <form action='/personal/Practice/oop-mvc/user/update/$user_id' method='POST'>
                        <button class='btn' type='submit'>Update User</button>
                    </form>
                  </td>";

                 echo "
                  <td>
                    <form action='/personal/Practice/oop-mvc/user/findOne/$user_id' method='POST'>
                      <button class='btn' type='submit'>Select User</button>
                    </form>
                  </td>
                 ";
               ?>
           
        </tr>
    <?php endforeach; ?>
  </tbody>
  
</table>

<td>
           