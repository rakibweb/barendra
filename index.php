<?php
    include "head.php";
    
?>
    <div class="header-nav-wapper ">
		<div class="container main-menu-wapper">
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-12 left-content">
					<div class="vertical-wapper parent-content">
						<div class="block-title show-content">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
							<span class="text">Categories</span>
						</div>
						<a href="#" class="header-top-menu-mobile"><span class="fa fa-cog" aria-hidden="true"></span></a>
						<div class="vertical-content hidden-content always-open show-up">
							<ul class="vertical-menu ovic-clone-mobile-menu">
								<!--<li><a href="#" class="ovic-menu-item-title" title="Cameras"><span class="icon"><img src="images/icon1.png" alt="image"></span> Cameras sdfsdf</a></li>
								<li><a href="#" class="ovic-menu-item-title" title="Tv & Audio"><span class="icon"><img src="images/icon2.png" alt="image"></span> Tv & Audio</a></li>-->
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Electronics"><span class="icon"><img src="images/icon1.png" alt="image"></span> Electronics</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Electronics</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='38'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<!--<li><a href="#" class="ovic-menu-item-title" title="Accessories"><span class="icon"><img src="images/icon4.png" alt="image"></span> Accessories</a></li>-->
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Men&apos;s Fashion"><span class="icon"><img src="images/icon2.png" alt="image"></span> Men&apos;s Fashion</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Men&apos;s Fashion</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='39'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Women&apos;s Fashion"><span class="icon"><img src="images/icon3.png" alt="image"></span> Women&apos;s Fashion</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Women&apos;s Fashion</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='40'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
											
										</div>
									</div>
								</li>
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Women&apos;s Fashion"><span class="icon"><img src="images/icon7.png" alt="image"></span>Babies & Toy's</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Babies & Toy's</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='102'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
											
										</div>
									</div>
								</li>
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Beauty"><span class="icon"><img src="images/icon4.png" alt="image"></span>Health & Beauty</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Health & Beauty</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='41'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Life Style"><span class="icon"><img src="images/icon5.png" alt="image"></span>FOOD & FRUITS</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">FOOD & FRUITS</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='42'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<li class="menu-item-has-children has-megamenu">
									<a href="#" class="ovic-menu-item-title" title="Groceries"><span class="icon"><img src="images/icon6.png" alt="image"></span> Groceries</a>
									<a href="#" class="toggle-sub-menu"></a>
									<div class="sub-menu mega-menu sub-menu2">
										<div class="row">
											<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<h5 class="title widgettitle">Groceries</h5>
												<ul>
												    <?php
												        $elec = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='56'");
												        while($el=mysqli_fetch_assoc($elec)){
												    ?>
													<li><a href='category.php?code=<?php echo $el["id"] ?>'><?php echo $el["product"] ?></a></li>
													<?php
													}
													?>
												</ul>
											</div>
										</div>
									</div>
								</li>
								<!--<li><a href="#" class="ovic-menu-item-title" title="Printers & Ink"><span class="icon"><img src="images/icon6.png" alt="image"></span> Printers & Ink</a></li>
								<li class="more-item hidden-item"><a href="#" class="ovic-menu-item-title" title="Game & Consoles"><span class="icon"><img src="images/icon7.png" alt="image"></span> Game & Consoles</a></li>
								<li class="more-item hidden-item"> <a href="#" class="ovic-menu-item-title" title="Headphone"><span class="icon"><img src="images/icon8.png" alt="image"></span> Headphone</a></li>-->
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-8 col-sm-12">
										<div class="header-nav container-vertical-wapper ">
											<div class="header-nav-inner">
												<div class="box-header-nav">
													<div class=" container-wapper">
									                    <a href="index.php" class="header-top-menu-mobile"><span class="fa fa-cog" aria-hidden="true"></span></a>
															<a class="menu-bar mobile-navigation " href="index.php">
									                        <span class="icon">
									                            <span></span>
									                            <span></span>
									                            <span></span>
									                        </span>
									                        <span class="text">Main Menu</span>
									                    </a>
														<ul id="menu-main-menu" class="main-menu clone-main-menu ovic-clone-mobile-menu box-has-content">
															<li class="menu-item"><a href="#">Discounts !</a></li>
															<li class="menu-item"><a href="#">Flash Deals </a></li>
															<li class="menu-item"><a href="#">Recipe</a></li>
                                                            <li class="menu-item"><a href="#">Special Offers</a></li>
															<li class="menu-item"><a href="#">Back to School</a></li>
															<li class="menu-item"><a href="#">Handicraft</a></li>
															<li class="menu-item"><a href="https://web.facebook.com/barendrobd/live/" target="_blank"><button type="button" class="btn btn-danger">LIVE</button></a></li>
															<li class="menu-item"><a href="#">eStore</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
			</div>
		</div>
	</div>
		
	<div class="main-content home-page main-content-home3">
		<div class="container">
			<div class="container-offset">
				<div class="main-slideshow slideshow3">
					<div class="owl-carousel nav-style1 owl-background" data-autoplay="true" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "640":{"items":1}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}' data-height="400">
						<div class="slide-item item1 item-background" data-background="images/fashion-slide.png">
							<div class="slide-img"><a href="#" target="_self"><img src="images/fashion-slide.png" alt="image"></a></div>
							<div class="slide-content">
							</div>
						</div>
						<div class="slide-item item2 item-background" data-background="images/life-style-slide.png">
							<div class="slide-img"><a href="#" target="_self"><img src="images/life-style-slide.png" alt="image"></a></div>
							<div class="slide-content">
							</div>
						</div>
						<div class="slide-item item3 item-background" data-background="images/groceries-slide.png">
							<div class="slide-img"><a href="#" target="_self"><img src="images/groceries-slide.png" alt="image"></a></div>
							<div class="slide-content">
							</div>
						</div>
						<div class="slide-item item3 item-background" data-background="images/Womens-fashion.png">
							<div class="slide-img"><a href="#" target="_self"><img src="images/Womens-fashion.png" alt="image"></a></div>
							<div class="slide-content">
							</div>
						</div>
						<div class="slide-item item3 item-background" data-background="images/fashion-bag-slide.png">
							<div class="slide-img"><a href="#" target="_self"><img src="images/fashion-bag-slide.png" alt="image"></a></div>
							<div class="slide-content">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content shop-page about-page">
        		<div class="brand">
        			<div class="container">
        			    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        				    <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":3}, "768":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>
        					<div class="brand-item"><a href="sections.php?code=14"><img src="images/99_store.jpg" alt="image"></a></div>
        					<div class="brand-item"><a href="sections.php?code=13"><img src="images/masher_bazzar.png" alt="image"></a></div>
        					<div class="brand-item"><a href="sections.php?code=18"><img src="images/ramadan-fest.jpg" alt="image"></a></div>
        					<div class="brand-item"><a href="sections.php?code=17"><img src="images/Safety-fast.jpg" alt="image"></a></div>
        					<div class="brand-item"><a href="sections.php?code=16"><img src="images/gift_shop.png" alt="images"></a></div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="row">
				<div class="sidebar home-sidebar col-xs-12 col-sm-4 col-md-4 col-lg-3">
					<div class="box-product-item">
						<div class="head">
							<h5 class="title"><a href="sections.php?code=6">Daily Deal </a></h5>
						</div>
						<div class="content">
							<div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0.1"  data-responsive = '{"0":{"items":1}, "560":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
				    			    $dailydeal = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='6'");
				    			    while($dailyd = mysqli_fetch_assoc($dailydeal)){
			    			    ?>
								<div class="product-item layout2">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $dailyd["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
											<a href='details.php?pcode=<? echo $dailyd["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $dailyd["Imageurl"] ?>' alt='<? echo $dailyd["ProductName"] ?>'></a>
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
											<a href='details.php?pcode=<? echo $dailyd["ProductID"] ?>' class="product-name"><? echo $dailyd["ProductName"] ?></a>
											<div class="price">
											    <span class="del">৳ <? echo $dailyd["originalprice"] ?></span>
												<span class="ins">৳ <? echo $dailyd["UnitPrice"] ?></span>
											</div>
										</div>
										<?php
										$y = date('Y');
										$m = date('m');
										$w = date('W');
										$d = date('d');
										$h = date('h');
										?>
										<div class="kt-countdown" data-y='<? echo $y ?>' data-m='<? echo $m ?>' data-w='<? echo $w ?>' data-d='<? echo $d ?>' data-h="20" data-i="60" data-s="60"> </div>
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
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $bests["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
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
											<a href='details.php?pcode=<? echo $bests["ProductID"] ?>' class="product-name"><? echo $bests["ProductName"] ?></a>
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
					<br>
					<div class="box-product-item">
						<div class="head">
							<h5 class="title">TOP RATED</h5>
						</div>
						<div class="content">
							<div class="owl-carousel nav-style2" data-autoplay="false" data-nav="true" data-dots="false" data-loop="true" data-slidespeed="800" data-margin="0.1"  data-responsive = '{"0":{"items":1}, "560":{"items":2}, "768":{"items":1}, "1024":{"items":1}, "1200":{"items":1}}'>
								<?php
				    			    $toprated = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='3'");
				    			    while($topr = mysqli_fetch_assoc($toprated)){
				    			    ?>
								
								<div class="product-item layout2">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $topr["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
											<a href='details.php?pcode=<? echo $topr["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $topr["Imageurl"] ?>' alt='<? echo $topr["ProductName"] ?>'></a>
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
											<a href='details.php?pcode=<? echo $topr["ProductID"] ?>' class="product-name"><? echo $topr["ProductName"] ?></a>
											<div class="price">
											    <span class="del">৳ <? echo $topr["originalprice"] ?></span>
												<span class="ins">৳ <? echo $topr["UnitPrice"] ?></span>
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
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $globalc["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
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
											<a href='details.php?pcode=<? echo $globalc["ProductID"] ?>' class="product-name"><? echo $globalc["ProductName"] ?></a>
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
					<div class="widget widget-banner row-banner">
						<div class="banner">
							<a href="#"><img src="images/home-shop-add.jpg" alt="image"></a>
						</div>
					</div>
				</div>
				<div class="right-content-offset col-xs-12 col-sm-8 col-md-8 col-lg-9">
				    <!--<div class="products-arrivals">
						<div class="section-head box-has-content">
							<h4 class="section-title">TOP BRANDS</h4>
						</div>
						<div class="section-content">
							<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
							    <?php
							    //$brand = mysqli_query($con, "SELECT id, brandname, logo FROM brand");
							    //while($br=mysqli_fetch_assoc($brand)){
							    ?>
			    				<div class="product-item layout1">
									<div class="product-inner equal-elem">
									    <div class="thumb">
											<a href='brandproducts.php?brandcode=<?php //echo $br["id"]; ?>' class="thumb-link"><img src='cms/<?php //echo $br["logo"] ?>' alt='<?php //echo $br["brandname"] ?>'></a>
										</div>
									</div>
								</div>
								<?php
							    //}
							    ?>
			    			</div>
			    		</div>
					</div>-->
				    <div class="group-product layout1">
						<div class="kt-tab nav-tab-style1">
							<div class="section-head box-has-content">
								<h4 class="section-title feature"><a href='sections.php?code=2'>Featured Products <span class="viewall">(view all)</span></a></h4>
								<ul class="nav list-nav">
									<li class="active"><a data-animated="fadeIn" data-toggle="pill" href="#ALL">ALL</a></li>
									<li><a data-animated="pulse" data-toggle="pill" href="#Gadgets">Gadgets</a></li>
									<li><a data-animated="fadeInLeft" data-toggle="pill" href="#Fashion">Fashion</a></li>
									<li><a data-animated="fadeInLeft" data-toggle="pill" href="#Handicraft">Handicraft</a></li>
									<li><a data-animated="fadeInLeft" data-toggle="pill" href="#Beauty">Beauty</a></li>
									<li><a data-animated="fadeInRight" data-toggle="pill" href="#Groceries"> Groceries</a></li>
								</ul>
							</div>
							<div class="section-content">
								<div class="tab-content">
						    		<div id="ALL" class="tab-panel active">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
					    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' ");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt='<? echo $fshg["ProductName"] ?>'></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
															    <span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
																
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
											</div>
											<?php
						    			    }
											?>
						    			</div>
						    		</div>
						    		<div id="Gadgets" class="tab-panel">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
					    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' AND b.CategoryID='38'");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt='<? echo $fshg["ProductName"] ?>'></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
															    <span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
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
											</div>
											<?php
						    			    }
											?>
											
						    			</div>
						    		</div>
						    		<div id="Fashion" class="tab-panel">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
					    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' AND b.CategoryID='40'");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt='<? echo $fshg["ProductName"] ?>'></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
																<span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
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
											</div>
											<?php
						    			    }
											?>
						    			</div>
						    		</div>
						    		<div id="Handicraft" class="tab-panel">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
					    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' AND b.CategoryID='42'");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt='<? echo $fshg["ProductName"] ?>'></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
																<span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
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
											</div>
											<?php
						    			    }
											?>
						    			</div>
						    		</div>
						    		<div id="Beauty" class="tab-panel">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
					    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' AND b.CategoryID='41'");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt='<? echo $fshg["ProductName"] ?>'></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
																<span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
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
											</div>
											<?php
						    			    }
											?>
						    			</div>
						    		</div>
						    		<div id="Groceries" class="tab-panel">
						    			<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
						    			    <?php
						    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
						    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
						    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
						    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='2' AND b.CategoryID='56'");
						    			    while($fshg = mysqli_fetch_assoc($fashgadgate)){
						    			    ?>
						    				<div class="row-item">
							    				<div class="product-item layout1">
													<div class="product-inner equal-elem">
														<div class="thumb">
															<a href='model/cartAction.php?action=addToCart&id=<?php echo $fshg["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $fshg["Imageurl"] ?>' alt="image"></a>
														</div>
														<div class="info">
															<a href='details.php?pcode=<? echo $fshg["ProductID"] ?>' class="product-name"><? echo $fshg["ProductName"] ?></a>
															<div class="price">
																<span class="del">৳ <? echo $fshg["originalprice"] ?></span>
																<span class="ins">৳ <? echo $fshg["UnitPrice"] ?></span>
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
					<div class="products-arrivals">
						<div class="section-head box-has-content">
							<h4 class="section-title winter"><a href='sections.php?code=12'>WINTER COLLECTION <span class="viewall">(view all)</span></a></h4>
						</div>
						<div class="section-content">
							<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
                    		<?php
                    			$wintercquery = mysqli_query($con, "SELECT a.Id, a.ProductId, b.ProductName, ROUND(b.UnitPrice, 2) UnitPrice, b.originalprice, SectionId, 
                    			b.Imageurl, c.product FROM content_publish a INNER JOIN tblproducts b ON a.ProductId=b.ProductId INNER JOIN tbl_menu c ON c.id=b.SubCategoryId 
                    			WHERE SectionId ='12' AND Expire = 'N' limit 10");
                                while($winterc = mysqli_fetch_assoc($wintercquery)) {
                            ?>
			    				<div class="product-item layout1">
									<div class="product-inner equal-elem">
										<div class="thumb">
										    <a href='model/cartAction.php?action=addToCart&id=<?php echo $winterc["ProductId"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
											<a href='details.php?pcode=<? echo $winterc["ProductId"] ?>' class="thumb-link"><img src='cms/<? echo $winterc["Imageurl"] ?>' alt='<? echo $winterc["ProductName"] ?>'></a>
										</div>
										<div class="info">
											<a href='details.php?pcode=<? echo $winterc["ProductId"] ?>' class="product-name"><? echo $winterc["ProductName"] ?></a>
											<div class="price">
												<span class="del">৳ <? echo $winterc["originalprice"] ?></span>
												<span class="ins">৳ <? echo $winterc["UnitPrice"] ?></span>
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
				    <div class="products-arrivals">
						<div class="section-head box-has-content">
							<h4 class="section-title hotdeal"><a href='sections.php?code=1'>HOT DEAL <span class="viewall">(view all)</span></a></h4>
						</div>
						<div class="section-content">
							<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
                    		<?php
                    			$Onsalequery = mysqli_query($con, "SELECT a.Id, a.ProductId, b.ProductName, ROUND(b.UnitPrice, 2) UnitPrice, b.originalprice, SectionId, 
                    			b.Imageurl, c.product FROM content_publish a INNER JOIN tblproducts b ON a.ProductId=b.ProductId INNER JOIN tbl_menu c ON c.id=b.SubCategoryId 
                    			WHERE SectionId ='1' AND Expire = 'N' limit 10");
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
					<div class="products-arrivals">
						<div class="section-head box-has-content">
							<h4 class="section-title arrival"><a href='sections.php?code=4'>New Arrivals <span class="viewall">(view all)</span></a></h4>
						</div>
						<div class="section-content">
							<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1}, "768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
			    				<?php
				    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='4'");
				    			    while($newr = mysqli_fetch_assoc($fashgadgate)){
				    			    ?>
			    				<div class="product-item layout1">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $newr["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
											<a href='details.php?pcode=<? echo $newr["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $newr["Imageurl"] ?>' alt='<? echo $newr["ProductName"] ?>'></a>
										</div>
										<div class="info">
											<a href='details.php?pcode=<? echo $newr["ProductID"] ?>' class="product-name"><? echo $newr["ProductName"] ?></a>
											<div class="price">
												<span class="del">৳ <? echo $newr["originalprice"] ?></span>
												<span class="ins">৳ <? echo $newr["UnitPrice"] ?></span>
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
					<div class="products-onsale">
						<div class="section-head box-has-content">
							<h4 class="section-title onsale"><a href='sections.php?code=5'>Onsale Products <span class="viewall">(view all)</span></a></h4>
						</div>
						<div class="section-content">
							<div class="owl-carousel product-list-owl nav-style2 equal-container" data-autoplay="false" data-nav="true" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="0"  data-responsive = '{"0":{"items":1}, "480":{"items":2,"margin":0}, "700":{"items":3,"margin":-1},"768":{"items":2}, "1025":{"items":3}, "1200":{"items":4}}'>
			    				<?php
				    			    $fashgadgate = mysqli_query($con, "SELECT b.ProductID, b.ProductName, b.merchantpcode, b.SupplierID, b.BrandId, b.CategoryID,
				    			    b.SubCategoryId, b.QuantityPerUnit, b.UnitPrice, b.originalprice, b.description, b.Overview, b.additionalinfo, 
				    			    b.Commission, b.Imageurl, CreatedDate, LastUpdate, CreatedBy, ReorderLevel, Discontinued, ip FROM content_publish a 
				    			    INNER JOIN tblproducts b ON a.ProductId=b.ProductID WHERE a.SectionId='5'");
				    			    while($onsale = mysqli_fetch_assoc($fashgadgate)){
				    			    ?>
			    				
			    				
								<div class="product-item layout1">
									<div class="product-inner equal-elem">
										<div class="thumb">
											<a href='model/cartAction.php?action=addToCart&id=<?php echo $onsale["ProductID"]; ?>' class="quickview-button"><span class="text"><span class="icon"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span> ADD TO CART</span></a>
											<a href='details.php?pcode=<? echo $onsale["ProductID"] ?>' class="thumb-link"><img src='cms/<? echo $onsale["Imageurl"] ?>' alt='<? echo $onsale["ProductName"] ?>'></a>
										</div>
										<div class="info">
											<a href='details.php?pcode=<? echo $onsale["ProductID"] ?>' class="product-name"><? echo $onsale["ProductName"] ?></a>
											<div class="price">
												<span class="del">৳ <? echo $onsale["originalprice"] ?></span>
												<span class="ins">৳ <? echo $onsale["UnitPrice"] ?></span>
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
	</div>
	<div class="main-content shop-page about-page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    <hr>
					 <meta name="viewport" content="width=device-width, initial-scale=1">
                          <style>#more {display: none;}</style>
                    <h1 class="widgettitle">Barendro.com ।। Online Shopping Site in Rajshahi</h1>
                    <p align="justify">Barendro.com is a Online Marketplace at Rajshahi in Bangladesh. Launched in July 01, 2019, the online store offers the widest range of products in categories ranging from men's & women's clothes, electronics, groceries, cosmetics, gift items & more. Barendro.com believes in “Smart Shopping, Starts Here” with an excellent customer experience thus provides the most efficient delivery<span id="dots">...</span><span id="more">  service through own logistics so that customers get a hassle-free product delivery at their doorstep within 3 to7 days. <br><br>We help our local and international vendors as well as 10K products across 300+ categories & 15 brands serving Million of consumers from all over the world. We also offer free returns and various payment methods cash on delivary, bkash, Credit card, Debit card, Visa Card & Master Card with all of our products
                    <br><br>E-commerce is modernizing the way all shopping in Bangladesh. Such as, do you want to hope from one store to another in search of the latest mobile, when you can find it on the Internet in a single click? Not only mobile. Barendro online shopping stores everything you can possibly imagine, from trending electronics like Computers, Laptops, Tablets, Smartphone, and mobile's Accessories, to in-vogue fashion staples like shoes, sunglass, belt, watches, bag, body health & body care products; Women’s fashion like Saree, Lehenga, T-shirt, Tops, Polo shirt, Short & long sleeve dress, hijab, Scarf, bra, panties, night-wear, salwar, kamiz, suit, gifts from boyfriend, combo collection, party wear lifestyle accessories; Men’s fashion like Jeans, Gabardine, Casual & Formal Shirt, Underwear, Under-vest and many type of kids & baby wears; from cosmetics like body spray, perfume, attar, hair care, make-up, female hygienic cure, from modern furniture like sofa sets, dining tables, chair and wardrobes; to appliances that make your life easy like washing machines, TVs, ACs, mixer grinder juicers and other time-saving kitchen and small appliances; from home furnishings like cushion covers, mattresses and bed sheets to toys and musical instruments, we got them all covered. You name it, and you can stay assured about finding them all here. For those of you with erratic working hours, Barendro is your best online shopping site of bet. You are shopping, at night or the midget hours of the morning in. it's never shuts down for shopping in Bangladesh.
                    <br><br><b>Note:</b> What's more, with our year-round shopping festivals and events, our prices are irresistible. We're sure you'll find yourself picking up more than what you had in mind at online Shopping store.
                    <br><br><b>Why you to shopping from Barendro?</b>
                    <br><br><b>No Cost EMI:</b>
                    <br>In an attempt to make high-priced products cheap to all, our ‘No Cost EMI’ plan enables you to shopping with us under EMI, without shelling out any processing fee. Applicable on select mobiles, laptops, large and small appliances, furniture, electronics and watches, you can now shopping without vacant in your pocket. If you've been eyeing a product for a long time, chances are it may be up for a ‘No Cost EMI’. Although take a look ‘terms & conditions*’ apply for shopping
                    <br><br><b>EMI on Credit Card and Mobile Banking:</b>
                    <br>Enabling EMI on Credit Cards, in another attempt to make online shopping accessible to everyone, Barendro introduces EMI on credit cards, empowering you to shopping confidently with us without having to worry about pauses in monthly cash flow. At present, we have partnered with EBL, DBBL, Standard Chartered Bank, SBL, Bank Asia, Brac Bank, IBBL and MTB for these facilities for shopping from Bangladesh. More power to all our shoppers’ terms & conditions apply. Also Mobile Banking at present, we have partnered with bKash, Rocket, Sure Cash and Nogod for these facilities.
                    <br><br><b>Home Delivery Services:</b>
                    <br>The increasing amount of small-sized shipments and their frequency variation, due to the growth of e-commerce, pose a great challenge to logistics service providers. barendro offers shipping, tracking and home delivery services. When you order, In Dhaka cities, the product delivery takes 2 (two) working days and in some cases, it may take up to 3 (three) working days and others cities or district, the takes 3-5 working days. Customers inside Dhaka, if they are under the daily delivery area, can also avail same day delivery service. In case it may vary due to Political/ Natural disturbances in the country, the product delivery takes outside of Dhaka 3-10 workings days is required for proper delivery of the product. As barendro rely on self & third party logistics partners (SA Paribahan, Sundarban Courier, eCourier & more) and vendors for product delivery issue and therefore, Barendro has limited control on due time delivery. For any query please contacts us at our ISP Number is 09669966888 (Hotline) (Everyday 08.00 am to 22.00pm).
                    <br><br><b>Super Deal:</b>
                    <br>Barendro short-time, long-time, Seasonal offers Flash Sale Coupons & Promo Codes up to 7% - 60% discount offer with free shipping services, So take a look promotional time 'Promo' apply for shopping. Also mobile banking service gives the up to 20% discount for shopping in banglaiyana.com.bd
                    
                    
                    <br><br><b>Shopping in Barendro:</b>
                    
                    <br><b>Handicraft Product, Style and Accessories:</b>
                    <br>Precisely expressed as artisanal handmade, is any of a wide variety of types of work where useful and decorative objects are made completely by hand and by using only simple tools. If you love handicraft items then this barendro.com.bd shopping site should be your ideal sanctuary, barendro shopping site can gave possibly genuine products, from trending craft like handmade fashion style from bengali festival saree, salwar kamiz, shawl, scarf, nakshi kantha, table cloths, bedsit, cushion covers, place-mats, bags, purses, shataranji, floor runner, and other decorative arts and crafts items like from photo frame, wall hangings, card and folder, fine arts, and home decor like from calendar, diary-notebook, bonsai, show piece, aquarium, flower vase, baskets-boxes and baskets & party favors and gift items.
                    
                    Tribal and Bengali artisans from all over Bangladesh will give you thousands of different varieties of handicrafts zest of their simplicity and nativity. the following list of crafts is included merely for illustrative purposes. applique, crocheting, embroidery, felt-making, knitting, lace-making, macrame, quilting, tapestry art and weaving.
                    <br><br><b>Electronic Products, Devices and Accessories:</b>
                    <br>When it comes to laptops, we are not far behind. Filter among dozens of super-fast operating systems, hard disk capacity, RAM, lifestyle, screen size and many other criteria for personalized results in a flash. All you students out there, confused about what laptop to get? Our back To College Store segregates laptops purpose wise (gaming, browsing and research, project work, entertainment, design, multi-tasking) with recommendations from top brands and industry experts, facilitating a shopping experience that is quicker and simpler.
                    <br>Photography lovers, you couldn't land at a better page than ours. Cutting-edge DSLR cameras, ever reliable point-and-shoot cameras, millennial favorite instant cameras or action cameras for adventure junkies: our range of cameras is as much for beginners as it is for professionals. Canon, Nikon, Sony, and Fujifilm are some big names you'll find in our store. Photography lovers, you couldn't land at a better page than ours.
                    
                    <br>Our wide-ranging mobile accessories starting from headphones, power banks, memory cards, mobile chargers, to selfie sticks can prove to be ideal travel companions for you and your phone; never again worry about running out of charge or memory on your next vacation.
                    
                    <br>LED, Semi-LED and Sleek TVs, power-saving copper condenser refrigerators, rapid-cooling ACs, resourceful washing machines - discover everything you need to run a house under one roof. Our Dependable TV and Appliance Store ensures zero transit damage, with a replacement guarantee if anything goes wrong; delivery and installation as per your convenience and a warranty (Official Brand Warranty) rest assured, value for money is what is promised and delivered. Shop from market leaders in the country like Samsung, LG, Whirlpool, Panasonic, My One, Walton, Minister, Sony, Daikin, and Hitachi among many others.
                    
                    <br>Find handy and practical home appliances designed to make your life simpler: electric kettles, OTGs, microwave ovens, sandwich makers, hand blenders, coffee makers, Electric Oven and many more other time-saving appliances that are truly crafted for a quicker lifestyle. Live life king size with these appliances at home.
                    
                    
                    <br><br><b>Lifestyle Fashion, Beauty salon and Jewelry gallery:</b>
                    <br>Barendro.com.bd is your one-stop shopping destination for anything and everything you need to looking good. Our exhaustive range of Western, Indian, Pakistani and Bangladeshi cloths, summer, winter occasional festival and bridal clothing, formal and casual footwear, bridal and artificial jewelry, long-lasting make-up, grooming tools and accessories are sure to sweep you off your feet. Shop from crowd favorites like Raaz, Apara, Big Bang, Buy&Buy, Forever 21, Rich-man, Biswa Rong, Rongrez, Only, Arrow, Woodland, Nike, Puma, Revlon and Mac among dozens of other top-of-the-ladder names. Explore our in-house brands like Metronaut, Anmi, and Denizen, to name a few, for carefully curated designs that are the talk of the town. Get ready to be spoiled for choice.Festivals, office get-together, weddings, brunches, or nightwear like from fashion style lingerie,swimwear,bra,bikini - Barendro.com.bd will have your back each time.
                    
                    
                    <br><br><b>Baby, Kids and Toys:</b>
                    Your kids deserve only the best. From bodysuits, booties, diapers to strollers, if you're an expecting mother or a new mother, you will find everything you need to set sail on a smooth parenting journey with the help of our baby care collection. when it comes to safety, hygiene and comfort, you can rely on us without a second thought. Huggies, Supper Mom, Avonee, Molfix, Chuchu, Nannys, Kidz, Boshundhara, NeoCare, Lovebaby, Bebem, Pampers, MamyPoko, and Johnson & Johnson, we host only the most-trusted names in the business for your baby
                    
                    
                    <br><br><b>Foods and Nutrition:</b>
                    The effective management of food intake and nutrition are both key to good health. smart nutrition and food choices can help prevent disease. Eating the right foods can help your body cope more successfully with an ongoing illness. good nutrition to what you eat can help you maintain or improve your health. one-stop destination for everything, it's comes to safety, pure, comfort and it's kinds of baby foods, child foods, healthy food and nutrition at barendro online shopping store, you can rely on us without a second thought. here you can get food and nutrition from different brands for everybody starting from 6 months baby. we host only the most-trusted names in the business for your health, shop from crowd favorites like from Horliex, Vivo, Serelax, Beverly International, Blackstone Labs, Kaged Muscle, Cellucor. Merica Labz, RedCon1, Dymatize, HPN, iSator, Universal Nutrition. BSN, Glonutra, Khass food and Hive Honey and more.
                    
                    
                    <br><br><b>Home and Furniture:</b>
                    <br>Barendro is always giving you furniture to fit your residence, the products of more than 10+ furniture brands of the most popular bangladesh and foreign countries, with the hundreds of options thrown at you. here easy to buy a new beds, sofa sets, dining tables & chair, wardrobes, reading & computer table, rack and TV units. so, for furniture shopping from one place to another place don't waste your time, sitting in the house, you order furniture for your choice on online. barendro is ready to reach your ordering goods quickly and carefully. the purchase of furniture on barendro, bind to provide sales and sales service (The Official Brand) for maximum 5 years. all our furniture has gone through load tests so that you receive only the best-quality furniture.be Companies are Brothers Furniture, OTOBI Furniture, Pertex Furniture, HI-TECH Furniture, Muntafi Furniture, NADIA Furniture, Noksha Furniture & more.


                    </p>
                    <button onclick="myFunction()" id="myBtn">Read more</button>
                    <script>
                            function myFunction() {
                              var dots = document.getElementById("dots");
                              var moreText = document.getElementById("more");
                              var btnText = document.getElementById("myBtn");
                            
                              if (dots.style.display === "none") {
                                dots.style.display = "inline";
                                btnText.innerHTML = "Read more"; 
                                moreText.style.display = "none";
                              } else {
                                dots.style.display = "none";
                                btnText.innerHTML = "Read less"; 
                                moreText.style.display = "inline";
                              }
                            }
                    </script>
				</div>
			</div>
		</div>
	</div>
	<br>

	<?php
	    include "footer.php";
    ?>