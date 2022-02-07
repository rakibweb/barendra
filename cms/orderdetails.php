<?php
    include 'Model/connect_db.php';
    include 'head.php';
    $Ordercode="";
?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i><a href="orderdetails.php">Order Details</a></li>
</ol>

<div class="panel-body">
<?php
    if(isset($_SESSION['empid']) && !empty($_SESSION['empid'])) 
    {
?>
<h2>Order Details</h2>
    <form role="form" action="#" method="post" class="form-horizontal">
    <!-- tables -->
        <div class="w3l-table-info ">
            <table id="table">
            <thead>
              <tr>
                <th>Order Code</th>
                <th>Product Name</th>
                <th>Size</th>
                <th>M. Code</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Commission</th>
                <th>Merchant</th>
                <th>Address</th>
                <th>Phone</th>
                
              </tr>
            </thead>
            <tbody>
        <?php
            $id = $_GET["id"];
            if(strlen($Ordercode)>7)
            {
                echo "<meta http-equiv='refresh' content='0;url=http://shop.barendro.com'>";
            }
            $orderquery = mysqli_query($con, "SELECT ID, o.OrderID, r.ordercode, o.ProductID, p.ProductName, o.size, p.merchantpcode, o.Merchant, o.UnitPrice, Quantity, 
            s.CompanyName, s.Address, s.Phone, p.Commission FROM tblorderdetails o INNER JOIN tblproducts p ON o.ProductID=p.ProductID INNER JOIN tblsuppliers s ON 
            o.Merchant = s.SupplierID INNER JOIN tblorder r ON o.OrderID=r.ordercode WHERE o.OrderID='$id'");

            while($rows = mysqli_fetch_assoc($orderquery)) {
            $Ordercode = $rows["ordercode"];
        ?>
            <tr>
                <td><?php echo $Ordercode ?></td>
                <td><?php echo $rows["ProductName"]; ?></td>
                <td><?php echo $rows["size"]; ?></td>
                <td><?php echo $rows["merchantpcode"]; ?></td>
                <td><?php echo $rows["UnitPrice"]; ?></td>
                <td><?php echo $rows["Quantity"]; ?></td>
                <td><?php echo $rows["Commission"]; ?></td>
                <td><a href='supplierlist.php?id=<?php echo $rows["Merchant"]; ?>'><?php echo $rows["CompanyName"] ?></a></td>
                <td><?php echo $rows["Address"]; ?></td>
                <td><?php echo $rows["Phone"]; ?></td>
              </tr>
            <?php
                }
            ?>
              
            </tbody>
          </table>
                 
        <div class="form-group">
            <label class="col-md-9 control-label">Select Shipper</label>
            <div class="col-md-3">
                <div class="input-group input-icon right">
                    <select class="form-control" name="ddlShipper">
                <?php
                $shipperquery = mysqli_query($con, "SELECT ShipperID, CompanyName, Phone FROM shippers");
    
                while($row = mysqli_fetch_assoc($shipperquery)) {
                ?>
                        <option value='<?php echo  $row["ShipperID"] ?>'><?php echo  $row["CompanyName"] ?></option>
                <?php
                }
                ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-9 control-label"></label>
            <div class="col-md-3">
                <div class="input-group input-icon right">
                    <input type="submit" name="submit" class="btn btn-primary" value="Ship Order">
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST["submit"]))
            {
                $Shipper = $_POST["ddlShipper"];
                $result = mysqli_query($con, "UPDATE tblorder SET Status='Shipped', Shipper='$Shipper' WHERE OrderId='$id'");

                if($result>0)
                {
                    echo "Order No. $id is succefully delivered.";
                    ?>
                        <script>
                            window.location.href="pendingorder.php";
                        </script>
                    <?php
                }
                else
                {
                    echo "Order No. $id delivery failed. Please contact technical support.";
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
            header("Location: index.php");
            echo "<a href='index.php'>Login</a>";
        }
    ?>
</div>
    
<?php
    include 'footer.php';
?>
