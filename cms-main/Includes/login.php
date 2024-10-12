<?php 
session_start();
include "db.php";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
   //cleaning up data for security;
    $username = mysqli_real_escape_string($db_connect,$username);
    $password = mysqli_real_escape_string($db_connect,$password);

    $query = "SELECT  * FROM users where username = '{$username}'";
    try{
        $querying_db = mysqli_query($db_connect,$query);

    }
    catch(mysqli_sql_exception){
        die("Query Faild:".mysqli_error($db_connect));

    }
    while($row = mysqli_fetch_assoc($querying_db))
    {
        $id = $row['user_id'];
        $f_name = $row['user_firstname'];
        $l_name = $row['user_lastname'];
        $u_password = $row['user_password'];
        $u_role = $row['user_role'];
        $u_name = $row['username'];
        $u_email = $row['user_email'];

    }
    $password = crypt($password,$u_password);

    if($username === $u_name && $password === $u_password )
    {
        $_SESSION['username'] = $u_name;
        $_SESSION['firstname'] = $f_name;
        $_SESSION['lastname'] = $l_name;
        $_SESSION['user_role'] = $u_role;
        $_SESSION['user_email'] = $u_email;
        $_SESSION['user_id'] = $id;
        $_SESSION['password'] = $u_password;
        header("Location: ../admin/index.php");
    }
    else{
        header("Location: ../index.php");
    }

}