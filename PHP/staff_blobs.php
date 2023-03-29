<?php
include 'dbConfig.php';
    $var = mysqli_connect($host,$username,$password,$database);
    mysqli_select_db($var, "Veterinary") or die(mysqli_error());
	$image_id = $_GET['id'];
    $sql = "Select picture from staff where id=$image_id" ;
    $resultset = mysqli_query($var, "$sql") or die("Invalid query: " . mysqli_error());
	$row = mysqli_fetch_array($resultset);
	header('Content-type: image/jpeg');
	echo $row[0];
   	mysqli_close($var);
?>
