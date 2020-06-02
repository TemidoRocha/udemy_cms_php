<?php
          if (isset($_GET['p_id'])) {
              $id_to_edit = $_GET['p_id'];
          }
          
          $query = "SELECT * FROM posts WHERE post_id = $id_to_edit ";
          $select_posts_by_id = mysqli_query($connection, $query);
      
          while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
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
          };
      
          if (isset($_POST['update_post'])) {
              $id_to_edit = $_GET['p_id'];
              $post_title = $_POST['post_title'];
              $post_category_id = $_POST['post_category'];
              $post_status = $_POST['post_status'];
    
              // $post_image = $_FILES['image']['name'];
              // $post_image_temp = $_FILES['image']['tmp_name'];
    
    
              $post_tags = $_POST['post_tags'];
              $post_content = $_POST['post_content'];
              $post_date = date('d-m-y');

       
              // move_uploaded_file($post_image_temp, "../images/$post_image");
       
       
              $query_update = "UPDATTE posts SET ";
              $query_update .= "post_category_id = '$post_category_id', ";
              $query_update .= "post_title = '$post_title', ";
              $query_update .= "post_date = now(), ";
              // $query_update .= "post_image = '$post_image', ";
              $query_update .= "post_content = '$post_content', ";
              $query_update .= "post_tags = '$post_tags', ";
              $query_update .= "post_status = '$post_status' ";
              $query_update .= "WHERE post_id = $id_to_edit ";
                  
                  
              $post_update_query = mysqli_query($connection, $query_update);
                
              // confirmQuery($post_update_query);
          }
      ?>



<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="post_title">Post Title</label>
          <input type="text" class="form-control" name="post_title" value='<?php echo $post_title ?>'>
      </div>

      <div class="form-group">
      <select name="post_category" id="">
          <?php
            $query = "SELECT * FROM categories";
            $select_category_id = mysqli_query($connection, $query);

            confirmQuery($select_category_id);
            
            while ($row = mysqli_fetch_assoc($select_category_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo "<option value='$cat_title'>$cat_title</option>";
            }
                ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value='<?php echo $post_author ?>'
      </div>
      
      <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" value='<?php echo $post_status ?>'>
      </div>
      
      <div class="form-group">
      <img src="./images/<?php echo $post_image; ?>" width='100' alt='<?php echo $post_title; ?>' >
      </div>
      
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value='<?php echo $post_tags ?>'>
      </div>
      
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id='' cols='30' rows='10' value='Publish Post'><?php echo $post_content ?></textarea>
      </div>
      
      <div class="form-group">
        <input type="submit" class="btn btn/primary" name="update_post" value="update">
      </div>
           
</form>