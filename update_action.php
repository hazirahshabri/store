<?php
session_start();
include "connection.php";

$studName = $_POST["name"];   //Yang belah kiri amik value belah kanan 
$matricNo = $_POST["studentId"]; //based on html kita
$phones = $_POST["phone"];
$address = $_POST["address"];
$postcodes = $_POST["postCode"];
$states = $_POST["state"];
$gender = $_POST["gender"];

$sql = "UPDATE student SET studentName = '$studName', studentID = '$matricNo', gender = '$gender', phoneNo = '$phones', 
address= '$address', postcode='$postcodes', state='$states'  
WHERE studentID='$matricNo'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Update Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= list.php'/>";
?>