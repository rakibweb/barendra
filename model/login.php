<?php
    include "../connect_db.php";
    session_start();
    $email = $_POST["user"];
    $password = $_POST["password"];
    
    $query = mysqli_query($con, "SELECT Id, Name, Gender, Email, Phone, UserName, Password, District, ShippingAddress, Expire, timestamp FROM user WHERE UserName='$email' AND 
    Password='$password' AND Expire='N'");
    $count = mysqli_num_rows($query);
    
    if($count>0){
        while($us = mysqli_fetch_assoc($query)){
            $_SESSION["userid"] = $us["Id"];
            $_SESSION["UserName"] = $us["Name"];
            $_SESSION["Gender"] = $us["Gender"];
            $_SESSION["Email"] = $us["Email"];
            $_SESSION["Phone"] = $us["Phone"];
            echo "Login Successful";
        }
    }
?>