<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="processedorder.php">Processed Order</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>

	<form role="form" action="#" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-md-2 control-label">Order No.</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtOrder" placeholder="" required="">
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<div class="input-group input-icon right">
					<input type="submit" name="submit" class="btn btn-primary" value="Find Order">
				</div>
			</div>
		</div>

		<!-- tables -->
		<div class="w3l-table-info ">
		    <table id="table" ng-controller="OrderController">
			<thead>
			  <tr>
				<th>Code</th>
				<th>Customer Name</th>
				<th>Order Date</th>
				<th>Address</th>
				<th>Payment</th>
				<th>Mobile</th>
				<th>Instruction</th>
				<th>Amount</th>
				<th>Shipper</th>
				<th>Status</th>
				<th>Action</th>
				<th>X</th>
			  </tr>
			</thead>
			<tbody>
			<?php
	            if(isset($_POST["submit"]))
	            {
	                $Order = $_POST["txtOrder"];
	                if(isset($Order) && !empty($Order))
    				{
	                $orderquery = mysqli_query($con, "SELECT OrderId, ordercode, CustomerId, u.ShippingAddress, PaymentMethod, AlternativeNumber, SpecialInstruction, s.CompanyName, 
	                Amount, date, Status,u.Name, u.Phone, u.District, u.Gender, o.Status FROM tblorder o INNER JOIN user u ON o.CustomerId=u.Id LEFT JOIN shippers s ON 
	                s.ShipperID=o.Shipper WHERE ordercode='$Order' WHERE o.Status='Shipped' order by date");
					while ($ordrow = mysqli_fetch_assoc($orderquery)) {
            	?>
    			  <tr>
    				<td><?php echo $ordrow["ordercode"] ?></td>
    				<td><?php echo $ordrow["Name"] ?></td>
    				<td><?php echo date('d-m-Y', strtotime($ordrow["date"])) ?></td>
    				<td><?php echo $ordrow["ShippingAddress"] . "-" . $ordrow["Zip"] ?></td>
    				<td><?php echo $ordrow["PaymentMethod"] ?></td>
    				<td><?php echo $ordrow["Phone"]." ".$ordrow["AlternativeNumber"] ?></td>
    				<td><?php echo $ordrow["SpecialInstruction"] ?></td>
    				<td><?php echo $ordrow["Amount"] ?></td>
    				<td><?php echo $ordrow["CompanyName"] ?></td>
    				<td><span class="label"><?php echo $ordrow["Status"] ?></span></td>
    				<td><a href='orderdetails.php?id=<?php echo $ordrow["OrderId"]; ?>'>Details</a></td>
    				<td><a href="#" ng-click="returnorder(<?php echo $ordrow["OrderId"] ?>)">Return</a></td>
    			  </tr>
    		        <?php
				        }
    				}
	            }
	            else
				{
				    $orderquery = mysqli_query($con, "SELECT OrderId, ordercode, CustomerId, u.ShippingAddress, PaymentMethod, AlternativeNumber, SpecialInstruction, s.CompanyName,
	                Amount, date, Status,u.Name, u.Phone, u.District, u.Gender, o.Status FROM tblorder o INNER JOIN user u ON o.CustomerId=u.Id LEFT JOIN shippers s
	                ON s.ShipperID=o.Shipper WHERE o.Status='Shipped' order by date DESC");
					while ($ordrow = mysqli_fetch_assoc($orderquery)) {
    				    ?>
    				    <tr>
        				<td><?php echo $ordrow["ordercode"] ?></td>
        				<td><?php echo $ordrow["Name"] ?></td>
        				<td><?php echo date('d-m-Y', strtotime($ordrow["date"])) ?></td>
        				<td><?php echo $ordrow["ShippingAddress"] . "-" . $ordrow["Zip"] ?></td>
        				<td><?php echo $ordrow["PaymentMethod"] ?></td>
        				<td><?php echo $ordrow["Phone"]." ".$ordrow["AlternativeNumber"] ?></td>
        				<td><?php echo $ordrow["SpecialInstruction"] ?></td>
        				<td><?php echo $ordrow["Amount"] ?></td>
        				<td><?php echo $ordrow["CompanyName"] ?></td>
        				<td><span class="badge badge-primary"><?php echo $ordrow["Status"] ?></span></td>
        				<td><a href="#" ng-click="deliverorder('<?php echo $ordrow["ordercode"] ?>')" class="badge badge-success">Deliver</a></td>
        				<td><a href="#" ng-click='returnorder(<?php echo $ordrow["ordercode"] ?>)' class="badge badge-danger">Return</a></td>
        			  </tr>
        			  <?php
    				}
	            }
			    ?>
			  
			</tbody>
		  </table>
		</div>
	  </form>
</div>
<?php
    }
    else
    {
        echo "<a href='index.php'>Login</a>";
    }

	include 'footer.php';
?>