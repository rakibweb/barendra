<?php
 header("Access-Control-Allow-Headers: *");
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");

 include 'connect_db.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $ordercode = $request -> orderId;

    //Get all state data
    $query = mysqli_query($con, "UPDATE tblorder SET Status='Returned' WHERE ordercode='$ordercode'");

    $output = "Invalid";  
    if($query>0)
    {
        $output="Order Returned Successfully";
    }
   else
   {
        $output="Order Return Failed";
   }
    
    echo json_encode($output);  

?>