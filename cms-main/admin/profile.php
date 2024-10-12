
    <?php include "includes/admin_header.php"; ?>

    <body>

    <div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
    <h1 class="jumbotron">
    Welcome to Admin
    <small><?php echo "{$_SESSION['username']}";?></small>
    </h1>

    <?php
    $query = "SELECT * FROM users where user_id = {$_SESSION['user_id']}";
    $querying_db = mysqli_query($db_connect,$query);

    while($row = mysqli_fetch_assoc($querying_db))
    {
        $f_name = $row['user_firstname'];
        $l_name = $row['user_lastname'];
        // $role = $_POST['role'];
        $username = $row['username'];
        $email= $row['user_email'];
        $p_word = $row['user_password'];
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="f_name">Firstname</label>
    <input type="text" name="firstname" id="f_name" class="form-control" value="<?php echo "$f_name"; ?>">
    </div>

    <div class="form-group">
    <label for="l_name">Lastname</label>
    <input type="text" name="lastname" id="lname" class="form-control" value="<?php echo "$l_name"; ?>">
    </div>
    <!-- 
    <div class="form-group">
    <label for="role"> </label>
    <select name="role" id="role" >
    <option value="subscriber">subscriber</option>
    <option value="admin">admin</option>
    </select>
    </div> -->


    <div class="form-group">

    <label for="uname">username</label>
    <input type="text" name="username" id="uname" class="form-control"value="<?php echo "$username"; ?>">
    </div>

    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo "$email"; ?>">
    </div>
    <div class="form-group">
    <label for="p_word">Password</label>
    <input type="password" name="password" id="p_word" class="form-control" value="<?php echo "$p_word";  ?>">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" name="update" value="update"></div>
    </form>
    <?php

    if(isset($_POST['update']))
    {
    $f_name = $_POST['firstname'];
    $l_name = $_POST['lastname'];
    // $role = $_POST['role'];
    $username = $_POST['username'];
    $email= $_POST['email'];
    $p_word = $_POST['password'];


    $query = "UPDATE users SET 
    user_firstname = '{$f_name}',
    user_lastname= '{$l_name}',
    -- user_role = '{$role}',
    username = '{$username}',
    user_email = '{$email}',
    user_password = '{$p_word}'
    where user_id = {$_SESSION['user_id']}";
    $updating_post = mysqli_query($db_connect,$query);
    $_SESSION['username'] = $username;
    header("Location: profile.php");
    }
    ?>  
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>