    <!DOCTYPE html>
    <html lang="en">

    <!-- linking php header-markup -->
    <?php include "includes/header.php"; ?>

    <body>

    <!-- Navigation -->
    <?php include "includes/post_navigation.php"; ?>
     <!-- Blog Sidebar Widgets Column -->
     <?php include "includes/sidebar.php"; ?>
    <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">



    <!-- First Blog Post -->

    <?php


    if(isset($_GET['p_id']))
    {
    $post_id = $_GET['p_id'];
    }
    //our query
    $query = "SELECT * FROM posts where post_id = {$post_id} ";

    //querying the database;
    $querying_db = mysqli_query($db_connect,$query);

    // using a loop to continously assign rows in our posts 
    //table to variables so as to display values dynamically 
    //in our webpage;

    while($row = mysqli_fetch_assoc($querying_db))
    {
    //assigning rows from posts table to variables;

    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
    //closing php so as to put html btw the loop;

    }

    ?>

    <h2>
    <a href=""><?php echo "{$post_title}"; ?></a>
    </h2>
    <p class="lead">
    by <a href=""><?php echo "{$post_author}" ;?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"; ?> </p>

    <img style="margin-bottom:3rem;" class="img-responsive" src="<?php echo "{$post_image}"; ?>" alt="">

    <p style="margin-bottom:2rem;"><?php echo "{$post_content}"; ?></p>
   

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
    <h4>Leave a Comment:</h4>
    <?php 
    if(isset($_POST['create_comment']))
    {if(!$_POST['comment_author'] == "" && !$_POST['comment_email'] == "" && !$_POST['comment'] == "")
    {
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment = $_POST['comment'];
    $post_id = $_GET['p_id'];
    $comment_date = date('y-m-d');
    $comment_status = '';
    $title = $post_title;

    $query = "INSERT INTO comments(post_title, 
    comment_author,comment_email,
    comment_date,comment_content,comment_status,comment_post_id
    )";

    //concatenating remaining query
    $query .= 
    " VALUES('{$title}','{$comment_author}','{$comment_email}',
    '{$comment_date}','{$comment}',
    '{$comment_status}',{$post_id})";
    confirmQuery();

    }
    else{
        echo "<p style='font-size: 1.6rem;'>Please fill all fields!</p>";
    }
    }




    ?>

    <form method="post" action="">
    <div class="form-group">
    <label for="comment_author">Author</label>
    <input class="form-control" type="text" name="comment_author"></input>
    </div>
    <label for="">Email</label>
    <div class="form-group">
    <input class="form-control" type="email" name="comment_email"></input>
    </div>

    <div class="form-group">
    <label for="comment">Your Comment</label>
    <textarea class="form-control" rows="3" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
    </form>


    </div>


    <?php
    $post_id = $_GET['p_id'];
    $query_1 = "SELECT * FROM comments where comment_post_id = $post_id and comment_status = 'approved' ORDER BY comment_id desc";
    $q_db = mysqli_query($db_connect,$query_1);
    while($comm_row = mysqli_fetch_assoc($q_db))
    {
    $comment_author = $comm_row['comment_author'];
    $comment_date = $comm_row['comment_date'];
    $comment = $comm_row['comment_content'];


    ?>
    <!-- Posted Comments -->
    <!-- Comment -->
    <div class="media">
    <a class="pull-left" href="#">
    <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
    <h3 class="media-heading"><?php echo "{$comment_author}"?>
    <small><?php echo "{$comment_date}"?></small>
    </h3>
    <p ><?php echo "{$comment}"?></p>
    </div>
    </div>
    <?php }?>

    </div>

   
    </div>
    <!-- /.row -->

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>
    </div>
    <!-- /.container -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
