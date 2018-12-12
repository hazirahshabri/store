<?php
session_start();

include "connection.php";

$studName = $_POST["name"];   
$matricNo = $_POST["studentId"]; 
$sem = $_POST["sem"];   		
$sesi = $_POST["session"]; 			
$dateReceive = $_POST["dReceived"];
$dateReturn = $_POST["dReturned"];
$quantity = $_POST["totalBag"];
$item = $_POST["otheritems"];
$description = $_POST["desc"];

$sql = "UPDATE student SET studentName = '$studName', studentID = '$matricNo', semester = '$sem', sessions = '$sesi', 
dateReceived= '$dateReceive', dateReturned='$dateReturn', totalBag='$quantity', otherItem='$quantity', description='$description'
WHERE studentID='$matricNo'";

$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Update Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= listItem.php'/>";
?>