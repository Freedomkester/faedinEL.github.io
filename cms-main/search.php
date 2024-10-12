    <!DOCTYPE html>
    <html lang="en">

    <!-- linking php header-markup -->
    <?php include "includes/header.php"; ?>

    <body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Blog Sidebar Widgets Column -->
    <?php include "includes/sidebar.php"; ?>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

    <!-- <h1 class="page-header">
    Page Heading
    Demon Slayer Corp
    <small>
    Secondary Text

    </small>
    </h1> -->

    <!-- First Blog Post -->


    <?php
    if(isset($_POST['searchbtn']))
    {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' and post_status = 'published'";

    $search_query = mysqli_query($db_connect,$query);

    if(!$search_query)
    {
    die("invalid!".mysqli_error($db_connect));
    }

    $num = mysqli_num_rows($search_query);

    if($num == 0)
    {
    echo " no result " ;

    }
    else{
    //Displaying dynamic data from our cms database
    //displaying data from the posts table;

    //our query


    //querying the database;


    // using a loop to continously assign rows in our posts 
    //table to variables so as to display values dynamically 
    //in our webpage;

    while($row = mysqli_fetch_assoc($search_query))
    {
    //assigning rows from posts table to variables;
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
    $post_image = $row['post_image'];
    $post_id = $row['post_id'];
    //closing php so as to put html btw the loop;

    ?>

    <h2>
    <a href="post.php?p_id=<?php echo "{$post_id}" ?>"><?php echo "{$post_title}"; ?></a>
    </h2>
    <p class="lead">
    by <a href="post.php?p_id=<?php echo "{$post_id}" ?>"><?php echo "{$post_author}" ;?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> <?php echo "{$post_date}"; ?> </p>

    <img class="img-responsive" src="<?php echo "{$post_image}"; ?>" alt="">

    <p style="margin-top:3rem;margin-bottom:2rem"><?php echo "{$post_content}"; ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo "{$post_id}" ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>


    <?php
    //opening php tags to add the enclosing brace for the loop;
    } 

    }
    }
    ?> 


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
