<?php
    include "../connect_db.php";
    session_start();
    
    $promo = $_POST["promo"];
    if($promo !="")
    {
        $sql = mysqli_query($con, "SELECT id, name, code, discount, expire FROM tbl_promo WHERE code='$promo' AND expire='N'");  
        $count = mysqli_num_rows($sql);
        
        if($count > 0){
            $value = mysqli_fetch_assoc($sql);
            
            $_SESSION["PromoDiscount"] = $value["discount"];
            $_SESSION["PromoCode"] = $value["code"];
            
            echo "Promo-code Applied Successfully";
        }
        else{
            echo "Promo-code is invalid";
        }
    }
    else{
        echo "Enter Promo-code";
    }
?>