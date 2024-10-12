<?php
if(isset($_POST['create_post']))
    {
        $post_title = $_POST['title'];
        $post_cat_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['status'];
        $post_content = $_POST['post_content'];
        $post_date =  date('y-m-d');
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        if(!empty($post_title) && !empty($post_cat_id) 
        && !empty($post_author) && !empty($post_tags) 
        && !empty($post_content) && !empty($post_date) && !empty($post_image))
        {
        //function to move file from temp location to the desired location :
        move_uploaded_file($post_image_temp,"../images/{$post_image}");

        $query = "INSERT INTO posts(post_category_id, 
        post_title,post_author,
        post_date,post_image,post_content,
        post_tags,post_status)";

        //concatenating remaining query
        $query .= 
        " VALUES({$post_cat_id},'{$post_title}','{$post_author}',
        '{$post_date}','images/{$post_image}','{$post_content}',
        '{$post_tags}','{$post_status}')";

        //querying the database with my custom function;
        confirmQuery();
        $query = "SELECT * FROM posts";
        $q_db = mysqli_query($db_connect,$query);
        while($row = mysqli_fetch_assoc($q_db))
        {
            $post_id = $row['post_id'];
        }

        echo "Post added" . " <a href=../post.php?p_id=$post_id>View Post </a>";
    }
    else{
        echo "<p style='font-size: 1.6rem;'>Please fill all fields!</p>";
    }
}
?>


<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Categories : </label>
    <select name="post_category_id" id="post_category" >

            <?php 
                    $query = "SELECT * FROM categories ";
                    $querying_db = mysqli_query($db_connect,$query);
                    confirmQuery();
                    while($row = mysqli_fetch_array($querying_db))
                    {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        echo "<option value='{$cat_id}'>{$cat_title}</option>";
                    }
            ?>
    </select>
    </div>

   

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" name="post_author" id="" class="form-control">
    </div>


    <div class="form-group">
       
        <label for="title">Post Image</label>
        <input type="file" name="image" >
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" name="post_tags" id="" class="form-control">
    </div>

    <div class="form-group">
        <select name="status" id="">
            <option value="draft">Add to draft</option>
            <option value="published">Publish</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea name="post_content" id="" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" name="create_post" value="Add Post"></div>
</form>
