<?php
	include 'Model/connect_db.php';
	include 'head.php';
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="newproduct.php">New Product</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-2 control-label">Product Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtProductName" placeholder="Product Name">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Code</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtMerchantCode" placeholder="Merchant Product Code">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Supplier/Merchant</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtSupplier">
						<option value="0">Select Supplier</option>
						<?php 
							$sup = mysqli_query($con, "SELECT SupplierID, CompanyName FROM tblsuppliers");
							while ($suprow = mysqli_fetch_assoc($sup)) {
						?>
								<option value='<?php echo $suprow["SupplierID"] ?>'><?php echo $suprow["CompanyName"] ?></option>
							
						 <?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtCategory" id="txtCategory">
						<option value="0">Select Category</option>
						<?php 
							$cat = mysqli_query($con, "SELECT id, product FROM tbl_menu WHERE parent='0'");
							while ($catrow = mysqli_fetch_assoc($cat)) {
						?>
								<option value='<?php echo $catrow["id"] ?>'><?php echo $catrow["product"] ?></option>
							
						 <?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Sub Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtSubCategory" id="txtSubCategory">
						<option value="0">Select Sub Category</option>
						<?php 
							//$subcat = mysql_query("SELECT CategoryID, CategoryName, Description, Picture FROM categories");
							//while ($scatrow = mysql_fetch_assoc($subcat)) {
						?>
							<!--<option value='<?php echo $scatrow["CategoryID"] ?>'><?php echo $scatrow["CategoryName"] ?></option>-->
							
						 <?php
						//}
						?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">Brand</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtBrand" id="txtBrand">
						<option value="0">Select Brand</option>
						<?php 
							$brand = mysqli_query($con, "SELECT id, brandname, brandcategory, logo FROM brand");
							while ($brandrow = mysqli_fetch_assoc($brand)) {
						?>
								<option value='<?php echo $brandrow["id"] ?>'><?php echo $brandrow["brandname"] ?></option>
							
						 <?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Quantity Per Unit</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtQuantityPerUnit" placeholder="Quantity Per Unit">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Original Price</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtOriginalPrice" placeholder="Original Price">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Current Price</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="number" class="form-control1" name="txtUnitPrice" placeholder="Unit Price">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Commission/wholesale price</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-percent" aria-hidden="true"></i>
					</span>
					<input type="number" class="form-control1" name="txtCommission" placeholder="ex. 10.00">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Image</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
					<input type="file" class="form-control" name="lstImage" id="lstImage"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<div class="input-group input-icon right">
					
					<input type="submit" name="submit" class="btn btn-primary" value="Save New Product">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $ProductName = $_POST["txtProductName"];
                $MerchantCode = $_POST["txtMerchantCode"];
                $SupplierID = $_POST["txtSupplier"];
                $CategoryID = $_POST["txtCategory"];
                $SubCategoryID = $_POST["txtSubCategory"];
                //$ChildCategoryID = $_POST["txtChildCategory"];
                $Brand = $_POST["txtBrand"];
                $QuantityPerUnit = $_POST["txtQuantityPerUnit"];
                $OriginalPrice = $_POST["txtOriginalPrice"];
                $UnitPrice = $_POST["txtUnitPrice"];
                $CreatedDate = date("Y-m-d");
                $CreatedBy = $_SESSION['empid'];
                $Commission = $_POST["txtCommission"];

                $ip = $_SERVER['REMOTE_ADDR'];
                $imgurl = "images/products/". basename($_FILES["lstImage"]["name"]);
                echo $CategoryID;
                echo $ChildCategoryID;
                 $result = mysqli_query($con, "INSERT INTO tblproducts(ProductName, merchantpcode, SupplierID, CategoryID, SubCategoryId, BrandId ,QuantityPerUnit, UnitPrice, originalprice, Commission,  Imageurl, CreatedDate, LastUpdate, CreatedBy, Discontinued, ip) 
                 VALUES ('$ProductName','$MerchantCode','$SupplierID','$CategoryID', '$SubCategoryID', '$Brand','$QuantityPerUnit','$UnitPrice', '$OriginalPrice', '$Commission', '$imgurl','$CreatedDate','$CreatedDate','$CreatedBy','n','$ip')");
                 if($result==1)
                 {
                 	echo "Posted Successfully on ".$CreatedDate;
                 }
                else
                {
                	echo "Posting Failed";
                }

                $target_dir = "images/products/";
			 $target_file = $target_dir . basename($_FILES["lstImage"]["name"]);
			 $uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			//if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["lstImage"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			//}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["lstImage"]["size"] > 500000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} 
			else{
				if (move_uploaded_file($_FILES["lstImage"]["tmp_name"], $target_file)) {
					echo "The file ". basename( $_FILES["lstImage"]["name"]). " has been uploaded.";
				}
				else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
            }
            else
            {
				//echo "Not Successful";
            }
        ?>

	</form>
	<?php
        }
        else
        {
            echo "<a href='index.php'>Login</a>";
        }
    ?>
</div>
<!-- jQuery -->
<script type="text/javascript">

    $("#txtCategory").on("change",function(){
        var catId = $(this).val();
        if(catId){
            $.ajax({
                type:'POST',
                url:'Model/GetSubCat.php',
                data: {cat_id : catId },
                success:function(html){
                	//alert(html);
                    $('#txtSubCategory').html(html);
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#txtSubCategory').html('<option value="">Select country first</option>');
            //$('#city').html('<option value="">Select state first</option>'); 
        }
    });
</script>
   
<script type="text/javascript">

    $("#txtSubCategory").on("change",function(){
        var chId = $(this).val();

        if(chId){
            $.ajax({
                type:'POST',
                url:'Model/GetSubCat.php',
                data: {cat_id : chId },
                success:function(html){
                	//alert(html);
                    $('#txtChildCategory').html(html);
                    //$('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#txtChildCategory').html('<option value="">Select child</option>');
            //$('#city').html('<option value="">Select state first</option>'); 
        }
    });
</script>
<?php
	include 'footer.php';
?>
