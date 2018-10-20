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
				
                <td width="20%" align="center"><h2><font color="#8B008B"> UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM </font></h2></td>
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
                       You now can register as a user to join and using our system. <br><br>
                       If you are already become a user, you can login to the system. All you need is to insert your username and password. <br><br>
					   This system can help you manage student to store their items. Make a booking for student to store their item during semester break. Student can choose the date to keep their item. Room and locker will given by the staff. <br><br>
					   Thank You !
                    </p>
                  </td>
                  <td style="border-right: 1px solid #DDA0DD;"> <!-- inline css --></td>
                  <td></td>
				  
                  <form action="login.php" method="post">
                  <td width="35%" ><h2><font color="#8B008B">LOGIN</font></h2>
                    User ID <input class="input" type="text" name="staffid" autofocus required><br><br>
                    Password &nbsp;<input class="input" type="password" name="password" required><br><br>
                    <input class="Lbtn" type="submit" name="login" value="LOGIN"><br><br>
					
                    Don't have an account? <a href="register.php"> Sign Up </a>
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
  </body>
</html>
