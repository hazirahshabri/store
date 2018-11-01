<?php
session_start();
include "connection.php";

$studName = $_POST["name"];  --> //Yang belah kiri amik value belah kanan 
$matricNo = $_POST["studentId"]; //based on html kita
$phones = $_POST["phone"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];

$sql = "UPDATE student set studentName = '$studName', studentID = '$matricNo', phoneNo = '$phones', address= '$address', faculty='$faculty'  WHERE studentID = '$matricNo'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Update book Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= action.php'/>";
?>