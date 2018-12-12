<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";
$matricNo='';
if(isset($_GET['studentId']))
$matricNo = $_GET["studentId"];

if(isset($_POST['submit'])) 			//register tu button submit dekat dalam form
{
	$studName = $_POST["name"];   		//Yang belah kiri amik value belah kanan 
	$matricNo = $_POST["studentId"]; 	//based on html kita
	$phones = $_POST["phone"];
	$address = $_POST["address"];
	$faculty = $_POST["faculty"];
	$gender = $_POST["gender"];
    $postcodes = $_POST["postCode"];
	$states = $_POST["state"];

	$CheckUnique = "SELECT * FROM student WHERE studentID = '$matricNo'";
	$result = mysqli_query($conn,$CheckUnique) or die (mysqli_error($conn)); //run query
	$data = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) > 0) //check ada ke tak data
	{
		echo "<script>alert('Student has registered!');</script>";
		echo "<meta http-equiv='refresh' content='0; url= displaystudent.php?studentId=$matricNo'/>";			
	}	
	else
	{
		$sql="INSERT INTO student(studentName,studentID,phoneNo,address,postcode,state,faculty,gender) 
			  VALUES ('$studName','$matricNo','$phones','$address','$postcodes','$states','$faculty','$gender')";// SQL based on database declaration
		$execute= mysqli_query($conn,$sql) or die (mysqli_error($conn));

			if($execute)
			{
				echo "<script>alert('Register Student Success!');</script>";
				echo "<meta http-equiv='refresh' content='0; url= displaystudent.php?studentId=$matricNo'/>";
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

            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="50%" align="center"><h2><p><img src="logo/register.png" alt="icon register" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">Register New Student</font></h2></td>
              <td><hr></td>
            </table>
			 <!-- Register new students Content -->
			  <form action="insert_student.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center" width="30%">Student Name</td>
                  <td><input class="Minput2" type="text" name="name" maxlength="50" autofocus required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Matric No</td>
                  <td><input class="Minput2" type="text" name="studentId" maxlength="10" value="<?php echo $matricNo;?>" required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Phone No</td>
                  <td><input class="Minput2" type="tel" name="phone" maxlength="15" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Address</td>
                  <td><input class="Minput2" type="text" name="address" maxlength="50" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Postcode</td>
                  <td><input class="Minput2" type="tel" name="postCode" maxlength="5" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">State</td>
                  <td>
				  <select class="Minput2" type="text" name="state" required>
				  <option>Pahang</option>
				  <option>Perak</option>
				  <option>Selangor</option>
				  <option>Wilayah Persekutuan</option>
				  <option>Melaka</option>
				  <option>Negeri Sembilan</option>
				  <option>Pulau Pinang</option>
				  <option>Perlis</option>
				  <option>Johor</option>
				  <option>Kedah</option>
				  <option>Terengganu</option>
				  <option>Kelantan</option>
				  <option>Sabah</option>
				  <option>Sarawak</option>
				  </select>
				  </td>
				</tr>
				<tr>
                  <td align="center" width="30%">Faculty</td>
                  <td>
				  <select class="Minput2" type="text" name="faculty" required>
				  <option>FTMK</option>
				  <option>FTKMP</option>
				  <option>FKP</option>
				  <option>FKEKK</option>
				  <option>FKE</option>
				  <option>FKM</option>
				  <option>FTK</option>
				  <option>FPTT</option>
				  </select>
				  </td>
				</tr>
                <tr>
                  <td align="center" width="30%">Gender</td>
				  <td><input type="radio" name="gender" value = "Male" required>Male &nbsp;&nbsp;
				  <input type="radio" name="gender" value = "Female" required>Female</td>
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
      
  </body>
</html>