<form action="" method="post">
  <div class="form-group">
    <label for="cat-title">Edit Category</label>

     <?php

       if (isset($_GET['edit'])) {
           $cat_id_to_update = $_GET['edit'];

           $query = "SELECT * FROM categories WHERE cat_id = $cat_id_to_update ";
           $select_category_id = mysqli_query($connection, $query);
          
           while ($row = mysqli_fetch_assoc($select_category_id)) {
               $cat_id = $row['cat_id'];
               $cat_title = $row['cat_title']; ?>

            <input class="form-control" type="text" name="cat_title" value="<?php  echo $cat_title; ?>" >
         <?php
           }
       }
       // updte query
       
       if (isset($_POST['update_category'])) {
           $cat_title_to_update = $_POST['cat_title'];
           echo $cat_title_to_update . $cat_id_to_update;
           $query = "UPDATE categories SET cat_title = '$cat_title_to_update'  WHERE cat_id = '$cat_id_to_update' ";
           $update_query = mysqli_query($connection, $query);
           if (!$update_query) {
               die('Query Failed' . mysqli_error($update_query));
           }
           header("Location: categories.php");
       }

     ?>

  </div>
  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
  </div>
</form>