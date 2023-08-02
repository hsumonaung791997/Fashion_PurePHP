<?php 
	
	$brand_id=$_POST['brand_id'];
	$brand_name=$_POST['brand_name'];
	include('database.php');
	$sql="update brands set name='$brand_name' where id=$brand_id";
	$conn->query($sql);
	header("location:index.php?status=3");


?>