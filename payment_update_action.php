<?php
session_start();
include "connection.php";

$studName = $_POST["name"];   //Yang belah kiri amik value belah kanan 
$matricNo = $_POST["studentId"]; //based on html kita
$phones = $_POST["phone"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];
$roomId = $_POST["roomID"];
$lockerId = $_POST["lockerID"];
$dateReceive = $_POST["dReceived"];
$dateReturn = $_POST["dReturned"];
$quantity = $_POST["totalBag"];
$item = $_POST["items"];
$description = $_POST["desc"];
$payment = $_POST["price"];



$sql = "UPDATE student set studentName = '$studName', studentID = '$matricNo', phoneNo = '$phones', address= '$address', faculty='$faculty'  WHERE studentID = '$matricNo'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Print Receipt Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= list.php'/>";
?>