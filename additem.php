<?php
	//1.Accept data
	
	$item_code=$_POST['item_code'];
	$type_id=$_POST['type_id'];
	$size_id=$_POST['size_id'];
	$color_id=$_POST['color_id'];
	$gender_id=$_POST['gender_id'];
	$brand_id=$_POST['brand_id'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$description=$_POST['description'];
	  
	$photo=$_FILES['photo'] ['name'];
	$photo_tmpname=$_FILES['photo']['tmp_name'];

	$photo_savename = 'photo/'.$photo; /// File path 
	$photoobj=$_FILES['photo'];
	//var_dump($photoobj);
	move_uploaded_file($photo_tmpname, $photo_savename);

	include('database.php');
	$sql = "insert into items(id,type_id,gender_id,size_id,color_id,price,brand_id,item_code,photo,detailinfo,quantity) values('',$type_id,$gender_id,$size_id,$color_id,$price,$brand_id,'$item_code','$photo_savename','$description',$quantity)";
	$conn->query($sql);
	header("location:items.php?status=1");

	// echo "$item_code => $type_id => $size_id => $color_id => $gender_id => $brand_id => $price => $quantity => $description => $photo";


	//2.File Upload
	//3.Insert into Database
?>