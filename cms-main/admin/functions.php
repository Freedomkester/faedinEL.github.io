<?php
function confirmQuery()
{
    global $query;
    global $db_connect;
    try{$querying_db = mysqli_query($db_connect,$query);} 
    catch(mysqli_sql_exception){
        die("Query Failed : ".mysqli_error($db_connect));}
}

function insert_categories()
{
        global $db_connect;
    if(isset($_POST['submit']))
    {
    $cat_title = $_POST['cat_title'];
    if(empty($cat_title))
    {
    echo "<p style='font-size: 1.5rem'>This field cannot be empty!</p>";
    }
    else
    {
    $query = "INSERT INTO categories(cat_title)VALUE('{$cat_title}')";

    $create_categroy_query = mysqli_query($db_connect,$query);

    //checking if the query runs;
    if(!$create_categroy_query){
        die('QUERY FAILED' + mysqli_error($db_connect));
    }
    }
    } 
}

function find_categories() 
{
    global $db_connect;
    $query = "SELECT * FROM categories";
    $querying_db = mysqli_query($db_connect,$query);
    while($row = mysqli_fetch_array($querying_db))
    {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo 
    "<tr>
    <td>{$cat_id}</td>
    <td>{$cat_title}</td>
    <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>
    <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>
    </tr>";
    }
}

function delete_categories()
{
    global $db_connect;
    if(isset($_GET['delete']))
    {
    $the_cat_id = $_GET['delete'];

    $query = "DELETE FROM categories where cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($db_connect,$query);
    header("Location: categories.php");
    }
}
function delete_post()
{
       
    if(isset($_GET['delete']))
    { global $db_connect;
      $the_post_id = $_GET['delete'];
      $query = "DELETE FROM posts where post_id = {$the_post_id}";
      $delete_query = mysqli_query($db_connect,$query);
      header("Location: posts.php?source=view_all_posts");
    }
    

}
function delete_comment()
{
       
    if(isset($_GET['delete']))
    { global $db_connect;
      $the_comment_id = $_GET['delete'];
      $query = "DELETE FROM comments where comment_id = {$the_comment_id}";
      $delete_query = mysqli_query($db_connect,$query);

      $query3 = "UPDATE posts set post_comment_count = post_comment_count - 1 where post_id = {$_GET['cp_id']}";
      $q_db = mysqli_query($db_connect,$query3);
      header("Location: comments.php");
    }
    

}

function delete_user()
{
       
    if(isset($_GET['delete']))
    { global $db_connect;
      $the_user_id = $_GET['delete'];
      $query = "DELETE FROM users where user_id = {$the_user_id}";
      $delete_query = mysqli_query($db_connect,$query);
      header("Location: users.php?source=view_all_users");
    }
}

function edit_post()
{
    if(isset($_POST['update_post']))
    {
        global $db_connect;
        $post_title = $_POST['title'];
        $post_cat_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_tags = $_POST['post_tags'];
        $post_status = $_POST['post_status'];
        $post_content = $_POST['post_content'];
        $post_date =  date('Y-m-d');
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($post_image_temp,"../images/{$post_image}");

        $the_post_id = $_GET['edit_post'];

        if(empty($post_image))
        {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($db_connect,$query);

            while($row = mysqli_fetch_assoc($select_image))
            {
                $post_image = $row['post_image'];
                
            }
             $query = "UPDATE posts SET 
        post_title = '{$post_title}',
        post_category_id = {$post_cat_id},
        post_author = '{$post_author}',
        post_tags = '{$post_tags}',
        post_status = '{$post_status}',
        post_content = '{$post_content}',
        post_date = '{$post_date}'
         where post_id = {$the_post_id}";
        $updating_post = mysqli_query($db_connect,$query);
        }
        else{
            $query = "UPDATE posts SET 
            post_title = '{$post_title}',
            post_category_id = {$post_cat_id},
            post_author = '{$post_author}',
            post_tags = '{$post_tags}',
            post_status = '{$post_status}',
            post_content = '{$post_content}',
            post_date = '{$post_date}',
            post_image = 'images/{$post_image}' where post_id = {$the_post_id}";
            $updating_post = mysqli_query($db_connect,$query);
        }
        echo "Post updated "."<a href=../post.php?p_id=$the_post_id>View post</a>"." or "."<a href=posts.php?source=view_all_posts>Edit more posts</a>";
    }
}
function approve(){
    if(isset($_GET['status'])){
        $the_comment_id = $_GET['id'];
        if($_GET['status'] == 'approve'){
            
            $queryA = "UPDATE comments set comment_status = 'approved' where comment_id = $the_comment_id " ;
            global $db_connect;
            try{$querying_db = mysqli_query($db_connect,$queryA);} 
            catch(mysqli_sql_exception){
                die("Query Failed :".mysqli_error($db_connect));}
            
                $queryp = "UPDATE posts set post_comment_count = post_comment_count + 1 where post_id = {$_GET['cp_id']}";
                $q_db = mysqli_query($db_connect,$queryp);
            header("Location: comments.php");    
        }
        elseif($_GET['status'] == 'disapprove'){
            $queryA = "UPDATE comments set comment_status = 'disapproved' where comment_id = $the_comment_id " ;
            global $db_connect;
            try{$querying_db = mysqli_query($db_connect,$queryA);} 
            catch(mysqli_sql_exception){
                die("Query Failed :".mysqli_error($db_connect));}
            header("Location: comments.php");   
        }
    }
}

function chg_user()
{global $db_connect;
    if(isset($_GET['change']))
    {$user_id = $_GET['id'];
        if($_GET['change'] == 'admin')
        {
            $query1 = "UPDATE users set user_role = 'admin' where user_id = $user_id";
            $q_db = mysqli_query($db_connect,$query1);
            header("Location: users.php?source=view_all_users");
        }
        if($_GET['change'] == 'subscriber')
        {
            $query2 = "UPDATE users set user_role = 'subscriber' where user_id = $user_id";
            $q_db = mysqli_query($db_connect,$query2);
            header("Location: users.php?source=view_all_users");
        }
    }
}
function edit_user()
{global $db_connect;
    if(isset($_POST['update']))
    {
    $f_name = $_POST['firstname'];
    $l_name = $_POST['lastname'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $email= $_POST['email'];
    $p_word = $_POST['password'];

    $query = "SELECT randsat  from users";
    $select_randsat_query = mysqli_query($db_connect,$query);

    $row = mysqli_fetch_array($select_randsat_query);
    $salt = $row['randsat'];
    $p_word = crypt($p_word,$salt);

       
        $query = "UPDATE users SET 
        user_firstname = '{$f_name}',
        user_lastname= '{$l_name}',
        user_role = '{$role}',
        username = '{$username}',
        user_email = '{$email}',
        user_password = '{$p_word}'
         where user_id = {$_GET['edit_user']}";
        $updating_post = mysqli_query($db_connect,$query);
        echo "Updated successfully!";
    }
}

function publish_post()
{
    global $db_connect;
    if(isset($_GET['pub_post']))
    {
        $id = $_GET['pub_post'];
       $query = "UPDATE posts set post_status = 'published'  where post_id = $id";
       $q_db = mysqli_query($db_connect,$query);
       header("Location: posts.php?source=view_all_posts") ;
    }
}
