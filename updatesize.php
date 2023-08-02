<?php 
	
	$size_id=$_POST['size_id'];
	$size_name=$_POST['size_name'];
	include('database.php');
	$sql="update sizes set name='$size_name' where id=$size_id";
	$conn->query($sql);
	header("location:sizes.php?status=3");


?>