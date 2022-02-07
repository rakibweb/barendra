<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="publish.php">Publish Product</a></li>
</ol>

<div class="panel-body" ng-controller="ProductController" id="cntPub">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="col-md-2 control-label">Section Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtSection" ng-model="txtSec">
						<option value="0">Select Section</option>
						<?php 
							$sup = mysqli_query($con, "SELECT Id, Sectionname FROM portalsections");
							while ($suprow = mysqli_fetch_assoc($sup)) {
						?>
								<option value='<?php echo $suprow["Id"] ?>'><?php echo $suprow["Sectionname"] ?></option>
							
						 <?php
						}
						?>
					</select>
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
			<label class="col-md-2 control-label">Child Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<select class="form-control1" name="txtChildCategory" id="txtChildCategory">
						<option value="0">Select Child Category</option>
					</select>
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

    <br>
{{message}}

     <table>
	    <tr>
	    	<th>Product Image</th>
	    	<th>Product Name</th>
	    	<th>Action</th>
	    </tr>
	    <tr ng-repeat="pd in products">
	    	<td><img src="http://www.shop.barendro.com/cms/{{pd.Imageurl}}" width="100"></td>
	    	<td>{{pd.ProductName}}</td>
	    	<td><a href="#" ng-click="publish(pd.ProductID, txtSec)" class="btn btn-primary">Publish</td>
	    </tr>
    </table>
</div>
<!-- jQuery -->
<script type="text/javascript">

    $("#txtCategory").on("change",function(){
        var catId = $(this).val();
        var subCatId = "0";
        if(catId){
            $.ajax({
                type:'POST',
                url:'Model/GetSubCat.php',
                data: {cat_id : catId },
                success:function(html){
                	if(html=='<option value="">Sub Category not available</option>')
                	{
                		$('#txtChildCategory').prop("disabled", true);
            			angular.element(document.getElementById('cntPub')).scope().myfunction(catId, subCatId);
                	}
                	else
                	{
                		$('#txtChildCategory').html(html);
                		//$('#txtSubCategory').prop("disabled", false);
                	}
                }
            }); 
        }else{
            $('#txtSubCategory').html('<option value="">Select category first</option>');
        }
    });
</script>

<script type="text/javascript">
$("#txtChildCategory").on("change",function(){
    var subCatId = $(this).val();
    var catId = $("#txtCategory").val();
	angular.element(document.getElementById('cntPub')).scope().myfunction(catId, subCatId);
});
</script>
<?php
	include 'footer.php';
?>

