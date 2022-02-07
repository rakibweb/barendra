<?php
    include "head.php";
   
    include "innermenu.php";
    $page = $_GET["page"];
    
    if($_SESSION["userid"]!=""){
        if($page=="checkout")
        {
            echo "<meta http-equiv='refresh' content='0;url=checkout.php'>";
        }
        else if($page=="details")
        {
            echo "<meta http-equiv='refresh' content='0;url=details.php'>";
        }
        else{
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
        }
    }
    
?>
			</div>
		</div>
	</header>
	<div class="main-content shop-page login-page">
		<div class="container">
			<div class="breadcrumbs">
				<a href="index.php">Home</a> \ <span class="current"> Login of create an account</span>
			</div>
			<div class="login-register-form content-form row">
			    
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="login-form">
						<h4 class="main-title">Login</h4>
						<span class="label-text">Email Address</span>
						<input type="text" id="txtEmail" class="input-info">
						<span class="label-text">Password</span>
						<input type="password" id="txtPassword" class="input-info">
						<div class="check-box">
							<input type="checkbox" class="login-check" id="login-check"> <label class="text-label" for="login-check">Remember me</label>
							<a href="#" data-toggle="modal" data-target="#forgotPasswordModal" class="forgot">Forgot your password ?</a>
						</div>
						<div class="group-button">
							<button name="btnLogin" id="btnLogin" class="button submit">Login</button>
						</div>
					</div>
				</div>
    				
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="register-form">
					    <form action="#" method="post">
    						<h4 class="main-title">Create an Account</h4>
    						<div class="row">
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-12">
    								<span class="label-text">Full Name <span>*</span></span>
    								<input type="text" name="txtFullname" class="input-info" required>
    							</div>
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">Gender</span>
    								<select class="input-info" name="ddlGender">
                                        <option value='Male'>Male</option>
                                        <option value='Female'>Female</option>
                                        <option value='Other'>Other</option>
                                    </select>
    							</div>
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">Email</span>
    								<input type="text" name="txtEmail" class="input-info" required>	
    							</div>
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">Phone</span>
    								<input type="text" class="input-info" name="txtPhone">
    							</div>
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">District <span>*</span></span>
    								<!--<select class="input-info" name="ddlArea" value="<?php echo !empty($postData['area'])?$postData['area']:''; ?>" required>-->
    								<select class="input-info" name="ddlArea" required>
                                        <?php 
                                            $district = mysqli_query($con, "SELECT id, DistrictName FROM tblDistrict ORDER BY DistrictName"); 
                                            while($ds = mysqli_fetch_assoc($district)){
                                        ?>
                                        <option value='<? echo $ds["DistrictName"] ?>'><? echo $ds["DistrictName"] ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
    							</div>
    							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    							    <span class="label-text">Shipping Address<span>*</span></span>
    						        <input type="text" name="txtShippingAddress" class="input-info" required>
							    </div>
    						</div>
    						
    						<h5 class="title">Login Information</h5>
    						<div class="row">
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">Password *</span>
    								<input type="password" name="txtPassword" class="input-info">
    							</div>
    							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
    								<span class="label-text">Confirm Password *</span>
    								<input type="password" name="txtRePassword" class="input-info">	
    							</div>
    						</div>
						    <div class="group-button"><button type="submit" name="btnRegister" class="button submit">REGISTER</button></div>
						    <?php
						    if(isset($_POST["btnRegister"])){
						        $Fullname = $_POST["txtFullname"];
						        $Gender = $_POST["ddlGender"];
						        $Email = $_POST["txtEmail"];
						        $Phone = $_POST["txtPhone"];
						        $Area = $_POST["ddlArea"];
						        $ShippingAddress = $_POST["txtShippingAddress"];
						        $Password = $_POST["txtPassword"];
						        $RePassword = $_POST["txtRePassword"];
						        if($Password == $RePassword)
						        {
						            $isexist = mysqli_query($con, "SELECT Id, Name, Gender, Email, Phone, UserName FROM user WHERE Email='$Email'");
						            if(mysqli_num_rows($isexist) > 0){
						                echo "<div class='well alert alert-danger'>This email is already exist.</div>";
						            }
						            else
						            {
    						            $register = mysqli_query($con, "INSERT INTO user(Name, Gender, Email, Phone, UserName, Password, District, ShippingAddress) VALUES 
    						            ('$Fullname','$Gender','$Email','$Phone','$Email','$Password','$Area','$ShippingAddress')");
    						            if($register > 0){
    						                $user = mysqli_query($con, "SELECT Id, Name, Gender, Email, Phone, UserName, Password, District, ShippingAddress, Expire, timestamp FROM 
    						                user ORDER BY Id DESC LIMIT 1");
    						                while($rg=mysqli_fetch_assoc($user)){
        					                    $_SESSION["userid"] = $rg["Id"];
                                                $_SESSION["UserName"] = $rg["Name"];
                                                $_SESSION["Gender"] = $rg["Gender"];
                                                $_SESSION["Email"] = $rg["Email"];
                                                $_SESSION["Phone"] = $rg["Phone"];
    						                }
    						            }
						            }
						        }
						        else{
						            echo "<div class='well alert alert-danger'>Password didn't match.</div>";
						        }
						    }
						    ?>
					    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
    <div id="forgotPasswordModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-sm">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Forget Password</h4>
          </div>
          <div class="modal-body">
            <input type="email" class="form-control" id="forgotEmail" placeholder="Enter your email">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary center-block" id="btnReset">Send Password Reset Instruction</button>
            <p id="message" style="alert alert-success"></p>
          </div>
        </div>
    
      </div>
    </div>
	<?php
	    include "footer.php";
    ?>