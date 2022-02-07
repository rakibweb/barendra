<?php
	include 'Model/connect_db.php';
	include 'head.php';
	$id = $_GET["id"];
        if(strlen($id)>7)
        {
            echo "<meta http-equiv='refresh' content='0;url=https://bangaliyana.com.bd'>";
        }
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="productthumb.php">Product Thumbnail</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
	<?php
		$detquery = mysqli_query($con, "SELECT ProductID, ProductName, QuantityPerUnit, UnitPrice, Discontinued, ReorderLevel FROM tblproducts WHERE ProductID='$id'");
		while ($detrow = mysqli_fetch_assoc($detquery)) {
	?>
		<div class="form-group">
			<label class="col-md-2 control-label">Product ID</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtProductId" value='<?php echo $detrow["ProductID"] ?>' readonly="">
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
		
		<?php
		}
		?>
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
                $ProductId = $_POST["txtProductId"];
                
                $UpdatedDate = date("Y-m-d");
                $CreatedBy = $_SESSION['empid'];
                $imgurl = "images/productscreen_thumbnail/". $ProductId . basename($_FILES["lstImage"]["name"]);

                //mysql_query("INSERT INTO blog (UserId, PostName, Post, ParentId, date) VALUES ('$userid', '$postName', '$post', '$ParentId', '$date');");
                $action = mysqli_query($con, "INSERT INTO tblproductthumb(productid, imageurl) VALUES ('$ProductId','$imgurl')");
                if($action == 1)
                {
                    $target_dir = "images/productscreen_thumbnail/";
        			$target_file = $target_dir . $ProductId . basename($_FILES["lstImage"]["name"]);
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
        					echo "The file ". $ProductId . basename( $_FILES["lstImage"]["name"]). " has been uploaded.";
        				}
        				else {
        					echo "Sorry, there was an error uploading your file.";
        				}
        			}
                    //echo "Posted Successfully on ".$UpdatedDate;
                }
                else
                {
                    echo "Posting failed";
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
                	alert(html);
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
    
<?php
	include 'footer.php';
?>
