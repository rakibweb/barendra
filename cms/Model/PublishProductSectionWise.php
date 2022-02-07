<?php
 header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include 'connect_db.php';

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $ProductId = $request -> ProductId;
    $SectionId = $request -> SectionId;

    //Get all state data
    $query = mysqli_query($con, "INSERT INTO content_publish(ProductId, SectionId, Sort, Expire) VALUES ('$ProductId','$SectionId','0','N')");

    $output = "";  
    if($query==1)
    {
        $output="Success";
    }
   else
   {
        $output="Failed";
   }
    
    echo json_encode($output);  

?>