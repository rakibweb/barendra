<?php
    include "head.php";
   
    include "innermenu.php";
    
    if(isset($_GET["code"]) && isset($_GET["m"])){
        $code = base64_decode($_GET["code"]);
        $email = base64_decode($_GET["m"]);
        $query = mysqli_query($con, "SELECT email, Code, Expire FROM userverify WHERE email='$email' AND Code='$code' AND Expire='N'");
        $count = mysqli_num_rows($query);
        if($count>0){
            //valid user
        }
        else{
            echo '<script>window.location.href="login.php"</script>';
        }
    }
    else{
        echo '<script>window.location.href="login.php"</script>';
    }
    
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page login-page">
		<div class="container">
			<div class="breadcrumbs">
				<a href="login.php">Login</a> \ <span class="current"> Password reset</span>
			</div>
			<div class="login-register-form content-form row">
			    <form action="#" method="post">
    				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    					<div class="login-form">
    						<h4 class="main-title">Login</h4>
    						<span class="label-text">Email Address</span>
    						<input type="text" name="txtEmail" class="input-info" value='<? echo $email ?>' readonly>
    						<span class="label-text">Password</span>
    						<input type="password" name="txtPassword" class="input-info">
    						<span class="label-text">Re-enter Password</span>
    						<input type="password" name="txtRePassword" class="input-info">
    						
    						<div class="group-button">
    							<button name="btnReset" id="btnReset" class="button submit">Reset</button>
    							<a href="login.php" class="btn btn-primary">Login</a>
    						</div>
    					</div>
    				</div>
    				<?php 
    				if(isset($_POST["btnReset"])){
        				$email = $_POST["txtEmail"];
        				$Password = $_POST["txtPassword"];
        				$RePassword = $_POST["txtRePassword"];
        				if($Password==$RePassword){
        				    $query = mysqli_query($con, "UPDATE user SET Password='$Password' WHERE Email='$email'");
        				    if($query > 0){
        				        mysqli_query($con, "UPDATE userverify SET Expire='Y' WHERE Email='$email'");
        				        echo "<div class='well alert alert-success'>Password updated successfully. Please login</div>";
        				    }
        				}
        				else{
        				    echo "Passowrd didn't match.";
        				}
    				}
    				?>
				</form>
			</div>
		</div>
	</div>
	<?php
	    include "footer.php";
    ?>