 <?php
	$color_name =trim( $_POST['color_name'] ) ;
	include('database.php');
	$sql="insert into colors(id,name) values('','$color_name')";
	$conn->query($sql);
	header("location:colors.php?status=1");


?>