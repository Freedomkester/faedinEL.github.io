<table class="table table-bordered ">
<thead>
<tr>
    <th>Id</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Admin</th>
    <th>Subscribe</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
                           
<?php
 $query = "SELECT * from users";
 $querying_db = mysqli_query($db_connect,$query);

 while($row = mysqli_fetch_assoc($querying_db))
 {
    $user_id = $row['user_id'];
     echo"
<tr>
     <td>{$row['user_id']}</td>
     <td>{$row['username']}</td>
     <td>{$row['user_firstname']}</td>
     <td>{$row['user_lastname']}</td>
     <td>{$row['user_email']}</td>
     <td>{$row['user_role']}</td>
     <td><a href='./users.php?change=admin&source=view_all_users&id=$user_id'>admin</a></td>
      <td><a href='./users.php?change=subscriber&source=view_all_users&id=$user_id'> subscriber</a></td>
      <td><a href='users.php?source=edit_users&edit_user=$user_id'>Edit</a></td>
     <td><a href='users.php?source=view_all_users&delete={$row['user_id']}'> Delete </a></td>
     
 </tr>";
 }
 ?>
</tbody>
</table>
<?php
//delete posts
delete_user();
chg_user();
?>