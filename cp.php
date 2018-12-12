<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$Pass = $_SESSION['staffid']; 

if(isset($_POST['change']))
{
	$oldpass = $_POST['oldpassword'];
	$newpass = $_POST['newpassword'];
	$conpass = $_POST['conpassword'];



	if (!empty($_POST['oldpassword']) || !empty($_POST['newpassword']) || !empty($_POST['conpassword']))
	{
		$oldpass = hash('sha512',"123asdji2od".$oldpass."n3k2oo1");
		$newpass = hash('sha512',"123asdji2od".$newpass."n3k2oo1");
		$conpass = hash('sha512',"123asdji2od".$conpass."n3k2oo1");
		
		$SQLOldPassword = "select password from staff where staffID = '$Pass'";
		$RunOldPassword = mysqli_query($conn,$SQLOldPassword) or die (mysqli_error($conn));
		if(mysqli_num_rows($RunOldPassword) > 0)
		{
			while($data = mysqli_fetch_assoc($RunOldPassword))
			{
				if($oldpass == $data["password"])
				{
					if($newpass == $conpass)
					{
						
						//betul kan sql ni je
						$SQL = "UPDATE	staff
								SET		password	=	'$hash'
								WHERE	staffID		=	'$Pass'";
						$UpdatePassword = mysqli_query($conn,$SQL) or die (mysqli_error($conn));
						if($UpdatePassword)
						{
							echo "<script>alert('Your password is changed. Please login again.');</script>";
							echo "<meta http-equiv = 'refresh' content = '0; url=logout.php'/>";
						}
						else
						{
							echo "<script>alert('Password is not match!');</script>";
						}
					}
				}
				else
				{
					echo "<script>alert('Old password is not match!!');</script>";
				}
			}
		}
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
			<p><img src="logo/cp.jpg" alt="student icon" width="180" height="180" align="center" hspace="645">
			<table align="center" border="0" width="45%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="45%" align="center"><h2><p><font color="#8B008B">Change Password</font></h2></td>
              <td><hr></td>
            </table>
			 <!-- Register new students Content -->
			  <form action="cp.php" method="post">
              <table align="center" border="0" width="30%" cellpadding="8" cellspacing="0">
                <tr>
                  <td align="center" width="25%">Old Password</td>
                  <td><input class="Minput2" type="password" name="oldpassword" maxlength="20" autofocus required></td>
                </tr>
				 <tr>
                  <td align="center" width="25%">New Password</td>
                  <td><input class="Minput2" type="password" name="newpassword" maxlength="20" autofocus required></td>
                </tr>
				 <tr>
                  <td align="center" width="25%">Confirm Password</td>
                  <td><input class="Minput2" type="password" name="conpassword" maxlength="20" autofocus required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn" align="center" type="submit" name="change" value="confirm"></td>
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