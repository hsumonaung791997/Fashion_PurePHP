<?php 
	$brand_id =$_POST['brand_id'];
	include('database.php');
	$sql="delete from brands where id=$brand_id";
	$conn->query($sql);
	header("location:index.php?status=2");

?>