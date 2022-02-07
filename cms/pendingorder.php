<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="order.php">Order</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>

	<form role="form" action="#" method="post" class="form-horizontal">
		<!--<div class="form-group">
			<label class="col-md-2 control-label">Order Date</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" id="datepicker" class="form-control1 datepicker" name="txtDate" placeholder="2017-09-01">
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
		</div>-->

		<!-- tables -->
		<div class="w3l-table-info ">
		  <h2>Product List</h2>
		    <table id="table" ng-controller="OrderController">
			<thead>
			  <tr>
		        <th>Order Date</th>
		        <th>Customer Name</th>
		        <th>Address</th>
		        <th>District</th>
		        <th>Mobile</th>
                <th>Code</th>
	            <th>Amount</th>
				<th>Payment</th>
				<th>Instruction</th>
				<th>Action</th>
				<th>X</th>
			  </tr>
			</thead>
			<tbody>
			<?php
	            //if(isset($_POST["submit"]))
	            //{
	                //$Date = $_POST["txtDate"];
	                //if(isset($Date) && !empty($Date)) 
    				//{
	                $orderquery = mysqli_query($con, "SELECT OrderId, ordercode, CustomerId, u.ShippingAddress, PaymentMethod, AlternativeNumber, SpecialInstruction, Amount, date, 
	                Status,u.Name, u.Phone, u.District, u.Gender FROM tblorder o INNER JOIN user u ON o.CustomerId=u.Id WHERE Status='Pending' order by OrderId DESC");
			while ($ordrow = mysqli_fetch_assoc($orderquery)) {
	            
        	?>
			  <tr>
		        <td><?php echo date('d-m-Y', strtotime($ordrow["date"])) ?></td>
		        <td><?php echo $ordrow["Name"] ?></td>
		        <td><?php echo $ordrow["ShippingAddress"] . "-" . $ordrow["Zip"] ?></td>
		        <td><?php echo $ordrow["District"] ?></td>
		        <td><?php echo $ordrow["Phone"] ." ". $ordrow["AlternativeNumber"]; ?></td>
			    <td><?php echo $ordrow["ordercode"] ?></td>
				<td><?php echo $ordrow["Amount"] ?></td>
				<td><?php echo $ordrow["PaymentMethod"] ?></td>
				<td><?php echo $ordrow["SpecialInstruction"] ?></td>
				<td><a href='orderdetails.php?id=<?php echo $ordrow["ordercode"]; ?>' class="badge badge-primary">Details</a></td>
				<td><a href="#" ng-click="cancelorder(<?php echo $ordrow["ordercode"] ?>)">Cancel</a></td>
			  </tr>
		    <?php
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
?>
<?php
	include 'footer.php';
?>