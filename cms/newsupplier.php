<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="newsupplier.php">New Supplier</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-md-2 control-label">Company Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtCompanyName" placeholder="Company Name">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Contact Person Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtContactName" placeholder="Contact Name">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Designation</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtContactTitle" placeholder="Designation">
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
			<label class="col-md-2 control-label">Address</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtAddress" placeholder="Address">
				</div>
			</div>
		</div>
		
		<!--<div class="form-group">
			<label class="col-md-2 control-label">Sub Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtSubCategory" id="txtSubCategory">
						<option value="0">Select Sub Category</option>
						<?php 
							//$subcat = mysql_query("SELECT CategoryID, CategoryName, Description, Picture FROM categories");
							//while ($scatrow = mysql_fetch_assoc($subcat)) {
						?>
							
							
						 <?php
						//}
						?>
					</select>
				</div>
			</div>
		</div>-->
		<div class="form-group">
			<label class="col-md-2 control-label">City</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtCity" placeholder="City">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Region</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtRegion" placeholder="Region">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Postal Code</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtPostalCode" placeholder="Postal Code">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Country</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtCountry" placeholder="Country">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Phone</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtPhone" placeholder="Phone">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Email</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="email" class="form-control1" name="txtEmail" placeholder="Email">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">HomePage</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtHomePage" placeholder="HomePage ">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Bank Name</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtBankName" placeholder="Bank Name">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Account Number</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtAccountNumber" placeholder="Account Number">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Bank Branch</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtBankBranch" placeholder="Bank Branch">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Password</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtPassword" placeholder="Password">
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
                $CompanyName = $_POST["txtCompanyName"];
                $ContactName = $_POST["txtContactName"];
                $ContactTitle = $_POST["txtContactTitle"];
                $CategoryId =  $_POST["txtCategory"];
                $Address = $_POST["txtAddress"];
                $City = $_POST["txtCity"];
                $Region = $_POST["txtRegion"];
                $PostalCode = $_POST["txtPostalCode"];
                $Country = $_POST["txtCountry"];
                $Phone = $_POST["txtPhone"];
                $Email = $_POST["txtEmail"];
                $HomePage = $_POST["txtHomePage"];
                $BankName = $_POST["txtBankName"];
                $AccountNumber = $_POST["txtAccountNumber"];
                $BankBranch = $_POST["txtBankBranch"];
                $Password = $_POST["txtPassword"];
                $CreatedDate = date("Y-m-d");
                //$CreatedBy = $_SESSION['empid'];

                 mysqli_query($con, "INSERT INTO tblsuppliers(CompanyName, ContactName, ContactTitle, CategoryId, Address, City, Region, PostalCode, Country, Phone, Email, HomePage, BankName, AccountNumber, BankBranch, Password) VALUES ('$CompanyName','$ContactName','$ContactTitle','$CategoryId','$Address','$City','$Region','$PostalCode','$Country','$Phone','$Email','$HomePage', '$BankName', '$AccountNumber', '$BankBranch', '$Password')");

                echo "Posted Successfully on ".$CreatedDate;
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
    
<?php
	include 'footer.php';
?>
