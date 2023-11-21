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
            <td>
              <form action="/personal/Practice/oop-mvc/user/delete" method="post">
                  <input type="hidden" name="delete-user" value="<? $user->get_id() ?>">
                  <button class="btn" type="submit">Delete User</button>
              </form>
            </td>
            <td>
              <form action="/personal/Practice/oop-mvc/user/update" method="post">
                  <input type="hidden" name="update-user" value="<? $user->get_id() ?>">
                  <button class="btn" type="submit">Update User</button>
              </form>
            </td>
            <td>
              <form action="/personal/Practice/oop-mvc/user/findOne" method="post">
                  <input type="hidden" name="select-user" value="<? $user->get_id() ?>">
                  <button class="btn" type="submit">Select User</button>
              </form>
            </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
  
</table>

<td>
           