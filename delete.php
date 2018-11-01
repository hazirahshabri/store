
<?php
session_start();
include "connection.php";
$matricNo = $_GET["studentId"];
$sql = "DELETE FROM student WHERE studentID = '$matricNo'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Delete Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= list.php'/>";
?>
