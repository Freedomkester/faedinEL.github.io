    <?php include "db.php"; ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
  
    
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="admin/index.php">Admin</a></li>
    <li><a href="registration.php">Register</a></li>
  
    <?php 
    // our query;
    $query = "SELECT * FROM categories";

    // using the mysqli_query to query the database;
    $querying_db = mysqli_query($db_connect,$query);

    //fetching each row with mysqli_fetch_assoc() gotten 
    //from selecting all rows from the catergories table
    while($row = mysqli_fetch_assoc($querying_db))
    {
    //displaying each row-value as a link in our nav bar;
    $cat_title = $row["cat_title"];
    $cat_id = $row['cat_id'];
    echo "<li>
    <a  href='categories.php?category=$cat_id'>{$cat_title}</a>
    </li>";
    }
    ?>

    </ul>
    </div>
    <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
    </nav>