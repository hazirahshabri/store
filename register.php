<?php 
session_start();
include "connection.php";
if (isset($_POST['register'])) {
	
	$staffid =$_POST['staffid'];
	$name =$_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
	$password =$_POST['password'];
	//$comfirmPassword =$_POST['password2']; 

  	$sql_u = "SELECT * FROM staff WHERE staffID='$staffid'";
  	$res_u = mysqli_query($sql_u);

  	if (mysqli_num_rows($res_u) > 0) {
  	  $name_error = "Sorry... id already taken"; 	
  	//}else if(mysqli_num_rows($res_e) > 0){
  	  //$email_error = "Sorry... email already taken"; 	
  	}else{
           $query = "INSERT INTO staff(staffID, staffName, phoneNo, email, password)
		   VALUES ('$staffid','$name','$phone','$email','$password')";
           $results = mysqli_query($query);
           echo 'Saved!';
           exit();
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
              <tr>
              
                <td width="20%" align="center"><h2><font color="#8B008B"> UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM</font></h2></td>
              </tr>
            </table>
          </div>
          <!-- box of content -->
          <div class="Mcontent">
            <table align="center" border="0" width="90%" cellpadding="7" cellspacing="0">
                <tr>
				<td><form action = "register.php" method ="post">
                  <td width="30%" align="center" ><h2><font color="#8B008B">REGISTRATION</font></h2> 

					Staff ID		<input class="input1" type="text" name="staffid" autofocus required><br><br>
					Staff Name		<input class="input1" type="text" name="name" autofocus required><br><br>
					Email			<input class="input1" type="email" name="email" autofocus required><br><br>
					Phone No		<input class="input1" type="text" name="phone" autofocus required><br><br> <!-- name="X" kena sama dgn dlm bracket post[X] atas & Post tu amik data melalui nama dia --> 
					Password		<input class="input1" type="password" name="password" required><br><br>
					Confirm Password<input class="input1" type="password" name="password2" required><br><br>

					<input class="Lbtn" type="submit" name="register" value="register"><br><br>
					<input class="Lbtn" type="reset" name="reset" value="RESET">
					</td>
                  </form>	
                        <td></td>
						<td style="border-right: 1px solid #DDA0DD;"> <!-- inline css --></td>
						
						<td></td>
						<td width="10%"><img src="Logo/UTeM.jpg" width="350px" height="300px"></td>
						<td width="30%">
						<h2><font color="#8B008B">ABOUT US</font></h2>
						<p> Welcome to our service! <br><br>
                       Register now as a user to join and using our system. <br><br>
                       Please insert username and password to register. <br><br>
					   This system can help you manage student to store their items. Make a booking for student to store their item during semester break. Student can choose the date to keep their item. Room and locker will given by the staff. <br><br>
					   Enjoy !
					    <p>
						</td>
                  <td></td>
                </tr>
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
