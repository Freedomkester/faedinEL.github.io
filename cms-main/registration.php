
    <?php  include "includes/header.php"; ?>
    <!-- Navigation -->
    <?php include "includes/post_navigation.php"; ?>
    <?php 
     if(isset($_POST['submit']))
     {
     //validating inputs
     if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
      {
       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['password'];

       //escaping inputed fields
       $username = mysqli_real_escape_string($db_connect,$username);
       $email = mysqli_real_escape_string($db_connect,$email);
       $password = mysqli_real_escape_string($db_connect,$password);

        //encrypting password;
        $query = "SELECT randsat from users";
        $select_randsat_query = mysqli_query($db_connect,$query);
        $row = mysqli_fetch_array($select_randsat_query);
        $salt = $row['randsat'];
        $password = crypt($password,$salt);
        
        //inserting inputed fields to database
        $query = "INSERT INTO users(username,user_email,user_password,user_role)
                  Values('{$username}','{$email}','{$password}','subscriber')";
        confirmQuery();
        echo "<a href='index.php' style='font-size: 1.5rem;margin:auto;'>Your registration has been submitted.Pls Login</a>";
        
     }
     else{
        echo "<p style='font-size: 1.5rem;text-align:center;'>Please fill all fields!</p>";
     }
    }
    ?>
    <!-- Page Content -->
    <div class="container">

    <section id="login">
    <div class="container">
    <div class="row">
    <div class="col-xs-9 col-xs-offset-1">
    <div class="form-wrap">
    <h1>Register</h1>
    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
    <div class="form-group">
    <label for="username" class="sr-only">username</label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
    </div>
    <div class="form-group">
    <label for="email" class="sr-only">Email</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
    </div>
    <div class="form-group">
    <label for="password" class="sr-only">Password</label>
    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
    </div>

    <input style="color:black;" type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
    </form>

    </div>
    </div> <!-- /.col-xs-12 -->
    </div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>

    <?php include "includes/footer.php";?>
