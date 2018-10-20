
<?php
session_start();
include "connection.php";
$bookId = $_GET['bookId'];
$sql = "DELETE FROM book WHERE book_id = '$bookId'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Delete Success!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= action.php'/>";
?>
