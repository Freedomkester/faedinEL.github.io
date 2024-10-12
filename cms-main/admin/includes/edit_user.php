<?php edit_user()?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">

<?php
if(isset($_GET['edit_user']))
    {
        $user_id = $_GET['edit_user'];
       
        $query = "SELECT * from users where user_id = $user_id";
        $querying_db = mysqli_query($db_connect,$query);
        while($row = mysqli_fetch_assoc($querying_db))
        {
           $Firstname = $row['user_firstname'];
           $Lastname = $row['user_lastname'];
           $user_role = $row['user_role'];
           $usernamex = $row['username'];
           $user_email = $row['user_email'];
           $user_password = $row['user_password'];

?>
        <label for="f_name">Firstname</label>
        <input type="text" name="firstname" id="f_name" class="form-control" value="<?php echo "$Firstname" ?>">
    </div>

   
   

    <div class="form-group">
        <label for="l_name">Lastname</label>
        <input type="text" name="lastname" id="lname" class="form-control" value="<?php echo $Lastname ?>">
    </div>

    <div class="form-group">
        <label for="role"> </label>
    <select name="role" id="role" >
        <option value="<?php echo "{$user_role}" ;?>"><?php echo "{$user_role}" ;?></option>
        <?php 
        if($user_role == 'admin')
        {
            echo "<option value=subscriber>subscriber</option>";
        }
        else{
            echo "<option value=admin>admin</option>";
        }
        ?>
    </select>
    </div>


    <div class="form-group">
       
        <label for="uname">username</label>
        <input type="text" name="username" id="uname" class="form-control" value="<?php echo $usernamex ?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <label for="p_word">Password</label>
        <input type="password" name="password" id="p_word" class="form-control" value="<?php echo $user_password ?>">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" name="update" value="update"></div>
</form>
<?php }}
?>
