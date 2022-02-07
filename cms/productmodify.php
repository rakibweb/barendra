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
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="newproduct.php">Modify Product</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
	<?php
		$detquery = mysqli_query($con, "SELECT ProductID, ProductName, merchantpcode, QuantityPerUnit, UnitPrice, Discontinued, ReorderLevel FROM tblproducts WHERE ProductID='$id'");
		while ($detrow = mysqli_fetch_assoc($detquery)) {
	?>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtProductName" value='<?php echo $detrow["ProductName"] ?>'>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">Merchant Code</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtMerchantCode" value='<?php echo $detrow["merchantpcode"] ?>'>
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
					<input type="text" class="form-control1" name="txtQuantityPerUnit" value='<?php echo $detrow["QuantityPerUnit"] ?>'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Unit Price</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtUnitPrice" value='<?php echo $detrow["UnitPrice"] ?>'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Discontinued</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtDiscontinued" value='<?php echo $detrow["Discontinued"] ?>'>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Reorder Level</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtReorderLevel" value='<?php echo $detrow["ReorderLevel"] ?>'>
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
					
					<input type="submit" name="submit" class="btn btn-primary" value="Update Product">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $ProductName = $_POST["txtProductName"];
                $MerchantCode = $_POST["txtMerchantCode"];
                $QuantityPerUnit = $_POST["txtQuantityPerUnit"];
                $UnitPrice = $_POST["txtUnitPrice"];
                $Discontinued = $_POST["txtDiscontinued"];
                $ReorderLevel = $_POST["txtReorderLevel"];
                $UpdatedDate = date("Y-m-d");
                //$CreatedBy = $_SESSION['empid'];


                //mysql_query("INSERT INTO blog (UserId, PostName, Post, ParentId, date) VALUES ('$userid', '$postName', '$post', '$ParentId', '$date');");
                $action = mysqli_query($con, "UPDATE tblproducts SET ProductName='$ProductName', merchantpcode='$MerchantCode', QuantityPerUnit='$QuantityPerUnit', UnitPrice='$UnitPrice', LastUpdate='$UpdatedDate', ReorderLevel='$ReorderLevel', Discontinued='$Discontinued' WHERE ProductID='$id'");
                if($action == 1)
                {
                    echo "Posted Successfully on ".$UpdatedDate;
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
