<?php
	include 'Model/connect_db.php';
	include 'head.php';
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="newbrand.php">New Brand</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-2 control-label">Brand Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtCategory">
						<option value="0">Select Brand Category</option>
						<?php 
							$BrandCat = mysqli_query($con, "SELECT id, CategoryName FROM brandcategory");
							while ($mainrow = mysqli_fetch_assoc($BrandCat)) {
						?>
								<option value='<?php echo $mainrow["id"] ?>'><?php echo $mainrow["CategoryName"] ?></option>
							
						 <?php
						}
						?>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label">Brand Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtBrandName" placeholder="Brand Name">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">Logo</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
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
                $Category = $_POST["txtCategory"];
                $BrandName = $_POST["txtBrandName"];
                $imgurl = "brands/". basename($_FILES["lstImage"]["name"]);
                
                $restult = mysqli_query($con, "INSERT INTO brand(brandname, brandcategory, logo) VALUES ('$BrandName','$Category','$imgurl')") or die(mysqli_error($con));
                if($restult>0)
                {
                     echo "New Brand Successfully Created";

                     $target_dir = "brands/";
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
                     echo "Not Successful";
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
    
<?php
	include 'footer.php';
?>
