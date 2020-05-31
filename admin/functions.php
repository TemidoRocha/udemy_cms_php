<?php

function insert_categories()
{
    global $connection;

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query ="INSERT INTO categories(cat_title) ";
            $query .= "VALUE('$cat_title') ";

            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {
                die('Query Failed'. mysqli_error($connection));
            }
        }
    }
}

function find_all_categories()
{
    global $connection;
  
    $query = "SELECT * FROM categories";
    $select_all_categories_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?delete=$cat_id' > &#10006; </a></td>";
        echo "<td><a href='categories.php?edit=$cat_id' > &#9986; </a></td>";
        echo "</tr>";
    }
}

function delete_category()
{
    global $connection;
  
    if (isset($_GET['delete'])) {
        $cat_id_to_delete = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = $cat_id_to_delete ";
        $delete_cat = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}
