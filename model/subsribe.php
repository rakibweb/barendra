<?php
    include "../connect_db.php";
    $email = $_POST["email"];
    if($email !="")
    {
        $sql = mysqli_query($con, "INSERT INTO tbl_subscribe(email) VALUES ('$email')");  
        if($sql > 0){
            echo "Your Subscribtion is Successful";
        }
    }
    else{
        echo "Your Subscribtion is Successful";
    }
?>