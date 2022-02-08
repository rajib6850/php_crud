<?php 

if(isset($_POST['save'])){

	// Database File Require 
	require_once "config.php";

	// Get Form Data
	$name = $_POST['sname'];
	$address = $_POST['saddress'];
	$batch = $_POST['batch'];
	$phone = $_POST['sphone'];

	$sql = "INSERT INTO students VALUES (NULL, '$name', '$address', '$batch', '$phone')";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	header('location: index.php');

}