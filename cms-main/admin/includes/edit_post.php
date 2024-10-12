
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <?php edit_post();?>
    <?php
    if(isset($_GET['edit_post']))
    {
    $post_id = $_GET['edit_post'];

    $query = "SELECT * FROM posts WHERE post_id = $post_id ";
    $querying_db = mysqli_query($db_connect,$query);
    while($row = mysqli_fetch_array($querying_db))
    {
    $post_title = $row['post_title'];
    $post_cat_id = $row['post_category_id'];
    $post_author = $row['post_author'];
    $post_tags = $row['post_tags'];
    $post_status = $row['post_status'];
    $post_content = $row['post_content'];
    $post_date =  date('y-m-d');
    $post_image = $row['post_image'];


    ?>
    <label for="title">Post Title</label>
    <input type="text" name="title" id="" class="form-control" value='<?php if(isset($post_title)){echo $post_title;} ?>' >
    </div>

    <div class="form-group">
    <label for="post_category">Categories :</label>
    <select name="post_category_id" id="post_category">
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
    <label for="post_author">Post Author</label>
    <input type="text" name="post_author" id="" class="form-control" value='<?php if(isset($post_author)){echo $post_author;} ?>' >
    </div>


    <div class="form-group">
    <img width="100" style="margin-bottom: 1rem;" src="<?php echo "../$post_image";?>" alt="">

    <input type="file" name="image" value=<?php if(isset($post_image)){echo $post_image;} ?> >
    </div>

    <div class="form-group">
    <label for="title">Post Tags</label>
    <input type="text" name="post_tags" id="" class="form-control" value='<?php if(isset($post_tags)){echo $post_tags;} ?>' >
    </div>
    <div class="form-group">
    <label for="title">Post Status</label>
    <select name="post_status">
    <option value="draft">draft</option>
    <option value="published">publish</option>
    </select>
    </div>
    <div class="form-group">
    <label for="title">Post Content</label>
    <textarea name="post_content" id="" class="form-control" cols="30" rows="10" ><?php if(isset($post_content)){echo $post_content;} ?></textarea>
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary" name="update_post" value="Update Post"></div>

    </form>
    <?php }} ?>
    <!-- editing post -->
  