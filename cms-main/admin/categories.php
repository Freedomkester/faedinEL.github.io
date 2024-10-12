
    <?php include "includes/admin_header.php"; ?>

    <body>

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


    <div class="col-xs-6">

    <?php
    //validating input if empty should show hint;
    insert_categories();
    ?>
    <!-- add category form -->
    <form action="" method="post">
    <div class="form-group">
    <label for="cat_title">Add category</label>
    <input type="text" name="cat_title"  class="form-control">
    </div>
    <div class="form-group"><input class="btn btn-primary" type="submit" value="Add category" name="submit"></div>
    </form>

    <!-- edit category form -->
    <?php
    //editing categories with included update.php
    if(isset($_GET['edit']))
    {
    $cat_id = $_GET['edit']; 
    include "includes/edit_category.php";
    }
    ?>

    </div><!--Add category form-->

    <div class="col-xs-6">
    <table class="table table-bordered ">
    <thead>
    <tr>
    <th>Id</th>
    <th>Category Title</th>
    </tr>
    </thead>
    <tbody>
    <?php
    find_categories();
    ?>

    <?php
    delete_categories();
    ?>
    </tbody>
    </table>
    </div>   
    </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- footer -->
    <?php include "includes/admin_footer.php"; ?>