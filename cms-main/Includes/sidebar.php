    <div class="col-md-4 sidebar" >


    <!-- Blog Search Well -->
    <form action="search.php" method="post">
    <div class="well search">
    <h4>Search posts</h4>
    <div class="input-group">
    <input name="search" type="text" class="form-control">
    <span class="input-group-btn">
    <button name="searchbtn" class="btn btn-default" type="submit">
    <span class="glyphicon glyphicon-search"></span>
    </button>
    </span>
    </div>
    <!-- /.input-group -->
    </div>
    </form> 

    
    <?php 
    
    if(!isset($_SESSION['username']))
    include "login-main.php";
    ?>

    <!-- Blog Categories Well -->

    <?php
    $query = "SELECT * FROM categories";
    $querying_db = mysqli_query($db_connect,$query);
    ?>

    <div class="well categories">
    <h4>Categories</h4>
    <div class="row">
    <div class="col-lg-12">
    <ul class="list-unstyled">
    <?php
    while($row = mysqli_fetch_array($querying_db))
    {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];
    echo"<li><a href='categories.php?category=$cat_id'>{$cat_title}</a></li>";
    }


    ?>
    </ul>
    </div>
    <!-- /.col-lg-6 -->

    <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    </div>

    </div>