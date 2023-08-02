<?php 
	
	$gender_id=$_POST['gender_id'];
	$gender_name=$_POST['gender_name'];
	include('database.php');
	$sql="update genders set name='$gender_name' where id=$gender_id";
	$conn->query($sql);
	header("location:genders.php?status=3");


?>