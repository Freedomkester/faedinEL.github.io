<table class="table table-bordered">
<thead>
<tr>
    <th>Id</th>
    <th>Author</th>
    <th>Comment</th>
    <th>Email</th>
    <th>Status</th>
    <th>In Response To</th>
    <th>Date</th>
    <th>Approve</th>
    <th>Disapprove</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>



<?php
 

 $query = "SELECT * from comments";
 $querying_db = mysqli_query($db_connect,$query);

 while($row = mysqli_fetch_assoc($querying_db))
 {
    // $comment_id = $row['comment_post_id'];
    // $comm_query = "SELECT * from comments where comment_id = {$comment_id}";
    // $querying_db2 = mysqli_query($db_connect,$comm_query);
    // while($comm_row = mysqli_fetch_assoc($querying_db2))
    // {
    //     $comment_author = $comm_row['comment_author'];
    // }
    $comment_id = $row['comment_id'];
    $comment_post_id  = $row['comment_post_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_date = $row['comment_date'];
    $comment_status = $row['comment_status'];
    $comment = $row['comment_content'];
    $title=$row['post_title'];

   


     echo"
<tr>
    <td>$comment_id</td>
    <td>$comment_author</td>
    <td>$comment</td>
    <td>$comment_email</td>
    <td>$comment_status</td>

    

    <td><a href=../post.php?p_id=$comment_post_id>$title</a></td>
    <td>$comment_date</td>
    <td><a href='comments.php?status=approve&id=$comment_id&cp_id=$comment_post_id'>approve</a></td>
    <td><a href='comments.php?status=disapprove&id=$comment_id'>disapprove</a></td>
    <td><a href='comments.php?delete=$comment_id&cp_id=$comment_post_id'>delete</a></td>
 </tr>
     
     ";
 }
 
 ?>

</tbody>
</table>
<?php
//delete posts
delete_comment();
approve();
?>