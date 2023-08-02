<?php 
	$type_id =$_POST['type_id'];
	include('database.php');
	$sql="delete from types where id=$type_id";
	$conn->query($sql);
	header("location:types.php?status=2");

?>