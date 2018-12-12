<?php
session_start();
include "connection.php";

//$matricNo = $_GET['studentId'];
/*
$studName = $_POST["name"];  --> //Yang belah kiri amik value belah kanan 
$matricNo = $_POST["studentId"]; //based on html kita
$phone = $_POST["phone"];
$address = $_POST["address"];
$faculty = $_POST["faculty"];
$gender = $_POST["gender"];
*/

$sql ="SELECT staffID, staffName, email, phoneNo FROM staff WHERE staffID='$Pass'";  // SQL based on database declaration //letk condition  !!
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$data = mysqli_fetch_assoc($result);

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
              <td width="40%" align="center"><h2><p><img src="logo/updates.jpg" alt="icon update" width="42" height="42" align="center" hspace="20"><font color="#8B008B">Update Staff</font></h2></td>
              <td><hr></td>
            </table>
            <!-- Register Books Content -->
            <form action="update_action.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
			
                <tr>
                  <td align="center" width="30%">Staff Name</td>
                  <td><input class="Minput2" type="text" name="name" value="<?php echo $data["studentName"];?>" autofocus required></td>
                <!-- echo $data["database declaration"]; -->
				<!-- name="" kena sama dengan post yg kt atas -->
				</tr>
                <tr>
                  <td align="center" width="30%">Matric No</td>
                  <td><input class="Minput2" type="text" name="studentId" value="<?php echo $data["studentID"];?>"></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Phone No</td>
                  <td><input class="Minput2" type="number" name="phone" value="0<?php echo $data["phoneNo"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Current Address</td>
                  <td><input class="Minput2" type="text" name="address" value="<?php echo $data["address"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Faculty</td>
                  <td><input class="Minput2" type="text" name="faculty" value="<?php echo $data["faculty"];?>"required></td>
                </tr>
				
				<td></td>
                <tr>
                  <td></td>
                  <td><input class="Lbtn2" type="submit" name="submit" value="submit"></td>
                </tr>
              </table>
            </form>
			
          </div>
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 10.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
