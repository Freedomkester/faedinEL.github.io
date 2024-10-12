<?php
if(isset($_POST['add_user']))
    {
        $f_name = $_POST['firstname'];
        $l_name = $_POST['lastname'];
        $role = $_POST['role'];
        $username = $_POST['username'];
        $email= $_POST['email'];
        $p_word = $_POST['password'];

        if(!empty($f_name) && !empty($l_name) && !empty($role) 
        && !empty($username) && !empty($email) && !empty($p_word))
        {

        

        $query = "INSERT INTO users(user_firstname, 
        user_lastname,user_role,
        username,user_email,user_password)";

        //concatenating remaining query
        $query .= 
        " VALUES('{$f_name}','{$l_name}','{$role}',
        '{$username}','{$email}','{$p_word}')";

        //querying the database with my custom function;
        confirmQuery();
        echo "User Added Sucessfully! " . "<a href=users.php?source=view_all_users>View User </a>";
    }
    else{
        echo "<p style='font-size: 1.6rem;'>Please fill all fields!</p>";
    }
}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="f_name">Firstname</label>
        <input type="text" name="firstname" id="f_name" class="form-control">
    </div>

   
   

    <div class="form-group">
        <label for="l_name">Lastname</label>
        <input type="text" name="lastname" id="lname" class="form-control">
    </div>

    <div class="form-group">
        <label for="role"> </label>
    <select name="role" id="role" >
        <option value="subscriber">subscriber</option>
        <option value="admin">admin</option>
    </select>
    </div>


    <div class="form-group">
       
        <label for="uname">username</label>
        <input type="text" name="username" id="uname" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="p_word">Password</label>
        <input type="password" name="password" id="p_word" class="form-control">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" name="add_user" value="Add User"></div>
</form>
