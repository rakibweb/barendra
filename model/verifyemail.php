<?php
    include "../connect_db.php";
    session_start();
    $email = $_POST["email"];
    $name="";
    
    $query = mysqli_query($con, "SELECT Id, Name, Gender, Email, Phone, UserName, Password, District, ShippingAddress, Expire, timestamp FROM user WHERE Email='$email' AND Expire='N'");
    $count = mysqli_num_rows($query);
    
    if($count>0){
        while($us = mysqli_fetch_assoc($query)){
            $name = $us["Name"];
        }
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($permitted_chars), 0, 6);
        mysqli_query($con, "INSERT INTO userverify(email, Code) VALUES ('$email','$code')");
        
        //email format
        
        $to = $email;
        $subject = 'Baredro Password Reset';
        $from = 'support@barendro.com';
        $encodedemail = base64_encode($email);
        $encodeCode = base64_encode($code);
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         
        // Create email headers
        $headers .= 'From: Barendro Support '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
         
        // Compose a simple HTML email message
        $message = '<html><body>';
        $message .= '<h3 style="color:#000;">Dear '. $name .',</h3>';
        $message .= '<p style="color:#333;font-size:14px;">Please click on the below URL to reset your password. If you did not initiate this action, complain us immediately to support@barendro.com.</p>';
        $message .= '<a style="font-size:16px;" href="http://shop.barendro.com/passwordreset.php?code='. $encodeCode .'&m='. $encodedemail .' ">http://shop.barendro.com/passwordreset.php?code='. $code .'&m='. $encodedemail .'</a>';
        $message .= '<br><br><br><br>';
        $message .= '<hr>';
        $message .= '<h3>Best Regards</h3>';
        $message .= '<p>Barendro</p>';
        $message .= '<img src="http://shop.barendro.com/images/logo-barendro.png" width="120">';
        $message .= '<p>ADDRESS</p>';
        $message .= '<p>367-Anuranan, Boyalia Thanar More Alupotti, Rajshahi- 6100, Bangladesh</p>';
        $message .= '<p>HOTLINE NO</p>';
        $message .= '<p>09 669 966 888</p>';
        $message .= '<p>SUPPORT</p>';
        $message .= '<p>support@barendro.com</p>';
        $message .= '</body></html>';

        // Sending email
        if(mail($to, $subject, $message, $headers)){
            echo 'Your mail has been sent successfully.';
        } else{
            echo 'Unable to send email. Please try again.';
        }
    }
?>