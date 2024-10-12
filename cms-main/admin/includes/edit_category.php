
    <form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Edit category</label>

    <?php
    if(isset($_GET['edit']))
    {
    $cat_id = $_GET['edit'];
    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
    $querying_db = mysqli_query($db_connect,$query);
    while($row = mysqli_fetch_array($querying_db))
    {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    ?>
    <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
    <?php } }?>                                

    </div>
    <div class="form-group"><input class="btn btn-primary" type="submit" value="Update category" name="update"></div>
    </form>
    <?php
    //update query   
    if(isset($_POST['update']))
    {
    $the_cat_title = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title = '{$the_cat_title}' where cat_id = {$cat_id}";
    $update_query = mysqli_query($db_connect,$query);
    if(!$update_query){
    die("query failed". mysqli_error($db_connect));
    }
    } 

    ?>

