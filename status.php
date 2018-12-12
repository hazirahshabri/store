<?php
session_start();
include "connection.php";

if(isset($_POST['checkout'])) 			
{
	  		
	$matricNo = $_POST["studentId"]; 	
	$lockerNo = $_POST["lockerId"];
	$storeNo = $_POST["storeId"];

	$sql      ="UPDATE locker SET status = 'Available' WHERE lockerID = '$lockerNo'";
	$result   = mysqli_query($conn,$sql) or die (mysqli_error($conn)); 
	
	$sql2      ="UPDATE storedetail SET checkout = 'Y' WHERE storeID = '$storeNo'";
	$sql2result   = mysqli_query($conn,$sql2) or die (mysqli_error($conn)); 

	echo "<script>alert('Student has checkout!');</script>";
	echo "<meta http-equiv='refresh' content='0; url= listItem.php?studentId=$matricNo'/>";			

}
?>