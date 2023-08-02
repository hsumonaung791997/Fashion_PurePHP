<?php 
	$email = $_POST['email'];
	$p = $_POST['password'];
	// echo $email.$password;
	// die();

	include 'database.php';
	$sql = "SELECT * FROM admins where email='$email' and password='$p'";
	$result = $conn->query($sql);
	var_dump($result);
	if($result->num_rows>0){
		while ($row=$result->fetch_assoc()) {
			/// SEssion
			session_start();
			$_SESSION['userid'] = $row['id'];
			$_SESSION['username'] = $row['username'];

			header('location: items.php');
			
		}
	}else{ 
		header("location: login.php?status=0");
	}

?>