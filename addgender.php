<?php
	$gender_name =trim( $_POST['gender_name'] ) ;
	include('database.php');
	$sql="insert into genders(id,name) values('','$gender_name')";
	$conn->query($sql);
	header("location:genders.php?status=1");


?>