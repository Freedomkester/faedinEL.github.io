
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
    <small><?php echo "{$_SESSION['username']}" ?></small>
    </h1>
    </div>
    <?php

    if(isset($_GET['source']))
    {
    $source = $_GET['source'];
    switch($source)
    {
    case 'add_post':
    include "includes/add_post.php";
    break;
    case 'edit_post':
    include "includes/edit_post.php";
    break;


    case 'view_all_posts':
    include "includes/view_all_posts.php";
    break;
    }
    }

    ?>    
    </div>
    <!-- /.container-fluid -->
    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>