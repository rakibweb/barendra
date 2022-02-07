<?php
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect_db.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $cat = $request -> catId;
    $subcat = $request -> subCatId;

    //Get all state data
    $query = mysqli_query($con, "SELECT ProductID, ProductName, SupplierID, Imageurl, CategoryID, SubCategoryId, QuantityPerUnit, UnitPrice, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued FROM tblproducts WHERE CategoryID='$cat' and SubCategoryId='$subcat' ");
//WHERE CategoryID='$cat' and SubCategoryId='$subcat' 
    //Count total number of rows
    //$rowCount = mysql_num_rows($query);
   $output = array();  
    //Display states list
    while($row = mysqli_fetch_array($query))
    {
        $output[] = $row; 
        //$output .= '<option value="'.$row['Id'].'">'.$row['Name'].'</option>';
    }
    echo json_encode($output);  

?>