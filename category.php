<?php
    include "head.php";
    
    include "innermenu.php";
    $id = "";
    if(strlen($id)>6)
    {
        echo "<meta http-equiv='refresh' content='0;url=http://shop.barendro.com'>";
    }
    else{
        if (!isset($_GET['code'])) {
           $id = $_SESSION["cat"];
        }
        else{
           $_SESSION["cat"] = $_GET["code"];
           echo "<meta http-equiv='refresh' content='0;url=category.php'>";
        }
    }
    
    if(isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {
        $userid = $_SESSION["userid"];
    }
    else{
        $userid ="n";
    }
    
    $productid = "";
    $subcat = "";
    $UnitPrice="";
    $SectionName ="";
    $Imageurl="";
    $CategoryName="";
    $Parent ="";

    $Onsalequery = mysqli_query($con, "SELECT id, product, Parent FROM tbl_menu WHERE id='$id'");
    while($Onsalerows = mysqli_fetch_assoc($Onsalequery)) {
        $CategoryId = $Onsalerows["id"];
        $CategoryName = $Onsalerows["product"];
        $Parent= $Onsalerows["Parent"];
    }
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page main-content-list">
		<div class="container">
			<div class="breadcrumbs">
				<a href="http://www.shop.barendro.com/">Home</a> > <span class="current"><? echo $CategoryName ?></span>
			</div>
		</div>
	</div><hr align="certer" width="87%">
	<div class="main-content shop-page main-content-list">
	    <div class="container">
		    <div class="row">
                <div class="main-content shop-page about-page">
            		<div class="brand">
            			<div class="container">
            			    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            				    <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":3}, "768":{"items":3}, "1024":{"items":4}, "1200":{"items":5}, "1200":{"items":6}, "1200":{"items":7}, "1200":{"items":8}, "1200":{"items":9}, "1200":{"items":10}}'>
            				        <?php
                				        $brandquery = mysqli_query($con, "SELECT id, brandname, logo FROM brand WHERE brandcategory='$Parent'");
                				        while($bn = mysqli_fetch_assoc($brandquery)){
                				    ?>
                					<div class="brand-item"><a href='brandproducts.php?brandcode=<? echo $bn["id"] ?>'><img src='cms/<? echo $bn["logo"] ?>' alt='<? echo $bn["brandname"] ?>'></a></div>
                					<?php
                				        }
                		            ?>
                				</div>
            			    </div>
            		    </div>
            	    </div>
                </div>
		    </div>
	    </div>
	    <div class="container">
		    <div class="row">
				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-9 content-offset">
					<div class="categories-content">
						<div class="top-control box-has-content">
							<div class="control">
								<!--<div class="filter-choice">
									<select data-placeholder="All Categories" class="chosen-select">
										<option value="1">Sort by</option>
										<option value="2">Size</option>
										<option value="3">Type</option>
										<option value="4">Name</option>
										<option value="5">Data Modified</option>
									</select>
								</div>
								<div class="select-item">
									<select data-placeholder="All Categories" class="chosen-select">
										<option value="1">12 per page</option>
										<option value="2">9 per page</option>
										<option value="3">12 per page</option>
										<option value="4">15 per page</option>
										<option value="5">18 per page</option>
										<option value="5">21 per page</option>
									</select>
								</div>-->
								<span class="shop-title"><? echo $CategoryName ?></span>
								<div class="control-button">
									<a href="#" class="grid-button active"><span class="icon"><i class="fa fa-th-large" aria-hidden="true"></i> </span>Grid</a>
									<a href="#" class="list-button"><span class="icon"><i class="fa fa-th-list" aria-hidden="true"></i></span> List</a>
								</div>
							</div>
						</div>
						<div class="product-container auto-clear grid-style equal-container box-has-content">
						    <?php
						        if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 24;
                                $offset = ($pageno-1) * $no_of_records_per_page;
                        
                                $result = mysqli_query($con, "SELECT COUNT(*) FROM tblproducts WHERE SubCategoryId='$id'");
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);
                                
						        $catpr = mysqli_query($con, "SELECT ProductID, ProductName, merchantpcode, SupplierID, BrandId, CategoryID, SubCategoryId, QuantityPerUnit, 
						        UnitPrice, originalprice, description, Overview, Commission, Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip 
						        FROM tblproducts WHERE SubCategoryId='$id' LIMIT $offset, $no_of_records_per_page");
						        while($cp = mysqli_fetch_assoc($catpr)){
						    ?>
							<div class="product-item layout1 col-ts-12 col-xs-6 col-sm-6 col-md-3 col-lg-3 no-padding">
								<div class="product-inner equal-elem">
									<div class="thumb">
										<a href='model/cartAction.php?action=addToCart&id=<?php echo $cp["ProductID"]; ?>' class="quickview-button">
										    <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
									    </a>
										<a href='details.php?pcode=<?php echo $cp["ProductID"] ?>' class="thumb-link"><img src='cms/<?php echo $cp["Imageurl"] ?>' alt="<?php echo $cp["ProductName"] ?>"></a>
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
										<a href='details.php?pcode=<?php echo $cp["ProductID"] ?>' class="product-name"><?php echo $cp["ProductName"] ?></a>
										<p class="description"><?php echo $cp["description"] ?></p>
										<div class="price">
											<span class="ins">৳ <?php echo $cp["UnitPrice"] ?> </span>
											<span class="del">৳ <?php echo $cp["originalprice"] ?></span>
										</div>
										<div class="availability">Availability: <a href="#">in Stock</a></div>
									</div>
									<div class="group-button">
										<div class="inner">
											<center>
    											<a href="#" class="compare-button"><span class="icon"><i class="fa fa-exchange" aria-hidden="true"></i></span><span class="text">Add to Compare</span></a>
    											<a href="#" class="wishlist-button"><span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span><span class="text">Add to Wishlist</span></a>
											</center>
										</div>
									</div>
								</div>
							</div>
							<?php
						        }
						        
						        ?>
						</div>
						<div class="pagination" style="width:100%;">
							<ul class="pagination">
								<!--<li class='nav-button <?php if($pageno == 1){ echo 'btn-disabled'; }else{echo 'current';} ?>'><a href="?pageno=1">First</a></li>-->
								<li class="<?php if($pageno == 1){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno == 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="nav-button">Prev</a>
                                </li>
								<?php
								    for($i=1; $i<$total_pages+1; $i++){
							        ?>
							        <li <?php if($pageno == $i){ echo "active"; } ?> '><a href='?pageno=<? echo $i ?>' class="page-number"><? echo $i ?></a></li>
							        <?php
								    }
								?>
								<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="nav-button">Next</a>
                                </li>
								<!--<li><a href="?pageno=<?php echo $total_pages; ?>" class="nav-button">Last</a></li>-->
							</ul>
							<span class="note pull-right">Showing <? echo $offset ?> - <? echo $offset + 24 ?> of <? echo $total_rows; ?> products</span>
						</div>
						
					</div>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 sidebar">
					<div class="widget widget-categories">
						<h5 class="widgettitle">Related Categories</h5>
						<ul class="list-categories">
						    <?php
						    $categories = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='$Parent'");
						    while($ct=mysqli_fetch_assoc($categories)){
						    ?>
							<li><a href='category.php?code=<? echo $ct["id"] ?>'><label for="cb1" class="label-text"><? echo $ct["product"] ?></a></li>
							<?php
						    }
						    ?>
						</ul>
					</div>
					<div class="widget widget-brand">
						<h5 class="widgettitle">Brand</h5>
						<ul class="list-categories">
						    <?php
						        $brandquery = mysqli_query($con, "SELECT id, brandname, logo FROM `brand` WHERE brandcategory='$Parent'");
						        while($bn = mysqli_fetch_assoc($brandquery)){
						    ?>
							<li><input type="checkbox" id="cb10"><a href='brandproducts.php?brandcode=<? echo $bn["id"] ?>' for="cb10" class="label-text"><? echo $bn["brandname"] ?></a></li>
							<?php
						        }
					        ?>
						</ul>
					</div>
					
					<!--<div class="widget widget_filter_color box-has-content">
						<h3 class="widgettitle">color</h3>
						<ul class="list-color">
							<li><input type="checkbox" id="cb15"><label for="cb15" class="label-text">Red<span class="count">(12)</span></label></li>
							<li><input type="checkbox" id="cb16"><label for="cb16" class="label-text">Black<span class="count">(34)</span></label></li>
							<li><input type="checkbox" id="cb17"><label for="cb17" class="label-text">Pink<span class="count">(52)</span></label></li>
							<li><input type="checkbox" id="cb18"><label for="cb18" class="label-text">Grey<span class="count">(55)</span></label></li>
							<li><input type="checkbox" id="cb19"><label for="cb19" class="label-text">White<span class="count">(16)</span></label></li>		
							<li><input type="checkbox" id="cb20"><label for="cb20" class="label-text">Yellow<span class="count">(21)</span></label></li>
							<li><input type="checkbox" id="cb21"><label for="cb21" class="label-text">Blue<span class="count">(19)</span></label></li>
							<li><input type="checkbox" id="cb22"><label for="cb22" class="label-text">Green<span class="count">(31)</span></label></li>
						</ul>
					</div>
					<div class="widget widget-banner row-banner">
						<div class="banner">
							<a href="#"><img src="images/banner21.jpg" alt=""></a>
						</div>
					</div>-->
					<div class="box-product-item">
						<div class="head">
							<h5 class="title">NEW PRODUCTS</h5>
						</div>
						<div class="content">
							<div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0.1"  data-responsive = '{"0":{"items":1}, "560":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
				    			    $newproducts = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='11'");
				    			    while($newp = mysqli_fetch_assoc($newproducts)){
				    			    ?>
								
								<div class="product-item layout2">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $newp["ProductID"]; ?>' class="quickview-button">
											    <span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span>
										    </a>
											<a href='details.php?pcode=<? echo $newp["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $newp["Imageurl"] ?>' alt='<? echo $newp["ProductName"] ?>'></a>
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
											<a href="details.php" class="product-name"><? echo $newp["ProductName"] ?></a>
											<div class="price">
											    <span class="del">BDT. <? echo $newp["originalprice"] ?></span>
												<span class="ins">BDT. <? echo $newp["UnitPrice"] ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php
				    			    }
				    			    mysqli_close($con);
				    			    ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
    ?>