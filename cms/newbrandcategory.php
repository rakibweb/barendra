<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i><a href="newbrandcategory.php.">Brand Category</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
		
		<div class="form-group">
			<label class="col-md-2 control-label">Brand Category</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtBrandCategoryName" placeholder="Brand Category Name">
				</div>
			</div>
		</div>
				
		<div class="form-group">
			<label class="col-md-2 control-label"></label>
			<div class="col-md-8">
				<div class="input-group input-icon right">
					
					<input type="submit" name="submit" class="btn btn-primary" value="Save Brand Category">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $BrandCategoryName = $_POST["txtBrandCategoryName"];
                
                mysqli_query($con, "INSERT INTO brandcategory(CategoryName) VALUES ('$BrandCategoryName')");

                echo "New Brand Category Successfully Created";
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
    
<?php
	include 'footer.php';
?>
