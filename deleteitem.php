<?php 
	$item_id =$_POST['item_id'];
	include('database.php');
	$sql="delete from items where id=$item_id";
	$conn->query($sql);
	header("location:items.php?status=2");

?>