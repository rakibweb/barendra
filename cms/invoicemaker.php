<?php
	include 'Model/connect_db.php';
	include 'head.php';
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="invoicemaker.php">Invoice Generator</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="invoice.php" method="post" class="form-horizontal" enctype="multipart/form-data" target="_blank">
		<div class="form-group">
			<label class="col-md-2 control-label">Order Code</label>
			<div class="col-md-5">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtOrderCOde" placeholder="Order Code" required>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Order Code</label>
			<div class="col-md-5">
				<div class="input-group">	
					<select class="form-control" name="txtShipping">
					    <option value="0">Free Shipping</option>
					    <option value="25">25 Tk.</option>
					    <option value="45">45 Tk.</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<div class="input-group input-icon right">
					<input type="submit" name="submit" class="btn btn-primary" value="Generate Invoice">
				</div>
			</div>
		</div>

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
