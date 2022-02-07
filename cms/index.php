<?php
	include_once 'Model/connect_db.php';
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sign In</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bangaliyana" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Sign In</h2>
		<form action="#" method="post">
			<div class="username">
				<span class="username">Username:</span>
				<input type="text" name="txtName" class="name" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="txtPassword" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">Remember me<br>
				<a href="#">Forgot Password</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" class="login" name="submit" value="Sign In">
			</div>
			<?php
				if(isset($_POST["submit"]))
            	                {
					$user = $_POST["txtName"];
					$password = md5($_POST["txtPassword"]);
                    echo $password;
					$sql = mysqli_query($con, "SELECT EmployeeID, LastName, FirstName, UserName, Password, Title, TitleOfCourtesy, BirthDate, HireDate, Address, City, Region, 
					PostalCode, Country, HomePhone, Extension, Photo, Notes, ReportsTo FROM employees WHERE UserName='$user' and Password='$password'");
					if(mysqli_num_rows($sql)>0) {
						$row = mysqli_fetch_assoc($sql);
						
				        $_SESSION['empid'] = $row['EmployeeID'];
				        $_SESSION['username'] = $row['UserName'];
				        $_SESSION['name'] = $row['LastName'];
                        
				        header("Location: dashboard.php");
				         echo '<script>window.location.href = "dashboard.php";</script>';
					}
					else{
						$error_msg = 'Sorry, you must enter a valid username and password to log in. <a href="Signup.php">Please sign up!</a>';
						echo $error_msg;
					}
				}
			?>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="index.php">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy; 2018 Bangaliana . All Rights Reserved | Design by <a href="http://idslbd.com">IDSL</a></p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>