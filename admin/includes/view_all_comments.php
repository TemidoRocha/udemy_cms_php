<table class="table table-border table-hover">
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
              <th>Unapprove</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>

      <?php
          $query = "SELECT * FROM comments";
          $select_comments = mysqli_query($connection, $query);
      
          while ($row = mysqli_fetch_assoc($select_comments)) {
              $comment_id = $row['comment_id'];
              $comment_author = $row['comment_author'];
              $comment_content= $row['comment_content'];
              $comment_email = $row['comment_email'];
              $comment_post_id = $row['comment_post_id'];
              $comment_status = $row['comment_status'];
              $comment_date= $row['comment_date'];
              
              echo "
              <tr>
                  <td>$comment_id</td>
                  <td>$comment_author</td>
                  <td>$comment_content</td>";
                
              //   $query_category = "SELECT * FROM categories WHERE cat_id = $post_category_id";
              //   $select_category_id = mysqli_query($connection, $query_category);
      
              //   confirmQuery($select_category_id);
        
              //   while ($row = mysqli_fetch_assoc($select_category_id)) {
              //       $cat_id = $row['cat_id'];
              //       $cat_title = $row['cat_title'];
            
              //       echo "<td>$cat_title</td>";
              //   }
                  

              echo "    
                
                  <td>$comment_email</td>   
                  <td>$comment_status</td>";

              $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
              $select_post_id_query = mysqli_query($connection, $query);
              while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
              
                  echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
              }

              echo "<td>$comment_date</td>
                  <th><a href='posts.php?source=edit_post&p_id='>Approve</a></th>
                  <th><a href='posts.php?delete='>Unapprove</a></th>
                  <th><a href='posts.php?source=edit_post&p_id='>Edit</a></th>
                  <th><a href='comments.php?delete=$comment_id'>Delete</a></th>
              </tr>
              ";
          };
      
      ?>



          
      </tbody>
<table>

<?php
    if (isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
        $delete_query = mysqli_query($connection, $query);
        confirmQuery($delete_query);
        header("Location: comments.php");
    }
?>