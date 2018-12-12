<?php
session_start();
include "connection.php";

$staffid =$_POST['staffid'];
$name =$_POST['name'];
$email =$_POST['email'];
$phone =$_POST['phone'];


$sql = "UPDATE staff SET staffName = '$name', phoneNo = '$phone', email = '$email' WHERE staffID = '$staffid'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));

$_SESSION['name'] = $name;

echo "<script>alert('Update Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= main.php'/>";
?>