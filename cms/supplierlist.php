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
		<!-- tables -->
		<div class="w3l-table-info ">
		  <h2>Supplier List</h2>
		    <table id="table" ng-controller="OrderController">
			<thead>
			  <tr>
				<th>Company</th>
				<th>Contact Name</th>
				<th>Order Date</th>
				<th>Address</th>
				<th>City</th>
				<th>Phone</th>
				<th>Email</th>
				<th>Bank Name</th>
				<th>A/C Number</th>
				<th>Bank Branch</th>
				<th>Password</th>
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php
	            //if(isset($_POST["submit"]))
	            //{
	                //$Date = $_POST["txtDate"];
	                //if(isset($Date) && !empty($Date)) 
    				//{
	                $orderquery = mysqli_query($con, "SELECT `SupplierID`, `CompanyName`, `ContactName`, `ContactTitle`, `CategoryId`, `Address`, `City`, `Region`, 
	                `PostalCode`, `Country`, `Phone`, `Email`, `HomePage`, `BankName`, `AccountNumber`, `BankBranch`, `Password` FROM `tblsuppliers` ORDER BY CompanyName");
					while ($ordrow = mysqli_fetch_assoc($orderquery)) {
	            
        	?>
			  <tr>
				<td><?php echo $ordrow["CompanyName"] ?></td>
				<td><?php echo $ordrow["ContactName"] ?></td>
				<td><?php echo $ordrow["Address"] ?></td>
				<td><?php echo $ordrow["City"] ?></td>
				<td><?php echo $ordrow["Phone"] ?></td>
				<td><?php echo $ordrow["Email"] ?></td>
				<td><?php echo $ordrow["BankName"] ?></td>
				<td><?php echo $ordrow["AccountNumber"] ?></td>
				<td><?php echo $ordrow["BankBranch"] ?></td>
				<td><?php echo $ordrow["Country"] ?></td>
				<td><?php echo $ordrow["Password"] ?></td>
				<td><a href='editsupplier.php?id=<?php echo $ordrow["SupplierID"]; ?>'>Edit</a></td>
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