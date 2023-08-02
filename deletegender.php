<?php 
	$gender_id =$_POST['gender_id'];
	include('database.php');
	$sql="delete from genders where id=$gender_id";
	$conn->query($sql);
	header("location:genders.php?status=2");

?>