<?php 
	
	$color_id=$_POST['color_id'];
	$color_name=$_POST['color_name'];
	include('database.php');
	$sql="update colors set name='$color_name' where id=$color_id";
	$conn->query($sql);
	header("location:colors.php?status=3");


?>