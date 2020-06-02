<?php
  if (isset($_POST['create_post'])) {
      $post_title =  $_POST['post_title'];
      $post_author =  $_POST['post_author'];
      $post_category_id =  $_POST['post_category_id'];
      $post_status =  $_POST['post_status'];

      $post_image =  $_FILES['image']['name'];
      $post_image_temp =  $_FILES['image']['tmp_name'];

      $post_tags =  $_POST['post_tags'];
      $post_content =  $_POST['post_content'];
      $post_date =  date('d-m-y');
      $post_comment_count =  4;

      move_uploaded_file($post_image_temp, "./images/$post_image");

      $query = "INSERT INTO posts(post_title, post_author, post_category_id, post_status, post_image, post_tags, post_content, post_date, post_comment_count) ";
      $query .= "VALUES('$post_title', '$post_author', '$post_category_id', '$post_status', '$post_image', '$post_tags', '$post_content', '$post_date', '$post_comment_count') ";

      $create_post_query = mysqli_query($connection, $query);

      confirmQuery($create_post_query);
  }
?>



<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="post_title">Post Title</label>
          <input type="text" class="form-control" name="post_title">
      </div>

      <div class="form-group">
        <label for="post_category_id">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id">
      </div>
      
      <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
      </div>
      
      <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
      </div>
      
      <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      
      <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id='' cols='30' rows='10' value='Publish Post'></textarea>
      </div>
      
      <div class="form-group">
        <input type="submit" class="btn btn/primary" name="create_post" value="publish">
      </div>
           
</form>