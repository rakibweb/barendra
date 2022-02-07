<?php

$host="localhost"; // Host name
$username="barendro_user"; // Mysql username
$password="Barendro@123"; // Mysql password
$db_name="barendro_shop"; // Database name


// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password")or die("cannot connect");

mysqli_select_db($con,"$db_name");

?>