<?php
session_start();
include "connection.php";

if(isset($_POST['register']))
{
	$staffid =$_POST['staffid'];
	$name =$_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
	$password =$_POST['password'];
	$comfirmPassword =$_POST['password2'];
    
    if($password==$comfirmPassword)
    {
        $sql="INSERT INTO staff(staffid, name, email, phone, password, password2)VALUES ('$staffid','$name','$email','$phone','$password','$comfirmPassword')";
        $execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
            if($execute)
            {
                echo "<script>alert('Register Success!');</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

            }else
            {
                echo "<script>alert('Register Fail!);</script>";
            }
    }else
    {
        echo "<script>alert('Password not match');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Store System</title>
    <link rel="icon" href="Logo/bag.jpg" type="image/gif" sizes="16x16">
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
            <table border="0" width="100%" cellpadding="0" cellspacing="0">
              <tr>
              
                <td width="20%" align="center"><h2><font color="#8B008B"> UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM</font></h2></td>
              </tr>
            </table>
          </div>
          <!-- box of content -->
          <div class="Mcontent">
            <disc>
              <table align="center" border="0" width="90%" cellpadding="7" cellspacing="0">
                <tr>
				<td width="10%"><img src="Logo/UTeM.jpg" width="350px" height="300px"></td>
                  <td width="30%">
                    <h2><font color="#8B008B">ABOUT US</font></h2>
                    <p> Welcome to our service! <br><br>
                       Register now as a user to join and using our system. <br><br>
                       Please insert username and password to register. <br><br>
					   This system can help you manage student to store their items. Make a booking for student to store their item during semester break. Student can choose the date to keep their item. Room and locker will given by the staff. <br><br>
					   Enjoy !
                    </p>
                  </td>
                  <td style="border-right: 1px solid #DDA0DD;"> <!-- inline css --></td>
                  <td></td>
				  
                  <form action="register.php" method="post">
                  <td width="30%"><h2><font color="#8B008B">REGISTRATION</font></h2>
                    <table border="0" cellpadding="5" cellspacing="0">
                      <tr>
                        <td>Staff ID</td>
                        <td><input class="input" type="text" name="staffid" autofocus required></td>
                      </tr>
                      <tr>
                        <td>Staff Name</td>
                        <td><input class="input" type="text" name="name" autofocus required></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><input class="input" type="email" name="email" autofocus required></td>
                      </tr>
                      <tr>
                        <td>Phone No</td>
                        <td><input class="input" type="text" name="phone" autofocus required></td>
                      </tr>
                      <tr>
                        <td>Password</td>
                        <td><input class="input" type="password" name="password" required></td>
                      </tr>
                      <tr>
                        <td>Confirm Password</td>
                        <td><input class="input" type="password" name="password2" required></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><input class="btn" type="submit" name="register" value="register"></td>
                      </tr>
                    </table>
                  </td>
                  </form>
                </tr>
              </table>
            </disc>
          </div>
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 8.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
