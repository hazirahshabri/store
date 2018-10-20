<?php
session_start();
include "connection.php";

$bookId = $_POST["bookId"];
$bookName = $_POST["name"];
$quantity = $_POST["quantity"];
$price = $_POST["price"];

$sql = "UPDATE book set book_name = '$bookName', price = '$price', quantity = '$quantity' WHERE book_id = '$bookId'";
$execute = mysqli_query($conn, $sql) or die (mysqli_error($conn));
echo "<script>alert('Update book Success!');</script>";
echo "<meta http-equiv='refresh' content='0; url= action.php'/>";
?>