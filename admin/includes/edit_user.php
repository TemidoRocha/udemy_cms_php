<?php

  if (isset($_GET['source'])) {
      $the_user_id = $_GET['p_id'];

      $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
      $select_user = mysqli_query($connection, $query);
  
      while ($row = mysqli_fetch_assoc($select_user)) {
          $user_id  = $row['user_id'];
          $username = $row['username'];
          $user_password= $row['user_password'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image= $row['user_image'];
          $user_role= $row['user_role'];
          $user_randSalt= $row['user_randSalt'];
    

          // $user_firstname =  $_POST['user_firstname'];
      // $user_lastname =  $_POST['user_lastname'];
      // $user_role =  $_POST['user_role'];

      // $user_image =  $_FILES['image']['name'];
      // $user_image_temp =  $_FILES['image']['tmp_name'];

      // $username =  $_POST['username'];
      // $user_email =  $_POST['user_email'];
      // $user_password =  $_POST['user_password'];
      // // $post_date =  date('d-m-y');

      // move_uploaded_file($user_image_temp, "./images_user/$user_image");

      // $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_image, user_password) ";
      // $query .= "VALUES('$user_firstname', '$user_lastname', '$user_role', '$username', '$user_email', '$user_image', '$user_password') ";

      // $create_user_query = mysqli_query($connection, $query);

      // confirmQuery($create_user_query);
      }
  }
?>



<form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="user_firstname">First Name</label>
          <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname ?>">
      </div>
      
      <div class="form-group">
         <label for="user_lastname">Last Name</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname ?>">
      </div>

      <div class="form-group">
      <select name="user_role" id="">
          <option value='subscriber'>Select Options</option>
          <option value='admin'>Admin</option>
          <option value='subscriber'>Subscriber</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
      </div>
      
      <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email ?>">
      </div>
      
      <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" class="form-control" name="image" >
      </div>
      
      <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>">
      </div>
      
      
      <div class="form-group">
        <input type="submit" class="btn btn/primary" name="edit_user" value="Edit User">
      </div>
           
</form>