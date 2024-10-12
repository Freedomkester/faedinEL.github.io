
    <?php include "includes/admin_header.php"; ?>

    <body >

    <div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
    <div class="col-lg-12">
    <h1 class="jumbotron">
    Welcome to Admin
    <small><?php echo "{$_SESSION['username']}" ?></small>
    </h1>

    <?php

    //   if(isset($_GET['source']))
    //   {
    //     $source = $_GET['source'];
    //     switch($source)
    //     {

    //         case 'view_all_comments':

    //             break;
    //     }
    //   }
    include "includes/view_all_comments.php";
    ?>    
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>