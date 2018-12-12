<?php
session_start();
include "connection.php";

$id = $_POST['staffid'];
$pass = $_POST['password'];
//$name =$_POST['name'];

$hash = "123asdji2od".$pass."n3k2oo1";
$pass = hash('sha512',$hash);
$sql = "SELECT staffID, staffName, password FROM staff WHERE staffID='$id' and password='$pass'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn)); //connection dengan database

if(mysqli_num_rows($execute)>0)
{
	//otput data of each row
	while($row = mysqli_fetch_assoc($execute)) //check SQL return result tak
    {
		//set the session
		$_SESSION['LoggedIn'] = true;
		$_SESSION['staffid'] = $row["staffID"];
		$_SESSION['name'] = $row["staffName"];
		$_SESSION['password'] = $row["password"];
		
		
		echo "<script>alert('Login Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= main.php'/>";
		
	}
}	else
	{
		echo "<script>alert('Login fail!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= index.php'/>";
	}
	
mysqli_close($conn);

?>


