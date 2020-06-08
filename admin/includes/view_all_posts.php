<table class="table table-border table-hover">
      <thead>
          <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comments</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>

      <?php
          $query = "SELECT * FROM posts";
          $select_posts = mysqli_query($connection, $query);
      
          while ($row = mysqli_fetch_assoc($select_posts)) {
              $post_id = $row['post_id'];
              $post_author = $row['post_author'];
              $post_title = $row['post_title'];
              $post_category_id = $row['post_category_id'];
              $post_status = $row['post_status'];
              $post_image= $row['post_image'];
              $post_tags= $row['post_tags'];
              $post_content= $row['post_content'];
              $post_comment_count= $row['post_comment_count'];
              $post_date= $row['post_date'];
              
              echo "
              <tr>
                  <td>$post_id</td>
                  <td>$post_author</td>
                  <td>$post_title</td>";
                
              $query_category = "SELECT * FROM categories WHERE cat_id = $post_category_id";
              $select_category_id = mysqli_query($connection, $query_category);
      
              confirmQuery($select_category_id);
        
              while ($row = mysqli_fetch_assoc($select_category_id)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];
            
                  echo "<td>$cat_title</td>";
              }
                  

              echo "    
                  <td>$post_status</td>
                  <td><img src='./images/$post_image' alt='$post_title' width='100px'></td>
                  <td>$post_tags</td>
                  <td>$post_content</td>
                  <td>$post_comment_count</td>
                  <td>$post_date</td>
                  <th><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></th>
                  <th><a href='posts.php?delete=$post_id'>Delete</a></th>
              </tr>
              ";
          };
      
      ?>



          
      </tbody>
<table>

<?php
    if (isset($_GET['delete'])) {
        $post_id_to_delete = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = $post_id_to_delete";
        $delete_query = mysqli_query($connection, $query);
        confirmQuery($delete_query);
        header("Location: posts.php");
    }
?>