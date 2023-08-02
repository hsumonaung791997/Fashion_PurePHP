<?php 
	$size_id =$_POST['size_id'];
	include('database.php');
	$sql="delete from sizes where id=$size_id";
	$conn->query($sql);
	header("location:sizes.php?status=2");

?>