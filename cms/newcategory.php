<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="newcategory.php">New Category</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
		
		<div class="form-group">
			<label class="col-md-2 control-label">Category Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtCategoryName" placeholder="Category Name">
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label">Description</label>
			<div class="col-md-8">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<textarea class="form-control1" name="txtDescription" placeholder="Description" cols="5" ></textarea> 
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
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $CategoryName = $_POST["txtCategoryName"];
                $Description = $_POST["txtDescription"];
                
                $result = mysqli_query($con, "INSERT INTO categories(CategoryName, Description, Parent) VALUES ('$CategoryName','$Description','0')");
                if($result=="1")
                {
                    echo "New Category Successfully Created";
                }
                else
                {
                    echo "New Category Failed.";
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

    
<?php
	include 'footer.php';
?>
