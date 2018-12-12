<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

if(isset($_POST['search'])) 			//register tu button submit dekat dalam form
{
	$matricNo = $_POST['studentId'];
	$CheckUnique = "SELECT * FROM student WHERE studentID = '$matricNo'";
	$result = mysqli_query($conn,$CheckUnique) or die (mysqli_error($conn)); //run query

	if(mysqli_num_rows($result) > 0) //check ada ke tak student dftr
	{
		echo "<script>alert('Student has registered!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= displaystudent.php?studentId=$matricNo'/>";
	}	
	else
	{
		echo "<script>alert('Student Not Register Yet');</script>";
		echo "<meta http-equiv='refresh' content='0; url= insert_student.php?studentId=$matricNo'/>";	
	}
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
			<p><img src="logo/grad.jpg" alt="student icon" width="180" height="180" align="center" hspace="645">
			<table align="center" border="0" width="45%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="45%" align="center"><h2><p><img src="logo/i.jpg" alt="icon search" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">Search Student</font></h2></td>
              <td><hr></td>
            </table>
			 <!-- Register new students Content -->
			  <form action="searchstudent.php" method="post">
              <table align="center" border="0" width="30%" cellpadding="8" cellspacing="0">
                <tr>
                  <td align="center" width="25%">Matric No</td>
                  <td><input class="Minput2" type="text" name="studentId" maxlength="10" autofocus required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn" align="center" type="submit" name="search" value="search"></td>
                </tr>
              </table>
            </form>
          </div>
				
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Weekday : 10.00 a.m - 4.00 p.m <br>
					Weekend : 10.00 a.m - 2.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      
  </body>
</html>



