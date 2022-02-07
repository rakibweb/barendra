<?php
    include "head.php";
    include "innermenu.php";
    $userid = "";
    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
    }
    // Initialize shopping cart class 
    include_once 'model/Cart.class.php'; 
    $cart = new Cart; 
     
    // If the cart is empty, redirect to the products page 
    if($cart->total_items() <= 0){ 
        header("Location: index.php"); 
    } 
     
    // Get posted data from session 
    $postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
    unset($_SESSION['postData']); 
     
    // Get status message from session 
    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
    if(!empty($sessData['status']['msg'])){ 
        $statusMsg = $sessData['status']['msg']; 
        $statusMsgType = $sessData['status']['type']; 
        unset($_SESSION['sessData']['status']); 
    } 

?>
				
			</div>
		</div>
	</header>
	<div class="main-content shop-page checkout-page">
		<div class="container">
			<div class="breadcrumbs">
				<a href="#">Home</a> \ <span class="current">CHECKOUT</span>
			</div>
			<div class="checkout-form content-form">
				<h4 class="main-title">Billing Address</h4>
				<?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
                <?php } elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
				
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Cart</span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php 
                        if($cart->total_items() > 0){
                            
                            //get cart items from session 
                            $cartItems = $cart->contents(); 
                            $total = $cart->total();
                            $discount = 0;
                            if(isset($_SESSION["PromoDiscount"])){
							    $discount = $_SESSION["PromoDiscount"]." %";
							    $percentage = ($total * $_SESSION["PromoDiscount"])/100;
							    $total = $total - $percentage;
							}
						    $grandtotal = $total+45;
                            foreach($cartItems as $item){
                            
                        ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h5 class="my-0"><?php echo $item["name"]; ?></h5>
                                <small class="text-muted"><?php echo '৳ '.$item["price"]; ?> (<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><strong><?php echo '৳ '.$item["subtotal"]; ?></strong></span>
                        </li>
                        <?php } ?> 
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Shipping </span>
                            <strong>৳ 45</strong>
                        </li>
                        <div class="list-group-item shipping">
							<span class="text">Discount:</span> <? echo $discount ?>
						</div>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Grand Total </span>
                            <strong><?php echo '৳ '.$grandtotal; ?></strong>
                        </li>
                        <?php
                        } ?>
                    </ul>
                    <a href="index.php" class="btn btn-block btn-info">Add Items</a>
                </div>
                
                <div class="col-md-8 order-md-1">
                    <!--<ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                      <li><a data-toggle="tab" href="#register">Register</a></li>
                    </ul>-->
                    <form method="post" action="model/cartAction.php">
                        <div class="tab-content">
                            <? 
                            if($userid ==""){
                            ?>
                            <div id="login" class="tab-pane fade in active">
                                <h4 class="mb-3">User Login</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="txtEmail" value="<?php echo !empty($postData['email'])?$postData['email']:''; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone">Password</label>
                                            <input type="password" class="form-control" id="txtPassword" value="<?php echo !empty($postData['phone'])?$postData['phone']:''; ?>" required>
                                        </div>
                                        <br>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-primary" id="btnLogin">Login</button>
                                            New here? <a href="login.php?page=checkout" class="btn btn-success">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?
                            }
                            ?>
                            <div id="register" class='tab-pane fade <? if($userid !=""){echo " in active";} ?>'>
                                <h4 class="mb-3">Contact Details</h4>
                                <?php
                                    $userdetails = mysqli_query($con, "SELECT Id, Name, Gender, Email, Phone, UserName, Password, District, ShippingAddress, Expire, timestamp 
                                    FROM user WHERE Id='$userid'");
                                    while($ru = mysqli_fetch_assoc($userdetails)){
                                ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="first_name">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" value='<?php echo $ru["Name"] ?>' required>
                                        <input type="hidden" value='<? echo $ru["Id"] ?>' name="cust_id">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Gender</label>
                                        <select class="form-control" name="gender" required>
                                            <option value='Male' <? if($ru["Gender"]=="Male"){echo "selected";} ?>>Male</option>
                                            <option value='Female' <? if($ru["Gender"]=="Female"){echo "selected";} ?>>Female</option>
                                            <option value='Other' <? if($ru["Gender"]=="Other"){echo "selected";} ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="txtEmail" value='<?php echo $ru["Email"] ?>' required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="txtPhone" value='<?php echo $ru["Phone"] ?>' required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">District</label>
                                        <select class="form-control" name="area" required>
                                            <?php 
                                                $district = mysqli_query($con, "SELECT id, DistrictName FROM tblDistrict ORDER BY DistrictName"); 
                                                while($ds = mysqli_fetch_assoc($district)){
                                            ?>
                                            <option value='<? echo $ds["DistrictName"] ?>' <? if($ru["District"]==$ds["DistrictName"]){echo "selected";} ?>><? echo $ds["DistrictName"] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Shipping Address</label>
                                        <input type="text" class="form-control" name="address" value='<? echo $ru["ShippingAddress"] ?>' required>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Special Instruction</label>
                                        <input type="text" class="form-control" name="instruction" value="<?php echo !empty($postData['instruction'])?$postData['instruction']:''; ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="last_name">Payment Method</label>
                                        <select class="form-control" id="payment" name="payment" required>
                                            <option value=''>Select Method</option>
                                            <option value='Cash'>Cash On Delivery</option>
                                            <option value='Bkash'>Bkash</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 bkash">
                                        <span style="color: #ff3399;text-decoration: underline;"> Please place order and follow steps on success page!</span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    
                        <?php
                        if($userid != ""){
                            ?>
                            <input type="hidden" name="action" value="placeOrder"/>
                            <input class="btn btn-success btn-lg btn-block" type="submit" name="checkoutSubmit" value="Place Order">
                            <?php
                        }
                        ?>
                    </form>
                </div>
			</div>
		</div>

		<div class="brand">
			<div class="container">
			    <div class="products-arrivals">
					<div class="section-head box-has-content">
						<h4 class="section-title">Related Products</h4>
					</div>
					<div class="section-content">
						<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2}, "650":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>
                		<?php
                			$Onsalequery = mysqli_query($con, "SELECT a.Id, a.ProductId, b.ProductName, ROUND(b.UnitPrice, 2) UnitPrice, b.originalprice, SectionId, 
                			b.Imageurl, c.product FROM content_publish a INNER JOIN tblproducts b ON a.ProductId=b.ProductId INNER JOIN tbl_menu c ON c.id=b.SubCategoryId 
                			WHERE SectionId ='2' AND Expire = 'N' ORDER BY rand() limit 20");
                            while($Onsalerows = mysqli_fetch_assoc($Onsalequery)) {
                        ?>
		    				<div class="product-item layout1">
								<div class="product-inner equal-elem">
									<div class="thumb">
									    <a href='model/cartAction.php?action=addToCart&id=<?php echo $Onsalerows["ProductId"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
										<a href='details.php?pcode=<? echo $Onsalerows["ProductId"] ?>' class="thumb-link"><img src='cms/<? echo $Onsalerows["Imageurl"] ?>' alt='<? echo $Onsalerows["ProductName"] ?>'></a>
									</div>
									<div class="info">
										<a href='details.php?pcode=<? echo $Onsalerows["ProductId"] ?>' class="product-name"><? echo $Onsalerows["ProductName"] ?></a>
										<div class="price">
										    <span class="del">৳ <? echo $Onsalerows["originalprice"] ?></span>
											<span class="ins">৳ <? echo $Onsalerows["UnitPrice"] ?></span>
										</div>
									</div>
									<div class="group-button">
										<div class="inner">
										    <center>
												<a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
											    <a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
											</center>
										</div>
									</div>
								</div>
							</div>
							<?php
                            }
                            ?>
		    			</div>
		    		</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
	?>