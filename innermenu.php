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
					<div class="vertical-content hidden-content">
						<ul class="vertical-menu ovic-clone-mobile-menu">
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
								<a href="#" class="ovic-menu-item-title" title="Beauty"><span class="icon"><img src="images/icon4.png" alt="image"></span> Beauty</a>
								<a href="#" class="toggle-sub-menu"></a>
								<div class="sub-menu mega-menu sub-menu2">
									<div class="row">
										<div class="widget-custom-menu col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<h5 class="title widgettitle">Beauty</h5>
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
								<a href="#" class="ovic-menu-item-title" title="Life Style"><span class="icon"><img src="images/icon5.png" alt="image"></span> FOOD & FRUITS</a>
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
						</ul>
						
					</div>
				</div>
			</div>
			
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 col-ts-12 right-content">
				<!--<div class="hotline">
					<div class="icon">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<div class="content">
						<span class="text">Call us now</span>
						<span class="number">(080)123 4567 891</span>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</div>