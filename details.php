<?php
    include "head.php";
   
    include "innermenu.php";
    
    $id = "";
    if(strlen($id)>7)
    {
        echo "<meta http-equiv='refresh' content='0;url=http://shop.barendro.com'>";
    }
    else{
        if (!isset($_GET["pcode"])) {
           $id = $_SESSION["det"];
        }
        else{
           $_SESSION["det"] = $_GET["pcode"];
           echo "<meta http-equiv='refresh' content='0;url=details.php'>";
        }
    }
    
    //$pname = $_GET["pname"];
    
    if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }
    else{
        $userid ="n";
    }
    
    $catquery = mysqli_query($con, "SELECT a.ProductName, a.CategoryId, a.SubCategoryId, c.product, ROUND(a.UnitPrice, 2) UnitPrice, ROUND(a.originalprice, 2) originalprice, 
    s.SupplierID, s.companyname, a.description, a.Overview, a.additionalinfo FROM tblproducts a INNER JOIN tbl_menu c ON a.SubCategoryId = c.id INNER JOIN tblsuppliers s 
    ON s.SupplierID=a.SupplierID WHERE ProductID='$id'");
    $ProductName="";
    $catname = "";
    $price = "";
    $originalprice = "";
    $companyname = "";
    $SupplierID="";
    $Description="";
    $Overview="";
    $Additionalinfo="";
    $Discount ="";
    $categoryid ="";
    while($carrow = mysqli_fetch_assoc($catquery))
    {
        $ProductName = $carrow["ProductName"];
        $categoryid = $carrow["SubCategoryId"];
        $catname = $carrow["product"];
        $price = $carrow["UnitPrice"];
        $originalprice = $carrow["originalprice"];
        $companyname = $carrow["companyname"];
        $SupplierID=$carrow["SupplierID"];
        $Description= $carrow["description"];
        $Overview = $carrow["Overview"];
        $Additionalinfo = $carrow["additionalinfo"];
        $Discount = ($carrow["UnitPrice"]/ $carrow["originalprice"] - 1)*100;
    }

    $reviewcount = mysqli_query($con, "SELECT COUNT(productcode) count FROM tbl_review where productcode='$id'");
    $count = mysqli_fetch_assoc($reviewcount);
    $Rvcount = $count["count"];

?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page main-content-detail">
		<div class="container">
			<div class="breadcrumbs">
				<a href="http://www.shop.barendro.com">Home</a> \ <span class="current"><?php echo $catname ?></span> \ <? $ProductName ?>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 content-offset">
					<div class="about-product row">
						<div class="details-thumb col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="owl-carousel nav-style3 has-thumbs" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
								$screenquery = mysqli_query($con, "SELECT Id, productid, imageurl FROM tblproductscreen WHERE productid='$id'");
								while($sc = mysqli_fetch_assoc($screenquery)){
								?>
								<div class="details-item"><img src='cms/<?php echo $sc["imageurl"] ?>' alt=''></div>
								<?php
								}
								?>
							</div>
						</div>
						<div class="details-info col-xs-12 col-sm-12 col-md-6 col-lg-6" ng-controller="cartaction">
						    <a style="font-size:14px;text-transform: none;" href='merchantproducts.php?mcode=<?php echo $SupplierID; ?>'>
                    			<?php echo $companyname; ?>
                    		</a><br>
							<a href="details.php" class="product-name"><? echo $ProductName ?></a>
							<div class="rating">
								<ul class="list-star">
									<?php
    							        for($i=1; $i<=$ur["rating"]; $i++){
    							            echo '<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>';
    							        }
    						        ?>
								</ul>
								<span class="count"><? echo $Rvcount ?> Review(s)</span>
							</div>
							
							<p class="description"><? echo $Overview ?></p>
							<div class="price">
								<span class="ins">৳ <?php echo $price ?> </span>
								<span style="font-size: 13px; color: #888; font-weight: 400; text-decoration: line-through;">৳ <?php echo $originalprice ?></span>
							</div>
							<div class="availability"><b>Discount:</b> <a href="#"><? echo abs(round($Discount)) ."%"; ?></a></div>
							<div class="availability"><b>Availability:</b> <a href="#">in Stock</a></div>
							<div class="group-social">
								<ul class="list-socials">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<!--<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>-->
									<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									
								</ul>
							</div>
							<div class="quantity">
								<div class="group-quantity-button">
									<a class="minus" href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
									<input class="input-text qty text" type="text" size="4" title="Qty" value="1" name="quantity" ng-model="qty">
                                	<a class="plus" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
								</div>
                            </div>
                            <div class="group-button">
								<div class="inner">
									<a href='model/cartAction.php?action=addToCart&id=<?php echo $id; ?>&qty={{qty}}' class="add-to-cart"><span class="text">ADD TO CART</span><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span></a>
									
									<a href="#" class="compare-button"><i class="fa fa-exchange" aria-hidden="true"></i></a>
									<a href="#" class="wishlist-button"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-tab nav-tab-style2">
						<ul class="nav list-nav">
							<li class="active"><a data-animated="fadeIn" data-toggle="pill" href="#tab1">Description</a></li>
							<li><a data-animated="zoomInUp" data-toggle="pill" href="#tab2">Addtional Infomation</a></li>
							<li><a data-animated="rotateInDownLeft" data-toggle="pill" href="#tab3">Reviews</a></li>
						</ul>						
						<div class="tab-content">
				    		<div id="tab1" class="tab-panel active ">
				    			<div class="description">
					    			<p><? echo $Description ?></p>
				    			</div>
				    		</div>
				    		<div id="tab2" class="tab-panel">
								<div class="additional">
				    				<div class="row">
				    					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
						    				<p><? echo $Additionalinfo ?></p>
						    				
					    				</div>
				    				</div>
				    			</div>
				    		</div>
				    		<div id="tab3" class="tab-panel">
				    			<div class="custom-review">
				    				<div class="row">
				    					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				    						<div class="customer-review">
				    						    
				    							<h3 class="title supper-title">CUSTOMER REVIEWS <span class="count">( <? echo $Rvcount ?> Reviews )</span></h3>
				    							<ul class="list-review">
			    							    <?php
				    							    $reviewquery = mysqli_query($con, "SELECT a.id, productcode, b.Name, review, rating, date FROM tbl_review a INNER JOIN user b 
				    							    ON a.userid=b.Id WHERE productcode='$id'");
				    							    while($ur = mysqli_fetch_assoc($reviewquery)){
				    							        $date=date_create($ur["date"]);
                                                        
				    							    ?>
				    								<li class="review-item">
				    									<div class="character">
				    										<div class="rating">
																<ul class="list-star">
																    <?php
																        for($i=1; $i<=$ur["rating"]; $i++){
																            echo '<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>';
																        }
															        ?>
																	<!--<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>-->
																</ul>
															</div>
															<a href="#" class="author"><? echo $ur["Name"] ?></a>
															<div class="time-review"><? echo date_format($date,"d M Y"); ?></div>
				    									</div>
				    									<div class="review-content">
				    										<!--<h3 class="title">Product review</h3>-->
				    										<p class="content"><? echo $ur["review"] ?></p>
				    									</div>
				    								</li>
				    								<?php
				    							    }
				    							    ?>
				    							</ul>
				    						</div>
				    					</div>
				    					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				    					    <form action="" method="post">
    				    						<div class="add-review">
    				    							
    				    							<?php
    				    							$userId = $_SESSION["userid"];
    				    							
    				    							if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {
    				    							    $userquery = mysqli_query($con, "SELECT Id, Name, Email FROM user WHERE Id='$userId'");
    				    							    $ur = mysqli_fetch_assoc($userquery);
    			    							    ?>
    				    							<div class="row">
    					    							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    					    								<input type="text" class="input-info" placeholder="Your name" value='<? echo $ur["Name"] ?>' readonly>
    					    							</div>
    					    							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    					    								<input type="email" class="input-info" placeholder="Your email" value='<? echo $ur["Email"] ?>' readonly>
    					    							</div>
    					    						</div>
    				    							<textarea rows="6" class="input-info input-content" name="txtReview" placeholder="Your review"></textarea>
    				    							<div class="col-md-6">
    				    								<span >Your rating</span>
    				    								<select name="ddlRating" class="form-control">
    				    								    <option value="1">1</option>
    				    								    <option value="2">2</option>
    				    								    <option value="3">3</option>
    				    								    <option value="4">4</option>
    				    								    <option selected value="5">5</option>
    				    								</select>
    													<!--<ul class="list-star">
    														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    														<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
    													</ul>-->
    												</div>
    												<div class="col-md-6">
    												    <button type="submit" class="submit" name="btnReview">SUBMIT</button>
												    </div>
    												    <?php
            												if(isset($_POST["btnReview"])){
                												$review = $_POST["txtReview"];
                												$rating = $_POST["ddlRating"];
                												$insertreview = mysqli_query($con, "INSERT INTO tbl_review(productcode, userid, review, rating) VALUES ('$id','$userId','$review','$rating')");
                												if($insertreview > 0){
                												    echo "Review Submitted Successfully.";
                												}
            												}
        				    							}
        				    							else{
        				    							    ?>
        				    							    <h4>Login to add your review.</h4>
        				    							    <a href="login.php?page=details" class="btn submit btn-block">Login/ Register</a>
        			    							    <?php
        				    							}
    				    							?>
    				    						</div>
				    						</form>
				    					</div>
				    				</div>
				    			</div>
				    		</div>
				    	</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
					<div class="equal-container widget-featrue-box">
						<div class="row">
							<div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
								<div class="featrue-box layout2 equal-elem">
									<div class="block-icon"><a href="#"><span class="fa fa-truck"></span></a></div>
									<div class="block-inner">
										<a href="#" class="title">Free Shipping & Return</a>
										<p class="des">Free shipping on all oders over ৳ 1000</p>
									</div>
								</div>
							</div>
							<div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
								<div class="featrue-box layout2 equal-elem">
									<div class="block-icon"><a href="#"><span class="fa fa-retweet"></span></a></div>
									<div class="block-inner">
										<a href="#"  class="title">Money back guarantee</a>
										<p class="des">100% money back guarantee</p>
									</div>
								</div>
							</div>
							<div class="col-ts-12 col-xs-4 col-sm-12 col-md-12 col-lg-12 featrue-item">
								<div class="featrue-box layout2 equal-elem">
									<div class="block-icon"><a href="#"><span class="fa fa-life-ring"></span></a></div>
									<div class="block-inner">
										<a href="#"  class="title">Online support 24/7</a>
										<p class="des">Online support 24/7</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-product-item">
						<div class="head">
							<h5 class="title">GLOBAL COLLECTION</h5>
						</div>
						<div class="content">
							<div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0.1"  data-responsive = '{"0":{"items":1}, "560":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
				    			    $globalcollection = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='10'");
				    			    while($globalc = mysqli_fetch_assoc($globalcollection)){
				    			    ?>
								
								<div class="product-item layout2">
									<div class="product-inner equal-elem">
										<div class="thumb">
    										<a href='model/cartAction.php?action=addToCart&id=<?php echo $globalc["ProductID"]; ?>' class="quickview-button">
        									    <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
        								    </a>
											<a href='details.php?pcode=<? echo $globalc["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $globalc["Imageurl"] ?>' alt='<? echo $topr["ProductName"] ?>'></a>
										</div>
										<div class="info">
											<div class="rating">
												<ul class="list-star">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
												<span class="count">5 Review(s)</span>
											</div>
											<a href="details.php" class="product-name"><? echo $globalc["ProductName"] ?></a>
											<div class="price">
											    <span class="del">৳ <? echo $globalc["originalprice"] ?></span>
												<span class="ins">৳ <? echo $globalc["UnitPrice"] ?></span>
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
					<br>
					<div class="box-product-item">
						<div class="head">
							<h5 class="title">BEST SELLER</h5>
						</div>
						<div class="content">
							<div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0.1"  data-responsive = '{"0":{"items":1}, "560":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
				    			    $bestseller = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='7'");
				    			    while($bests = mysqli_fetch_assoc($bestseller)){
				    			    ?>
								
								<div class="product-item layout2">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $bests["ProductID"]; ?>' class="quickview-button">
        									    <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
        								    </a>
											<a href='details.php?pcode=<? echo $bests["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $bests["Imageurl"] ?>' alt='<? echo $bests["ProductName"] ?>'></a>
										</div>
										<div class="info">
											<div class="rating">
												<ul class="list-star">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
												</ul>
												<span class="count">5 Review(s)</span>
											</div>
											<a href="details.php" class="product-name"><? echo $bests["ProductName"] ?></a>
											<div class="price">
											    <span class="del">৳ <? echo $bests["originalprice"] ?></span>
												<span class="ins">৳ <? echo $bests["UnitPrice"] ?></span>
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
			<div class="products-arrivals">
				<div class="section-head box-has-content">
					<h4 class="section-title">Related Products</h4>
				</div>
				<div class="section-content">
					<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2}, "650":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>
					    <?php
					        $catpr = mysqli_query($con, "SELECT ProductID, ProductName, merchantpcode, SupplierID, BrandId, CategoryID, SubCategoryId, QuantityPerUnit, 
						        UnitPrice, originalprice, description, Overview, Commission, Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued 
						        FROM tblproducts WHERE SubCategoryId='$categoryid' AND ProductID<>'$id' LIMIT 10");
						        while($cp = mysqli_fetch_assoc($catpr)){
			            ?>
	    				<div class="product-item layout1">
							<div class="product-inner equal-elem">
								<div class="thumb">
									<a href='model/cartAction.php?action=addToCart&id=<?php echo $cp["ProductID"]; ?>' class="quickview-button">
								        <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
								    </a>
									<a href='details.php?pcode=<? echo $cp["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $cp["Imageurl"] ?>' alt='<? echo $cp["ProductName"] ?>'></a>
								</div>
								<div class="info">
									<a href='details.php?pcode=<? echo $cp["ProductID"] ?>' class="product-name"><? echo $cp["ProductName"] ?></a>
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