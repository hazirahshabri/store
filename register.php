<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)

include "connection.php";

if(isset($_POST['register']))
{
	$staffid =$_POST['staffid'];
	$name =$_POST['name']; //staffName punya
    $email =$_POST['email'];
    $phone =$_POST['phone'];
	$password =$_POST['password'];
	$confirmPassword =$_POST['password2']; 
    

	
    if($password==$confirmPassword)
    {
		$salt = "123asdji2od".$password."n3k2oo1";
		$hash = hash('sha512',$salt);
		$confirmPassword = $hash;

        $sql="INSERT INTO staff(staffID, staffName, phoneNo, email, password, confirmPassword)
			  VALUES ('$staffid','$name','$phone','$email','$hash','$confirmPassword')";
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
		  <table border="0" width="100%" cellpadding="0" cellspacing="0">
            <td width="20%" align="center"><h2><font color="#8B008B"> UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM</font></h2></td>
            </table>
          </div>
          <!-- box of content -->
          <div class="Mcontent">
            <table align="center" border="0" width="80%" cellpadding="7" cellspacing="0">
                
					<td><form action = "register.php" method ="post">
					<td width="35%" align="center" ><h2><font color="#8B008B">REGISTRATION</font></h2> 

					Staff ID		<input class="input1" type="text" name="staffid" maxlength="5" autofocus required><br><br>
					Staff Name		<input class="input1" type="text" name="name" required><br><br>
					Email			<input class="input1" type="email" name="email" required><br><br>
					Phone No		<input class="input1" type="text" name="phone" maxlength="15" required><br><br> <!-- name="X" kena sama dgn dlm bracket post[X] atas & Post tu amik data melalui nama dia --> 
					Password		<input class="input1" type="password" name="password" maxlength="20" required><br><br>
					Confirm Password<input class="input1" type="password" name="password2" maxlength="20" required><br><br>

					<input class="Lbtn" type="submit" name="register" value="register"><br><br>
					<input class="Lbtn" type="reset" name="reset" value="RESET"> 
					</td>
                    </form>	
                        
					<td style="border-right: 1px solid #DDA0DD;"> <!-- inline css --></td>
					<td></td>
					<td></td>
					<td width="15%"><img src="Logo/UTeM.jpg" width="330px" height="300px"></td>
					<td width="40%">
					<h2><font color="#8B008B">ABOUT US</font></h2>
						
					<p> Welcome to our service! <br><br>
                        Register now as a user to join and using our system. <br><br>
						Please insert your staffid. <br><br>
						Length of password cannot exceed 20 character. <br><br>
						This system can help you manage student to store their items. Make a booking for student to store their item during semester break. 
					    Student can choose the date to keep their item. Room and locker will given by the staff. <br><br>
					    Enjoy !
					</p>
					
					</td>
                  <td></td>
                
              </table>
            
          </div>
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 10.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      
  </body>
</html>
