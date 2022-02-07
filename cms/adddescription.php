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
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="adddescription.php">Product Description</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
	<?php
		$detquery = mysqli_query($con, "SELECT ProductID, ProductName, description, Overview, additionalInfo FROM tblproducts WHERE ProductID='$id'");
		while ($detrow = mysqli_fetch_assoc($detquery)) {
	?>
	    <div class="form-group">
			<label class="col-md-2 control-label">Product Overview</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<textarea cols="60" rows="5" name="txtOverview"><? echo $detrow["Overview"] ?></textarea>
					
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Description</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<textarea cols="60" rows="5" name="txtProductDesc"><? echo $detrow["description"] ?></textarea>
					
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Additional Information</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<textarea cols="60" rows="5" name="txtAdditionalInfo"><? echo $detrow["additionalInfo"] ?></textarea>
					
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
					<input type="submit" name="submit" class="btn btn-primary" value="Add Description">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $text = mysqli_real_escape_string($con, $_POST["txtProductDesc"]);
                $ProductDesc = nl2br($text, false);
                $Overview = mysqli_real_escape_string($con, nl2br($_POST["txtOverview"], false));
                $AdditionalInfo = mysqli_real_escape_string($con, nl2br($_POST["txtAdditionalInfo"], false));
                $UpdatedDate = date("Y-m-d");
                //$CreatedBy = $_SESSION['empid'];

                $action = mysqli_query($con, "UPDATE tblproducts SET description='$ProductDesc', Overview='$Overview', additionalInfo='$AdditionalInfo' WHERE ProductID='$id'");
                if($action == 1)
                {
                    echo "Posted Successfully on ".$UpdatedDate . " Product id: ". $id;
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

<?php
	include 'footer.php';
?>
