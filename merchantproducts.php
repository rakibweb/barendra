<?php
    include "head.php";
    
    include "innermenu.php";
    $id = "";
    if(strlen($id)>6)
    {
        echo "<meta http-equiv='refresh' content='0;url=http://shop.barendro.com'>";
    }
    else{
        if (!isset($_GET['mcode'])) {
           $id = $_SESSION["mcode"];
        }
        else{
           $_SESSION["mcode"] = $_GET["mcode"];
           echo "<meta http-equiv='refresh' content='0;url=merchantproducts.php'>";
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

    $Onsalequery = mysqli_query($con, "SELECT SupplierID, CompanyName, ContactName, ContactTitle, CategoryId, Address, City, Region, PostalCode, Country, Phone, Email, 
    HomePage, BankName, AccountNumber, BankBranch, Password FROM tblsuppliers WHERE SupplierID='$id'");
    while($Onsalerows = mysqli_fetch_assoc($Onsalequery)) {
        $CategoryId = $Onsalerows["SupplierID"];
        $CategoryName = $Onsalerows["CompanyName"];
        $Parent= $Onsalerows["CategoryId"];
    }
    
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page main-content-list">
		<div class="container">
			<div class="breadcrumbs">
				<a href="#">Home</a> \ <span class="current"><? echo $CategoryName ?></span>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-7 col-md-8 col-lg-12 content-offset">
					<!--<div class="main-banner">
					    <div class="row">
				            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-4">
				                <p style="background-color:#fff; margin-left:5px; margin-top:5px;"><img src="cms/brands/Barendro-store.png" height="110px" alt="logo" style="align-content: left;">Barendro Store</p>
				            </div>
				        </div>
					</div>-->
					<div class="categories-content">
						
						<div class="top-control box-has-content">
						    <span class="shop-title"><? echo $CategoryName ?></span>
							<div class="control">
								<div class="control-button">
									<a href="#" class="grid-button active"><span class="icon"><i class="fa fa-th-large" aria-hidden="true"></i> </span>Grid</a>
									<a href="#" class="list-button"><span class="icon"><i class="fa fa-th-list" aria-hidden="true"></i></span> List</a>
								</div>
							</div>
						</div>
						<div class="product-container auto-clear grid-style equal-container box-has-content">
						    <?php
						        $catpr = mysqli_query($con, "SELECT ProductID, ProductName, merchantpcode, SupplierID, BrandId, CategoryID, SubCategoryId, QuantityPerUnit, 
						        UnitPrice, originalprice, description, Overview, Commission, Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip 
						        FROM tblproducts WHERE SupplierID='$id'");
						        while($cp = mysqli_fetch_assoc($catpr)){
						    ?>
							<div class="product-item layout1 col-ts-12 col-xs-6 col-sm-6 col-md-3 col-lg-2 no-padding">
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
											<span class="ins">৳ <?php echo $cp["UnitPrice"] ?></span>	
											<span class="del"> <?php echo $cp["originalprice"] ?></span>
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
						<div class="pagination-area">
                            <?php //echo $pagination->createLinks(); ?>
                        </div>
						<div class="pagination">
							<ul class="list-page">
								<li><a href="#" class="page-number current">1</a></li>
								<li><a href="#" class="page-number">2</a></li>
								<li><a href="#" class="page-number">3</a></li>
								<li><a href="#" class="nav-button">Next</a></li>
							</ul>
						</div>
						<span class="note">Showing 1-8 of 12 result</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
    ?>