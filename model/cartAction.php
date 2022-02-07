<?php 
// Initialize shopping cart class 
require_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Include the database config file 
require_once 'db_config.php'; 
 
// Default redirect page 
$redirectLoc = '../index.php'; 
 
// Process request based on the specified action 
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){ 
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){ 
        $productID = $_REQUEST['id'];
        $qty= 1;
        if(isset($_GET['qty'])){
            $qty = $_GET['qty'];
        }
         
        // Get product details 
        $query = $db->query("SELECT * FROM tblproducts WHERE ProductID = ".$productID); 
        $row = $query->fetch_assoc(); 
        $itemData = array( 
            'id' => $row['ProductID'], 
            'name' => $row['ProductName'], 
            'price' => $row['UnitPrice'], 
            'img' => $row['Imageurl'], 
            'qty' => $qty 
        ); 
         
        // Insert item to cart 
        $insertItem = $cart->insert($itemData); 
         
        // Redirect to cart page 
        $redirectLoc = $insertItem?'../shopping-cart.php':'../index.php'; 
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){ 
        // Update item data in cart 
        $itemData = array( 
            'rowid' => $_REQUEST['id'], 
            'qty' => $_REQUEST['qty'] 
        ); 
        $updateItem = $cart->update($itemData); 
         
        // Return status 
        echo $updateItem?'ok':'err';die; 
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){ 
        // Remove item from cart 
        $deleteItem = $cart->remove($_REQUEST['id']); 
         
        // Redirect to cart page 
        $redirectLoc = '../shopping-cart.php'; 
    }
    elseif($_REQUEST['action'] == 'clearCartItem'){
        $cart->destroy();
        $redirectLoc = '../shopping-cart.php'; 
    }
    elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0){ 
        $redirectLoc = '../checkout.php'; 
         
        // Store post data 
        $_SESSION['postData'] = $_POST; 
        $custID = strip_tags($_POST['cust_id']); 
        $full_name = strip_tags($_POST['full_name']); 
        $gender = strip_tags($_POST['gender']); 
        $email = strip_tags($_POST['email']); 
        $phone = strip_tags($_POST['phone']); 
        $area = strip_tags($_POST['area']); 
        $address = strip_tags($_POST['address']); 
        $instruction = strip_tags($_POST['instruction']); 
        $method = strip_tags($_POST['payment']); 
        $discount = 0;
        $promo = "";
        $grandtotal = 0;
        $ShippingAmount = 0;
        
        $errorMsg = ''; 
        if(empty($full_name)){ 
            $errorMsg .= 'Please enter your full name.<br/>'; 
        } 
        if(empty($gender)){ 
            $errorMsg .= 'Please enter your last name.<br/>'; 
        } 
        if(empty($email)){ 
            $errorMsg .= 'Please enter your email address.<br/>'; 
        } 
        if(empty($phone)){ 
            $errorMsg .= 'Please enter your phone number.<br/>'; 
        } 
        if(empty($area)){ 
            $errorMsg .= 'Please enter your area.<br/>'; 
        } 
        if(empty($address)){ 
            $errorMsg .= 'Please enter your address.<br/>'; 
        } 
         
        if(empty($errorMsg)){ 
            // Insert customer data in the database 
            $insertCust = $db->query("UPDATE user SET ShippingAddress='$address' WHERE Email='$email' "); 
             
            if($insertCust){ 
                //$custID = $db->insert_id; 
                 
                //get orderid
                $orderquery = $db->query("SELECT (MAX(OrderId)+1) orderid FROM tblorder");
                $getID = $orderquery->fetch_assoc(); 
                $Orderid = "ORD". $custID . $getID["orderid"];
                $ShippingAmount = 45;
                $total = $cart->total();
                
                if(isset($_SESSION["PromoCode"])){
                    $promo = $_SESSION["PromoCode"];
                }
                
                if(isset($_SESSION["PromoDiscount"])){
        		    $discount = ($total * $_SESSION["PromoDiscount"])/100;
        		    $total = $total - $discount;
        		}
        	    $grandtotal = $total + $ShippingAmount;
        	    
                // Insert order info in the database 
                $insertOrder = $db->query("INSERT INTO tblorder(ordercode, CustomerId, city, ShippingAddress, PaymentMethod, AlternativeNumber, SpecialInstruction, Amount, 
                Shippingcharge, date, Status, Discount, promo) VALUES ('$Orderid','$custID','$area','$address','$method','$phone','$instruction','$total','$ShippingAmount',NOW(),
                'Pending','$discount','$promo')"); 
                if($insertOrder){ 
                    $orderID = $db->insert_id; 
                     
                    // Retrieve cart items 
                    $cartItems = $cart->contents(); 
                     
                    // Prepare SQL to insert order items 
                    $sql = ''; 
                    foreach($cartItems as $item){ 
                        $productid = $item['id'];
                        $discountprice = $item['price'] - (($item['price'] * $_SESSION["PromoDiscount"])/100);
                        $totaldiscountprice = $discountprice * $item['qty'];
                        $sql .= "INSERT INTO tblorderdetails (OrderID, ProductID, Quantity, Merchant, UnitPrice, Discountprice, Amount) VALUES ('".$Orderid."', '".$item['id']."', '".$item['qty']."',
                        (SELECT SupplierID FROM tblproducts Where ProductId='$productid'), '".$item['price']."', '$discountprice', '$totaldiscountprice');"; 
                    } 
                     
                    // Insert order items in the database 
                    $insertOrderItems = $db->multi_query($sql); 
                     
                    if($insertOrderItems){ 
                        // Remove all items from cart 
                        $cart->destroy(); 
                        
                        //email format
                        $to = $email;
                        $subject = 'Baredro Order Confirmation';
                        $from = 'support@barendro.com';
                        $date = date_create(); 
                        // To send HTML mail, the Content-type header must be set
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                         
                        // Create email headers
                        $headers .= 'From: Barendro Sales '.$from."\r\n".
                            'Reply-To: '.$from."\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                         
                        // Compose a simple HTML email message
                        $message = '<html><body>';
                        $message .= '<h3 style="color:#000;">Dear '. $full_name .',</h3>';
                        $message .= '<p style="color:#333;font-size:14px;">Your order at barendro.com is placed successfully.</p>';
                        $message .= '<div class="panel"><div class="row"><div class="col-sm-12"><h4 class="text-center">Invoice #: '.$Orderid.'</h4></div></div><div class="row"><div class="col-sm-6">';
                        $message .= '<div class="p-a">';
                        $message .= $full_name.'<br>';
                        $message .= $address.'<br>';
                        $message .= $area.'<br>';
                        $message .= $phone.'<br>';
                        $message .= '</div></div><div class="col-sm-6"></div></div><div class="row"><div class="col-xs-6 col-sm-3 col-sm-push-0"><div class="p-a">Order Code: ';
                        $message .= $Orderid;
                        $message .= '</div></div><div class="col-xs-6 col-sm-6 col-sm-pull-3"><div class="p-a">Date: ';
                        $message .= date_format($date,"d M Y");
                        $message .= '</div></div></div>';
                        $message .= '<div class="row"><div class="col-xs-12 col-md-12"><div class="table-responsive">';
                        $message .= '<table border="1" cellspacing="0" style="width:100%"><tr><th>Product Description</th><th>Price (Tk.)</th><th>Qty</th><th>Total (Tk.)</th></tr>';
                        
                        $result = $db->query("SELECT id, OrderID, b.ProductName, size, Merchant, a.UnitPrice, Quantity FROM tblorderdetails a INNER JOIN tblproducts b ON 
                        a.ProductID=b.ProductID WHERE OrderID='$Orderid'"); 
                        if($result->num_rows > 0){
                            $sub_total = 0;
                            while($item = $result->fetch_assoc()){
                                $price = $item["UnitPrice"]; 
                                $quantity = $item["Quantity"]; 
                                $stotal = $price * $quantity;
                                
                                $message .= '<tr><td>'. $item["ProductName"] .'</td><td>'. $item["UnitPrice"] .'</td><td>'. $item["Quantity"] .'</td><td>'. $stotal .'</td></tr>';
                                $sub_total = $sub_total + $stotal;
                            }
                            $message .= '<tr><td colspan="2"></td><td>Sub Total</td><td>'. $sub_total .'</td></tr>';
                            $message .= '<tr><td colspan="2"></td><td>Discount</td><td>'.  $discount .'</td></tr>';
                            $message .= '<tr><td colspan="2"></td><td>Grand Total</td><td><strong>'. $total .'</strong></td></tr>';
                        }
                        $message .= '</table></div></div></div></div></div>';
                        $message .= '*** Shipping charge '. $ShippingAmount .' Tk. excluded.';
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
                            // Redirect to the status page 
                            $redirectLoc = '../orderSuccess.php?id='.$Orderid; 
                        } else{
                            echo 'Unable to send email. Please try again.';
                        }
                    }else{
                        $sessData['status']['type'] = 'error'; 
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                    } 
                }else{ 
                    $sessData['status']['type'] = 'error'; 
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
                } 
            }else{ 
                $sessData['status']['type'] = 'error'; 
                $sessData['status']['msg'] = 'Some problem occurred, please try again.'; 
            } 
        }else{ 
            $sessData['status']['type'] = 'error'; 
            $sessData['status']['msg'] = 'Please fill all the mandatory fields.<br>'.$errorMsg;  
        } 
        $_SESSION['sessData'] = $sessData; 
    } 
} 
 
// Redirect to the specific page 
header("Location: $redirectLoc"); 
exit();
?>