<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="newchildcategory.php">Child Category</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-md-2 control-label">Main Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtCategory" id="txtCategory">
						<option value="0">Select Category</option>
						<?php 
							$MainCat = mysqli_query($con, "SELECT id, product, Parent FROM tbl_menu WHERE Parent='0'");
							while ($mainrow = mysqli_fetch_assoc($MainCat)) {
						?>
								<option value='<?php echo $mainrow["id"] ?>'><?php echo $mainrow["product"] ?></option>
							
						 <?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Child Category Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtChildCategoryName" placeholder="Sub Category Name">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<div class="input-group input-icon right">
					
					<input type="submit" name="submit" class="btn btn-primary" value="Save New Category">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $Category = $_POST["txtCategory"];
                $ChildCategoryName = $_POST["txtChildCategoryName"];
                
                $result = mysqli_query($con, "INSERT INTO tbl_menu(product, parent) VALUES ('$ChildCategoryName','$Category')");
                if($result==1)
                {
                	echo "New Child Category Successfully Created";
                }
                else
                {
                	echo "New Child Category Creation Failed";
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

<script type="text/javascript">
    $("#txtCategory").on("change", function(){
    	
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

<?php
	include 'footer.php';
?>
