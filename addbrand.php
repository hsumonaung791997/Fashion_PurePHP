<?php
	$brand_name =trim( $_POST['brand_name'] ) ;
	include('database.php');
	$sql="insert into brands(id,name) values('','$brand_name')";
	$conn->query($sql);
	header("location:index.php?status=1");


?>