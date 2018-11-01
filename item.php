<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])) 		//register tu button submit dekat dalam form
{
$semester = $_POST["sem"];   		//Yang belah kiri amik value belah kanan 
$sesi = $_POST["session"]; 	//based on html kita
$dateReceive = $_POST["dReceived"];
$dateReturn = $_POST["dReturned"];
$quantity = $_POST["totalBag"];
$item = $_POST["items"];
$description = $_POST["desc"];

//if 
$sql="INSERT INTO (sem,,phoneNo,address,faculty,gender) VALUES ('$studName','$matricNo','$phones','$address','$faculty','$gender')";// SQL based on database declaration
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

    echo "<script>alert('Register Student Success!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Store System</title>
    <link rel="icon" href="Logo/5.jpg" type="image/gif" sizes="16x16">
    <!-- external css -->
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- internal css -->
    <style media="screen">
      .logo {
        width: 180px;
        height: 80px;
        margin-left: 20px;
      }
    </style>
  </head>
  <body>
    <!-- main box of content -->
      <div class="main">
          <!-- box of header -->
          <div class="header">
			<?php include 'menu.php'; ?>
          </div>
          
          <!-- box of content -->
          <div class="Mcontent">

            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="50%" align="center"><h2><p><img src="logo/register.png" alt="icon register" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">Manage student Items</font></h2></td>
              <td><hr></td>
            </table>
				<!-- Manage student items Content -->
			  <form action="insert_student.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">

				<tr>
                  <td align="center" width="30%">Sem</td>
                  <td><input type="checkbox" name="number" value = "sem 1" required>Sem 1</td>
				  <td><input type="checkbox" name="number" value = "sem 2" required>Sem 2</td>
                </tr>
				<tr>
                  <td align="center" width="30%">Sessions</td>
                  <td><input class="Minput" type="number" name="number" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Date Received</td>
                  <td><input class="Minput" type="date" name="date received" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Date Received</td>
                  <td><input class="Minput" type="date" name="date received" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Description</td>
                  <td><input class="Minput" type="text" name="descriptioninput" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Type</td>
                  <td><input class="Minput" type="text" name="typeinput" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Quantity</td>
                  <td><input class="Minput" type="number" name="quantityinput" required></td>
                </tr>