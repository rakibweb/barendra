<?php
	include 'Model/connect_db.php';
	include 'head.php';

?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="newsections.php">New Section</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
	<form role="form" action="#" method="post" class="form-horizontal">
		
		<div class="form-group">
			<label class="col-md-2 control-label">Section Name</label>
			<div class="col-md-8">
				<div class="input-group">							
					<span class="input-group-addon">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
					</span>
					<input type="text" class="form-control1" name="txtSectionName" placeholder="Section Name">
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
					<input type="submit" name="submit" class="btn btn-primary" value="Save New Section">
				</div>
			</div>
		</div>

		<?php
            if(isset($_POST["submit"]))
            {
                $SectionName = $_POST["txtSectionName"];
                $Description = $_POST["txtDescription"];
                
                mysqli_query($con, "INSERT INTO portalsections(Sectionname, Description) VALUES ('$SectionName', '$Description')");

                echo "New Section Successfully Created";
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
    <!-- tables -->
    <div class="w3l-table-info ">
      <h2>Portal Section List</h2>
        <table id="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Sectionname</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
    <?php
        $orderquery = mysqli_query($con, "SELECT Id, Sectionname, Description FROM portalsections");

        while($rows = mysqli_fetch_assoc($orderquery)) {

    ?>
    <tr>
            <td><?php echo $rows["Id"]; ?></td>
            <td><?php echo $rows["Sectionname"]; ?></td>
            <td><?php echo $rows["Description"]; ?></td>
          </tr>
        <?php
            }
        ?>
          
        </tbody>
      </table>
  	</div>
</div>

<?php
	include 'footer.php';
?>
