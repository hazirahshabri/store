<?php
session_start();
include "connection.php";
$Pass = $_SESSION['staffid']; /* $Pass is manipulated ( has variable) dia variable biasa*/ /* $_SESSION has (value)*/ /* session system pgg so boleh access dia n dia function */
$sql ="SELECT staffID, staffName, email, phoneNo FROM staff WHERE staffID='$Pass'"; /* $sql simpan variable utk buat statement dlm sql*/
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
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
          <div class="Mcontent3">
           
		   <!--<?php
			if(mysqli_num_rows($result)>0){
		
			?>-->
			<p><img src="logo/user.png" alt="user icon" width="150" height="150" align="center" hspace="655">
            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="20%" align="center"><h2><font color="#8B008B"> User <?php echo $_SESSION['name']; ?></font></h2></td>
              <td><hr></td>
            </table>
			
			<form action="" method="post">
              <table align="center" border="1%" width="50%" cellpadding="8" cellspacing="0">
                <tr align="center">
                  
                  <td style="background-color: #ededed;" align="center" >Staff Name</td>
                  <td style="background-color: #ededed;" align="center" >Staff ID</td>
				  <td style="background-color: #ededed;" align="center" >Staff Email</td>
				  <td style="background-color: #ededed;" align="center" >Phone No</td>
                  <td style="background-color: #ededed;" align="center" >Action</td>
                </tr>
				<!--<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
					
				?>-->
                <tr>
                 
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["staffName"];?></td>  <!-- dlm bracket declaration sql kt database -->
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["staffID"];?></td> 
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["email"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center">0<?php echo $row["phoneNo"];?></td> 
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "update.php?staffid=<?php echo $row["staffid"];?>">Update</a></td>
                </tr>
				<!--<?php
				$rowNumber++;
				} 
				?> -->
              </table>
			  <!--<?php
			}	else {
				echo "No record found";
				}
			
			
			  ?>-->
            </form>
			
          </div>
		  
			
            <!-- Userprofiles Content -->
			<!--
            <form action="" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center" width="30%">Staff Name</td>
                  <td><input class="Minput1" type="text" name="name" autofocus required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Staff ID</td>
                  <td><input class="Minput1" type="text" name="staffID" disabled></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Password</td>
                  <td><input class="Minput1" type="password" name="password" required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Confirm Password</td>
                  <td><input class="Minput1" type="password" name="password2" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn1" type="submit" name="submit" value="submit"></td>
                </tr>
              </table>
            </form>
          </div>
		  -->
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 10.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
