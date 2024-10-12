
<?php


if(isset($_POST['apply']))
{
    $task = $_POST['task_opt'];
    switch($task)
    {
        case 'publish':
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query = "UPDATE posts set post_status = 'published' where post_id = $checkBoxValue";
                $q_db = mysqli_query($db_connect,$query);

            }
            break;
        case 'draft':
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query = "UPDATE posts set post_status = 'draft' where post_id = $checkBoxValue";
                $q_db = mysqli_query($db_connect,$query);
            }
            break;
        case 'delete':
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query = "DELETE from posts where post_id = $checkBoxValue";
                $q_db = mysqli_query($db_connect,$query);

            }
            

    }
   
}

?>

<form action="" method="post">

<table class="table table-bordered table-dark">

<div id="bulkOptionContainer" class="col-xs-4">
<select name="task_opt" id="" class="form-control" style="margin-left: -15px;margin-bottom:10px;">
<!-- <option value="">Select Options</option> -->
<option value="publish">Publish</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
</select>
</div>
<div class="col-xs-4">
<input type="submit" value="apply" class="btn btn-success" name="apply" >
<a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
</div>
<thead>
<tr>
    <th><input type="checkbox" id="selectAll"></th>
    <th>Id</th>
    <th>Category</th>
    <th>Title</th>
    <th>Author</th>
    <th>Date</th>
    <th>Image</th>
    <th>Content</th>
    <th>Tags</th>
    <th>Comments</th>
    <th>Status</th>
    <th>Publish</th>
    <th>Posts</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
                           
<?php
 $query = "SELECT * from posts";
 $querying_db = mysqli_query($db_connect,$query);

 while($row = mysqli_fetch_assoc($querying_db))
 {
    $cat_id = $row['post_category_id'];
    $cat_query = "SELECT * from categories where cat_id = {$cat_id}";
    $querying_db2 = mysqli_query($db_connect,$cat_query);
    while($cat_row = mysqli_fetch_assoc($querying_db2))
    {
        $cat_title = $cat_row['cat_title'];
    }
        echo" <tr> ";
  ?>

<td><input type="checkbox" name="checkBoxArray[]" value="<?php echo "{$row['post_id']}";?>" class="boxes"></td>
<?php
        echo"<td>{$row['post_id']}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td>{$row['post_title']}</td>";
        echo "<td>{$row['post_author']}</td>";
        echo "<td>{$row['post_date']}</td>";
        echo "<td><img width='50px' src=../{$row['post_image']} /></td>";
        echo "<td>{$row['post_content']}</td>";
        echo"<td>{$row['post_tags']}</td>";
        echo"<td class='comm'>{$row['post_comment_count']}</td>";
        echo "<td>{$row['post_status']}</td>";
        echo "<td><a href='posts.php?pub_post={$row['post_id']}&source=view_all_posts'> Publish </a></td>";
        echo "<td><a href=../post.php?p_id={$row['post_id']}>View</a></td>";
        echo "<td><a href='posts.php?edit_post={$row['post_id']}&source=edit_post'> Edit </a></td>";
        echo " <td><a onClick=\" javascript: return confirm('Are you sure you want to delete');\" href='posts.php?delete={$row['post_id']}&source=view_all_posts'> Delete </a></td>";
        echo "</tr>";
     
     
 }
 ?>

</tbody>
</table>
</form>
<?php
//delete posts
delete_post();
publish_post();
?>