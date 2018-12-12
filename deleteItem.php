<?php

session_start();
include "connection.php";
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
//	$sql = "SELECT lockerName,roomName,gender,semester,sessions,studentName,dateReceived,dateReturned,totalPayment,totalBag,otherItem,description,student.studentID,locker.lockerID 
//		    FROM student,room,locker,management,storedetail,item
//		    WHERE student.studentID = storedetail.studentID 
//			AND storedetail.lockerID = locker.lockerID 
//			AND management.storeID = storedetail.storeID
//			AND locker.roomID = room.roomID
//			AND item.storeID=storedetail.storeID
//			and student.studentID = '$matricNo'"; 
	   
//	$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

	if(isset($_GET['storeid']))
	{
		$storeid = $_GET['storeid'];  
		$sql3 = "UPDATE locker SET status='Available' WHERE lockerID=(select lockerid from storedetail where storeid = '$storeid')";
		$result3 = mysqli_query($conn,$sql3) or die (mysqli_error($conn)); 	
	
	$sql4 = "DELETE FROM item WHERE storeID = '$storeid'";
	$result4 = mysqli_query($conn,$sql4);
	
	$sql5 = "DELETE FROM management WHERE storeID = '$storeid'";
	$result5 = mysqli_query($conn,$sql5);
	
	$sql5 = "DELETE FROM storedetail WHERE storeid='$storeid'";
	$result5 = mysqli_query($conn,$sql5);
	
	echo "<script>alert('Are you sure want delete?');</script>";
	echo "<script>alert('Item Deleted !');</script>";
	echo "<meta http-equiv='refresh' content='0; url= listItem.php'/>";
	}

?>