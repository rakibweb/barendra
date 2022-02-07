<?php
    include "head.php";
    
    include "innermenu.php";
    $id = "";
    
    if (!isset($_GET['search'])) {
       $id = $_SESSION["search"];
    }
    else{
       $_SESSION["search"] = $_GET["search"];
       echo "<meta http-equiv='refresh' content='0;url=search.php'>";
    }
    if(strlen($id)>15)
    {
        echo "<meta http-equiv='refresh' content='0;url=http://shop.barendro.com'>";
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

    /*$Onsalequery = mysqli_query($con, "SELECT id, product, Parent FROM tbl_menu WHERE id='$id'");
    while($Onsalerows = mysqli_fetch_assoc($Onsalequery)) {
        $CategoryId = $Onsalerows["id"];
        $CategoryName = $Onsalerows["product"];
        $Parent= $Onsalerows["Parent"];
    }*/
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page main-content-list">
		<div class="container">
			<div class="breadcrumbs">
				<a href="http://www.shop.barendro.com/">Home</a> > <span class="current"><? echo $id ?></span>
			</div>
		</div>
	</div><hr align="certer" width="87%">
	<div class="main-content shop-page main-content-list">
	    <div class="container">
		    <div class="row">
		        <div class="row">
    		        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-12 content-offset">
    		            <?php
    				        $brandquery = mysqli_query($con, "SELECT id, brandname, logo FROM `brand` WHERE brandcategory='$Parent'");
    				        while($bn = mysqli_fetch_assoc($brandquery)){
    				    ?>
    		           <div class="col-xs-12 col-sm-6 col-md-8 col-lg-2 content-offset">
        		           <div class="widget widget-banner row-banner">
        						<div class="banner">
        							<a href='brandproducts.php?brandcode=<? echo $bn["id"] ?>'><img src='cms/<? echo $bn["logo"] ?>' alt='<? echo $bn["brandname"] ?>' style="height:154px;"></a>
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
	<div class="main-content shop-page main-content-list">
	    <div class="container">
		    <div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-offset">
					<div class="categories-content">
						<div class="top-control box-has-content">
							<div class="control">
							    <h3 class="pull-left">Your search result for: <? echo $id ?></h3>
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
						        FROM tblproducts WHERE ProductName LIKE '%$id%' LIMIT $offset, $no_of_records_per_page");
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
											<span>BDT. <?php echo $cp["UnitPrice"] ?> <span style="text-decoration: line-through;padding-left: 20px;">৳ <?php echo $cp["originalprice"] ?></span></span>
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
							        <li class='nav-button <?php if($pageno == $i){ echo "active"; } ?> '><a href='?pageno=<? echo $i ?>' class="page-number"><? echo $i ?></a></li>
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
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
    ?>