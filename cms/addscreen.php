<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="productlist.php">Edit Product</a></li>
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
			<th>Sub Category</th>
			<th>Quantity Per Unit</th>
			<th>UnitPrice</th>
			<th>Discontinued</th>
			<th>Action</th>
			<th>Action</th>
			<th>Action</th>
		  </tr>
		</thead>
		<tbody>
		<?php
	        $prquery = mysqli_query($con, "SELECT ProductID, ProductName, b.product, QuantityPerUnit, UnitPrice, Discontinued FROM tblproducts a JOIN tbl_menu b ON 
	        a.CategoryID = b.id ORDER BY ProductID DESC");
		while ($prrow = mysqli_fetch_assoc($prquery)) {
			
		?>
		  <tr>
			<td><?php echo $prrow["ProductName"] ?></td>
			<td><?php echo $prrow["CategoryName"] ?></td>
			<td><?php echo $prrow["sub"] ?></td>
			<td><?php echo $prrow["QuantityPerUnit"] ?></td>
			<td><?php echo $prrow["UnitPrice"] ?></td>
			<td><?php echo $prrow["Discontinued"] ?></td>
			<td><a class="btn btn-info" href='productscreen.php?id=<?php echo $prrow["ProductID"] ?>'>Add Screen</a></td>
			<td><a class="btn btn-info" href='adddescription.php?id=<?php echo $prrow["ProductID"] ?>'>Description</a></td>
			<td><a class="btn btn-info" href='productthumb.php?id=<?php echo $prrow["ProductID"] ?>'>Add Thumb</a></td>
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