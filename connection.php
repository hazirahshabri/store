<?php
//initialized variable
	$servername = "localhost";
	$username = "root";
	$password ="";
	$dbname="store";
	
	//create connection
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	
	//check cconnection
	if(!$conn){
		die("connection failed" . mysqli_connect_error());
	}else{
		//echo "connected successfully";
		}
?>