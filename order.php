<?php
	// 1.Accept Data
	$itemdata = $_POST['item'];
	//var_dump($itemdata);
	$voucherno = uniqid();
	include('database.php');
	$total = 0;
	foreach ($itemdata as $key => $value) {
		// print_r($value);
		// die();
		$qty = $value['qty'];
		$price = $value['price'];
		$item_code = $value['item_code'];
		$total += ($qty*$price); 
		$sql = "INSERT into orderdetails(voucherno,qty,price,item_code) values('$voucherno',$qty,$price,'$item_code')";
		$conn->query($sql);


	}
	if ($total > 0) {
		$sql = "INSERT into orders(voucherno,total) values('$voucherno',$total)";
		$conn->query($sql);
		# code...
	}
	echo 'success';


?>