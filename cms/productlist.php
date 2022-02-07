<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="productlist.php">Product List</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<!-- tables -->
	<div class="w3l-table-info">
	  <h2>Product List</h2>
	    <table id="table">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Category Name</th>
			<th>Merchant Code</th>
			<th>Sub Category</th>
			<th>Quantity Per Unit</th>
			<th>UnitPrice</th>
			<th>Discontinued</th>
		  </tr>
		</thead>
		<tbody>
		<?php
			$prquery = mysqli_query($con, "SELECT ProductID, ProductName, merchantpcode, b.product CategoryName, b.product sub, QuantityPerUnit, UnitPrice, Discontinued 
			FROM tblproducts a JOIN tbl_menu b ON a.CategoryID = b.id ORDER BY ProductID DESC");
			while ($prrow = mysqli_fetch_assoc($prquery)) {
			
		?>
		  <tr>
			<td><?php echo $prrow["ProductName"] ?></td>
			<td><?php echo $prrow["CategoryName"] ?></td>
			<td><?php echo $prrow["merchantpcode"] ?></td>
			<td><?php echo $prrow["sub"] ?></td>
			<td><?php echo $prrow["QuantityPerUnit"] ?></td>
			<td><?php echo $prrow["UnitPrice"] ?></td>
			<td><?php echo $prrow["Discontinued"] ?></td>
		  </tr>
	    <?php
			}
		?>
		  
		</tbody>
	  </table>
	</div>
	  
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