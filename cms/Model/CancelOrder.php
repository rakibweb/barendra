<?php
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect_db.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $orderId = $request -> orderId;

    //Get all state data
    $query = mysqli_query($con, "UPDATE tblorder SET Status='X' WHERE OrderId='$orderId'");

    $output = "Invalid";  
    if($query>0)
    {
        $output="Order Cancelled Successfully";
    }
   else
   {
        $output="Order Cancellation Failed";
   }
    
    echo json_encode($output);  

?>