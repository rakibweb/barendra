<?php 
    include "head.php";
    include "innermenu.php";
    require_once 'model/db_config.php'; 
    $orderid = $_REQUEST['id'];
    $Discount = 0;
    $shipping = 0;
    if(strlen($orderid > 7))
    {
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
    else{
        $result = $db->query("SELECT a.OrderId, a.ordercode, a.CustomerId, a.ShippingAddress, PaymentMethod, AlternativeNumber, SpecialInstruction, Amount, Shippingcharge, date, 
        Shipper, Status, b.Name, b.Email, b.Phone, a.Discount FROM tblorder a INNER JOIN user b ON a.CustomerId=b.Id WHERE a.ordercode ='$orderid' "); 
     
        if($result->num_rows > 0){ 
            $orderInfo = $result->fetch_assoc(); 
            $total = $orderInfo['Amount'];
            $shipping = $orderInfo['Shippingcharge'];
            $Discount = $orderInfo['Discount'];
            $grand_total = $total;
        }else{ 
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
    }
?>

            </div>
		</div>
	</header>
	<div class="main-content shop-page checkout-page">
		<div class="container">
			<div class="breadcrumbs">
				<a href="index.php">Home</a> \ <span class="current">ORDER STATUS</span>
			</div>
            <h1>ORDER STATUS</h1>
            <div class="col-12">
                <?php if(!empty($orderInfo)){ ?>
                    <div class="col-md-12">
                        <div class="alert alert-info"><strong>Info!</strong> Your order has been placed successfully. </div>
                    </div>
                    <!-- Order status & shipping info -->
                    <div class="row col-lg-6 ord-addr-info">
                        <div class="hdr"><strong style="text-decoration: underline;">Order Information</strong></div>
                        <p><b>Placed On:</b> <?php echo date_format(date_create($orderInfo['date']), "d M Y H:i:s"); ?></p>
                        <p><b>Customer Name:</b> <?php echo $orderInfo['Name'] ?></p>
                        <p><b>Phone:</b> <?php echo $orderInfo['Phone']; ?></p>
                        <p><b>Email:</b> <?php echo $orderInfo['Email']; ?></p>
                        <p><b>Reference ID:</b> <?php echo $orderInfo['ordercode']; ?></p>
                        <p><b>Product Price:</b> <?php echo 'BDT. '.$total; ?></p>
                        <p><b>Total:</b> <?php echo 'BDT. '.$grand_total; ?></p>
                        <p><b>Shipping Charge: <?php echo 'BDT. '.$shipping; ?></b></p>
                        
                        <p><b>Shipping Address:</b> <?php echo $orderInfo['ShippingAddress']; ?></p>
                    </div>
                    <?php 
                    if($orderInfo['PaymentMethod']=="Bkash"){
                    ?>
        			<div class="col-md-6">
                        <span style="color: #ff3399;text-decoration: underline;"> Please use the following steps to pay now!</span><br>
                        &#11177; Go to bKash Menu by dialing *247#<br>
                        &#11177; Choose 'Payment' option by pressing '3'<br>
                        &#11177; Enter our Merchant wallet number : <strong>01314-130 699</strong><br>
                        &#11177; Enter BDT. amount you have to pay : <?php echo 'BDT.'.$orderInfo['Amount']; ?><br>
                        &#11177; Enter the reference : <strong><? echo $orderInfo['ordercode'] ?></strong><br>
                        &#11177; Enter the counter number : 1<br>
                        &#11177; Now enter your PIN to confirm: xxxx<br>
                        &#11177; Done! You will get a confirmation SMS
                    </div>
                    <?php
                    }
                    ?>
                    
        			
                    <!-- Order items -->
                    <div class="row col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl #</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>QTY</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sub_total = 0;
                                $ordercode = $orderInfo['ordercode'];
                                $result = $db->query("SELECT id, OrderID, b.ProductName, size, Merchant, a.UnitPrice, Quantity FROM tblorderdetails a INNER JOIN tblproducts b 
                                ON a.ProductID=b.ProductID WHERE OrderID='$ordercode' "); 
                                if($result->num_rows > 0){  
                                    $i=1;
                                    while($item = $result->fetch_assoc()){
                                        $price = $item["UnitPrice"]; 
                                        $quantity = $item["Quantity"]; 
                                        $totals = $price * $quantity; 
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $item["ProductName"]; ?></td>
                                    <td><?php echo 'BDT. '.$price; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo 'BDT. '.$totals; ?></td>
                                </tr>
                                <?php 
                                        $sub_total = $sub_total + $totals;
                                        $i+=1;
                                    }
                                ?>
                                <tr>
                                    <td colspan="3" rowspan="2"></td>
                                    <td>Sub Total</td>
                                    <td>BDT. <? echo $sub_total ?></td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td>BDT. <? echo $Discount ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="color:#900;">*** Shipping charge <? echo $shipping ?> Tk. excluded.</td>
                                    <td>Grand Total</td>
                                    <td><strong>BDT. <? echo ($sub_total - $Discount) ?></strong></td>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
                    </div>
                <?php  }else{ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger">Your order submission failed.</div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
	<?php
	    include "footer.php";
	?>