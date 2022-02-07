<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="reportcomission.php">Order</a></li>
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
		        <th>Order#</th>
		        <th>Product</th>
		        <th>Price</th>
		        <th>Quantity</th>
                <th>Amount</th>
	            <th>Commission</th>
				<th>Profit</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$month = date('m');
	        $fromdate = "2019-".$month."-01";
	        $todate = "2019-".$month."-30";
            $reportquery = mysqli_query($con, "SELECT a.id, a.ordercode, a.productcode, b.ProductName, a.sellingprice, a.quantity, a.amount, a.commission, a.profit, a.date FROM 
            tbl_transaction a INNER JOIN tblproducts b ON a.productcode=b.ProductID WHERE date BETWEEN '$fromdate' AND '$todate' order by id");
			while ($ordrow = mysqli_fetch_assoc($reportquery)) {
	            
        	?>
			  <tr>
		        <td><?php echo date('d-m-Y', strtotime($ordrow["date"])) ?></td>
		        <td><?php echo $ordrow["ordercode"] ?></td>
		        <td><?php echo $ordrow["ProductName"] ?></td>
		        <td><?php echo $ordrow["sellingprice"] ?></td>
		        <td><?php echo $ordrow["quantity"]; ?></td>
			    <td><?php echo $ordrow["amount"] ?></td>
				<td><?php echo $ordrow["commission"] ?></td>
				<td><?php echo $ordrow["profit"] ?></td>
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