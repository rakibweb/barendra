
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2017 IDSL. All Rights Reserved | Design by  <a href="http://idslbd.com/" target="_blank">IDSL</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
<!--/sidebar-menu-->
	<div class="sidebar-menu">
		<header class="logo1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
		</header>
			<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
               <div class="menu">
				<ul id="menu" >
				    <?php
				    $userid = $_SESSION['empid'];
				    
				    $sql = mysqli_query($con, "SELECT a.id, menuname, parent, active FROM tblcmsmenu a INNER JOIN tblcmspermision b ON a.id = b.menuid 
				    WHERE a.parent=0 AND b.userid='$userid' and active='N'");
				    while($row = mysqli_fetch_assoc($sql))
				    {
				        $mainmenuid = $row["id"];
				    ?>
				    <li id="menu-academico" ><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i><span> <?php echo $row["menuname"] ?></span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
					       <?php
					       $sqlchild = mysqli_query($con, "SELECT id, menuname, url, parent, active FROM tblcmsmenu WHERE parent='$mainmenuid' and active='N' ORDER BY id ASC");
        				    while($rowchild = mysqli_fetch_assoc($sqlchild))
        				    {
    				        ?>
						   	    <li id="menu-academico-avaliacoes" ><a href='<?php echo $rowchild["url"] ?>'> <?php echo $rowchild["menuname"] ?> </a></li>
						   	<?php
        				    }
        				    ?>
					  </ul>
					</li>
					<?php
				    }
				    ?>
					<!--<li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-asterisk" aria-hidden="true"></i>
<span> Categories</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="newcategory.php">Create New Category</a></li>
							<li id="menu-academico-avaliacoes" ><a href="newsubcategory.php">Create Sub Category</a></li>
							<li id="menu-academico-avaliacoes" ><a href="newchildcategory.php">Create Child Category</a></li>
					  </ul>
					</li>
					
					<li id="menu-academico" ><a href="#"><i class="fa fa-bug" aria-hidden="true"></i>
<span> Brands</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="newbrand.php">Create New Brand</a></li>
							<li id="menu-academico-avaliacoes" ><a href="newbrandcategory.php">Create Brand Category</a></li>
					  </ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-bug" aria-hidden="true"></i>
<span> Supplier</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="newsupplier.php">Create New Supplier</a></li>
							<li id="menu-academico-avaliacoes" ><a href="supplierlist.php">Supplier List</a></li>
					  </ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
<span> Order/Invoice</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="pendingorder.php">Pending Order List</a></li>
						   	<li id="menu-academico-avaliacoes" ><a href="processedorder.php">Processed Orders</a></li>
						   	<li id="menu-academico-avaliacoes" ><a href="invoicemaker.php">Invoice Generate</a></li>
					  </ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Products</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
				   		<ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="newproduct.php">Create New Product</a></li>
							<li id="menu-academico-avaliacoes" ><a href="productlist.php">Product List</a></li>
							<li id="menu-academico-avaliacoes" ><a href="editproduct.php">Edit Product</a></li>
					  	</ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Product Details</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
				   		<ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="addscreen.php">Add Product Screen</a></li>
						   	<li id="menu-academico-avaliacoes" ><a href="adddescription.php">Add Description</a></li>
							<li id="menu-academico-avaliacoes" ><a href="#">Product Color</a></li>
							<li id="menu-academico-avaliacoes" ><a href="#">Product Size</a></li>
					  	</ul>
					</li>
					<li id="menu-academico" ><a href="#"><i class="fa fa-internet-explorer" aria-hidden="true"></i>
<span> Ecommerce Portal</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
						   	<li id="menu-academico-avaliacoes" ><a href="newsections.php">Portal Sections</a></li>
							<li id="menu-academico-avaliacoes" ><a href="publish.php">Publish Products</a></li>
					  </ul>
					</li>
				<li><a href="gallery.html"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span><div class="clearfix"></div></a></li>
				<li id="menu-academico" ><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span><div class="clearfix"></div></a></li>
				 <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Short Codes</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
					   <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
						<li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
						<li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
					  </ul>
					</li>
				<li id="menu-academico" ><a href="errorpage.html"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Error Page</span><div class="clearfix"></div></a></li>
				  <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					   <ul id="menu-academico-sub" >
					   <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
						<li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
					  </ul>
					</li>
				 <li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Tables</span><div class="clearfix"></div></a></li>
				<li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li>
		        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
					 <ul id="menu-academico-sub" >
						<li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
						<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
						<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
						

					  </ul>
				 </li>
				<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right menufa"></span><div class="clearfix"></div></a>
				  <ul>
					<li><a href="input.html"> Input</a></li>
					<li><a href="validation.html">Validation</a></li>
				</ul>
				</li>-->
			  </ul>
			</div>
		  </div>
		  <div class="clearfix"></div>		
		</div>
<script>
	var toggle = true;
				
	$(".sidebar-icon").click(function() {                
	  if (toggle)
	  {
		$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
		$("#menu span").css({"position":"absolute"});
	  }
	  else
	  {
		$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
		setTimeout(function() {
		  $("#menu span").css({"position":"relative"});
		}, 400);
	  }
					
		toggle = !toggle;
	});
</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="js/App.js"></script>
  <script>
  $(document).ready(function()
  {
  	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!

	var yyyy = today.getFullYear();
	if(dd<10){
	    dd='0'+dd;
	} 
	if(mm<10){
	    mm='0'+mm;
	} 
	var today = yyyy+'/'+mm+'/'+dd;
  	$('.datepicker').val(today);
  });

  $( function() {
    $( "#datepicker" ).datepicker();
      $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
  });
  
  $('#table-breakpoint').basictable({
	    breakpoint: 768,
	}); 
  </script>


</body>
</html>