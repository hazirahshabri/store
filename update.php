<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$matricNo = $_GET['studentId'];
$sql ="SELECT studentName, studentID, gender, phoneNo, address, postcode, state FROM student WHERE studentID = '$matricNo' " ;  
// SQL based on database declaration //letk condition  !!
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$data = mysqli_fetch_assoc($result);
$gender = $data['gender'];
$f = '';
$m = '';
if($gender == 'F')
	$f = 'checked';
if($gender == 'M')
	$m = 'checked';

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
              <td width="40%" align="center"><h2><p><img src="logo/updates.jpg" alt="icon update" width="42" height="42" align="center" hspace="20"><font color="#8B008B">Update Student</font></h2></td>
              <td><hr></td>
            </table>
            <!-- update student Content -->
            <form action="update_action.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
			  <input type="hidden" name="studentId" value="<?php echo $matricNo;?>" hidden >
                <tr>
                  <td align="center" width="30%">Student Name</td>
                  <td><input class="Minput2" type="text" name="name" value="<?php echo $data["studentName"];?>" required></td>
                <!-- echo $data["database declaration"]; -->
				<!-- name="" kena sama dengan post yg kt atas -->
				</tr>
				<tr>
                  <td align="center" width="30%">Matric No</td>
                  <td><input class="Minput2" type="text" name="studentId" maxlength="10" value="<?php echo $matricNo;?>" disabled></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Gender</td>
				  <td><input type="radio" name="gender" value = "Male" required <?php echo $m?>>Male &nbsp;&nbsp;
				  <input type="radio" name="gender" value = "Female" required <?php echo $f?>>Female</td>
                </tr>
                <tr>
                  <td align="center" width="30%">Phone No</td>
                  <td><input class="Minput2" type="tel" name="phone" maxlength="15" value="<?php echo $data["phoneNo"];?>" autofocus required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Address</td>
                  <td><input class="Minput2" type="text" name="address" value="<?php echo $data["address"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Postcode</td>
                  <td><input class="Minput2" type="text" name="postCode" maxlength="5" value="<?php echo $data["postcode"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">State</td>
                  <td><input class="Minput2" type="text" name="state" value="<?php echo $data["state"];?>"required></td>
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
