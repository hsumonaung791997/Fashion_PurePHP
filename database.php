<?php
		$host="localhost";
		$username="root";
		$password="";
		$dbname="fashiondb";
		$conn=new mysqli($host,$username,$password,$dbname);
		// var_dump($conn);
		if ($conn->connect_error) {
		die("Connection Failed:".$conn->connect_error);
		        
		}

?>