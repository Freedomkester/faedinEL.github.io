
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
    <?php

    if(isset($_GET['source']))
    {
    $source = $_GET['source'];
    switch($source)
    {
    case 'add_user':
    include "includes/add_user.php";
    break;
    case 'edit_users':
    include "includes/edit_user.php";
    break;


    case 'view_all_users':
    include "includes/view_all_users.php";
    break;
    }
    }

    ?>    
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>