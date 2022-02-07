<?php

include 'connect_db.php';

if(isset($_POST["cat_id"]) && !empty($_POST["cat_id"])){
    $cat = $_POST["cat_id"];

    //Get all state data
    $query = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE Parent = '$cat' ORDER BY id ASC");

    //Count total number of rows
    $rowCount = mysqli_num_rows($query);
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="0">Select Sub Category</option>';
        while($row = mysqli_fetch_assoc($query)){ 
            echo '<option value="'.$row['id'].'">'.$row['product'].'</option>';
        }
    }else{
        echo '<option value="">Sub Category not available</option>';
    }
}

?>