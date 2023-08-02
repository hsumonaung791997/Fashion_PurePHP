<?php
	//1.Accept data
	$item_id = $_POST['item_id'];

	$oldphotolink = $_POST['oldphotolink'];

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

	$photoobj=$_FILES['photo'];
	//var_dump($photoobj);

	if ($photo) {		
	
		$photo_tmpname=$_FILES['photo']['tmp_name'];

		$photo_savename = 'photo/'.$photo; /// File path 		
		
		move_uploaded_file($photo_tmpname, $photo_savename);

		$oldphotolink = $photo_savename;
	}

	include('database.php');
	$sql = "update items set 
				type_id=$type_id,
				gender_id=$gender_id,
				size_id=$size_id,
				color_id=$color_id,
				price=$price,
				brand_id=$brand_id,
				item_code='$item_code',
				photo='$oldphotolink',
				detailinfo='$description',
				quantity=$quantity where id=$item_id";
	$conn->query($sql);
	header("location:items.php?status=3");

	// echo "$item_code => $type_id => $size_id => $color_id => $gender_id => $brand_id => $price => $quantity => $description => $photo";


	//2.File Upload
	//3.Insert into Database

?>