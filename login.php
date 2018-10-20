<?php
session_start();
include "connection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT user_id, username, name, password FROM users WHERE username='$username' and password='$password'";

$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));

if(mysqli_num_rows($execute)>0){
	//otput data of each row
	while($row = mysqli_fetch_assoc($execute)){
		
		
		//set the session
		$_SESSION['username'] = $row["username"];
		$_SESSION['name'] = $row["name"];
		$_SESSION['id'] = $row["user_id"];
		
		echo "<script>alert('Login Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= main.php'/>";
		
	}
}else{
	echo "<script>alert('Login fail!');</script>";
	echo "<meta http-equiv='refresh' content='0; url= index.php'/>";
}
mysqli_close($conn);



?>
