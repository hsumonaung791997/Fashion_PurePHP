<?php
	
	$item_code=$_REQUEST['item_code'];
	include('database.php');
	$sql="select * from items where item_code='$item_code'";///$item_code ka string (varchar) moh single code nae write
	$result=$conn->query($sql);

		while ($row=$result->fetch_assoc()) {
			echo json_encode($row);
		}

?>