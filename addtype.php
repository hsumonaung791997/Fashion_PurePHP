<?php
	$type_name =trim( $_POST['type_name'] ) ;
	include('database.php');
	$sql="insert into types(id,name) values('','$type_name')";
	$conn->query($sql);
	header("location:types.php?status=1");


?>