<?php
 header("Access-Control-Allow-Headers: *");
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include 'connect_db.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $ordercode = $request -> orderId;

    //Get all state data
    $query = mysqli_query($con, "UPDATE tblorder SET Status='Delivered' WHERE ordercode='$ordercode'");
    
    $output = "Invalid";  
    if($query>0)
    {
        mysqli_query($con, "INSERT INTO tbl_transaction(ordercode, productcode, sellingprice, quantity, amount, commission, profit)
        (SELECT OrderID, ProductID, Discountprice, Quantity, Amount, (SELECT Commission FROM tblproducts WHERE ProductID=a.ProductID) Commission, 
        (a.Amount * (SELECT Commission FROM tblproducts WHERE ProductID=a.ProductID))/100 profit FROM tblorderdetails a WHERE OrderID='$ordercode') ");
        
        $output="Order Delivered Successfully";
    }
    else
    {
        $output="Order Delivered Failed";
    }
    
    echo json_encode($output);  

?>