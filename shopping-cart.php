<?php
    include "head.php";
    include "innermenu.php";
?>
<script>
    function updateCartItem(obj,id){
        $.get("model/cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>
				
			</div>
		</div>
	</header>
	<div class="main-content shop-page shoppingcart-content">
		<div class="container">
			<div class="breadcrumbs">
				<a href="#">Home</a> \ <span class="current">SHOPPING CART</span>
			</div>
			<div class="row content-form">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 content-offset">
					<div class="cart-content">
						<table class="shopping-cart-content">
							<tr class="title">
								<td class="product-thumb"></td>
								<td class="product-name">Product Name</td>
								<td class="price">Unit Price</td>
								<td class="quantity-item">Qty</td>	
								<td class="total">SubTotal</td>
								<td class="delete-item"></td>
							</tr>
							<?php 
                            if($cart->total_items() > 0){ 
                                // Get cart items from session 
                                $cartItems = $cart->contents(); 
                                foreach($cartItems as $item){ 
                            ?>
							<tr class="each-item">
								<td class="product-thumb"><a href="#"><img src='cms/<?php echo $item["img"];?>' alt=""></a></td>
								<td class="product-name" data-title="Product Name"><a href="#" class="product-name"><?php echo $item["name"]; ?></a></td>
								<td class="price" data-title="Unit Price"><?php echo '৳ '.$item["price"]; ?></td>
								<td class="quantity-item" data-title="Qty">
									<div class="quantity">
										<div class="group-quantity-button">
											<a class="minus" href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
											<input class="input-text qty text" type="text" size="4" title="Qty" value='<?php echo $item["qty"];?>' name="quantity" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" />
		                                	<a class="plus" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
										</div>
		                            </div>
								</td>
								<td class="total" data-title="SubTotal"><?php echo '৳ '.$item["subtotal"]; ?></td>
								<td class="delete-item" data-title="Remove"><a href="#" onclick="return confirm('Are you sure?')?window.location.href='model/cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>':false;">
								    <i class="fa fa-times" aria-hidden="true"></i></a>
							    </td>
							</tr>
							<?php
                                } 
                            }else{ ?>
                            <tr><td colspan="5"><p>Your cart is empty.....</p></td></tr>
                            <?php } ?>
							<tr class="checkout-cart group-button">
								<td colspan="6" class="left">
									<div class="left">
										<a href='<? if($_SERVER["HTTP_REFERER"]=="http://www.shop.barendro.com/shopping-cart.php"){echo "index.php";}else{ echo $_SERVER['HTTP_REFERER'];} ?>' class="continue-shopping submit">Continue Shopping</a>
									</div>
									<div class="right">
										<a href="model/cartAction.php?action=clearCartItem" class="submit update">Clear Shopping Cart</a>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 ">
					<div class="proceed-checkout">
						<h4 class="main-title">Proceed to Checkout</h4>
						<div class="content">
							<h5 class="title">Cart Total</h5>
							<?php if($cart->total_items() > 0){
							    $discount = 0;
							    $total = $cart->total();
							
    							if(isset($_SESSION["PromoDiscount"])){
    							    $discount = $_SESSION["PromoDiscount"]." %";
    							    $percentage = ($total * $_SESSION["PromoDiscount"])/100;
    							    $total = $total - $percentage;
    							}
							    
							    $grandtotal = $total+45;
							?>
							<div class="info-checkout">
								<span class="text">Cart subtotal: </span><span class="item"><?php echo '৳ '.$cart->total(); ?></span>
							</div>
							<div class="info-checkout shipping">
								<span class="text">Shipping:</span><span class="item">৳ 45</span>
							</div>
							<div class="info-checkout shipping">
								<span class="text">Discount:</span><span class="item"><? echo $discount ?></span>
							</div>
							<div class="total-checkout">
								<span class="text">Grand Total </span><span class="price"> <?php echo '৳ '.$grandtotal; ?></span>
							</div>
							<?php } ?>
							<div>
								<span class="text">Promo Code </span><input type="text" id="txtPromo"><a href="" class="btn btn-success btn-sm" id="btnPromoApply">Apply</a>
								<p id="message" style="color:green;"></p>
							</div>
							<div class="group-button">
							    <?php if($cart->total_items() > 0){ ?>
								<a href="checkout.php" class="button submit">Checkout</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
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
                            while($cp = mysqli_fetch_assoc($Onsalequery)) {
			            ?>
	    				<div class="product-item layout1">
							<div class="product-inner equal-elem">
								<div class="thumb">
									<a href='model/cartAction.php?action=addToCart&id=<?php echo $cp["ProductId"]; ?>' class="quickview-button">
								        <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
								    </a>
									<a href='details.php?pcode=<? echo $cp["ProductId"] ?>' class="thumb-link"><img src='cms/<? echo $cp["Imageurl"] ?>' alt='<? echo $cp["ProductName"] ?>'></a>
								</div>
								<div class="info">
									<a href='details.php?pcode=<? echo $cp["ProductId"] ?>' class="product-name"><? echo $cp["ProductName"] ?></a>
									<div class="price">
										<span class="del">৳ <? echo $cp["originalprice"] ?></span>
										<span class="ins">৳ <? echo $cp["UnitPrice"] ?></span>
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
	
<?php
    include "footer.php";
?>