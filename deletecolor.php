<?php 
	$color_id =$_POST['color_id'];
	include('database.php');
	$sql="delete from colors where id=$color_id";
	$conn->query($sql);
	header("location:colors.php?status=2");

?>