<?php 
	
	$type_id=$_POST['type_id'];
	$type_name=$_POST['type_name'];
	include('database.php');
	$sql="update types set name='$type_name' where id=$type_id";
	$conn->query($sql);
	header("location:types.php?status=3");


?>