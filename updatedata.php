<?php 

if(isset($_POST['update'])){

	// Database File Require 
	require_once "config.php";

	// Get Form Data
	$sid = $_POST['sid'];
	$name = $_POST['sname'];
	$address = $_POST['saddress'];
	$batch = $_POST['batch'];
	$phone = $_POST['sphone'];

	$sql = "UPDATE students SET  name = '$name', Address =  '$address', class = '$batch', phone = '$phone' WHERE sid ='$sid'";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('location: index.php');


}