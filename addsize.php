<?php
	$size_name =trim( $_POST['size_name'] );
	include('database.php');
	$sql="insert into sizes(id,name) values('','$size_name')";
	$conn->query($sql);
	header("location:sizes.php?status=1");


?>

