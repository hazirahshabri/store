<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$studentid = $_GET['studentId'];
$sql ="SELECT lockerName,roomName,semester,sessions,studentName,dateReceived,dateReturned,totalPayment,student.studentID,locker.lockerID,storedetail.storeID
	   FROM student,room,locker,management,storedetail 
	   WHERE student.studentID = storedetail.studentID 
	   AND storedetail.lockerID = locker.lockerID 
       AND management.storeID = storedetail.storeID
	   AND locker.roomID = room.roomID
	   AND student.studentid = '$studentid'
	   AND status = 'Not Available'"; 
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
          <div class="Mcontent">
			<?php
			if(mysqli_num_rows($result)>0){
			?>
			
            <table align="center" border="0" width="80%" cellpadding="5" cellspacing="1">
              <td><hr></td>
              <td width="20%" align="center"><h2><p><img src="logo/c.png" alt="icon pay" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">Checkout</font></h2></td>
              <td><hr></td>
            
			</table>
            <!-- payment Content -->
			<form action="status.php" method="post">
              <table id="myTable" align="center" border="1" width="95%" cellpadding="8" cellspacing="0">
			    <tr align="center">
                  <td width="3%" style="background-color: #ededed;">No.</td>
                  <td style="background-color: #ededed;">Student FullName</td>
                  <td width="6%" style="background-color: #ededed;">Matric No</td>
                  <td width="5%" style="background-color: #ededed;">Semester</td>
				  <td width="5%" style="background-color: #ededed;">Sessions</td>
				  <td width="8%" style="background-color: #ededed;">Date Received</td>
				  <td width="8%" style="background-color: #ededed;">Date Returned</td>
				  <td width="8%" style="background-color: #ededed;">Room</td>
				  <td width="8%" style="background-color: #ededed;">Locker</td>
				  <td width="8%" style="background-color: #ededed;">Total Payment</td>
                  <td style="background-color: #ededed;">Action</td>
                </tr>
				
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
				?>
				
                <tr>
				  <input name="studentId" type="hidden" value="<?php echo $row['studentID'];?>">
				  <input name="lockerId"  type="hidden" value="<?php echo $row['lockerID'];?>">
				  <input name="storeId"  type="hidden" value="<?php echo $row['storeID'];?>">
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentName"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentID"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["semester"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["sessions"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReceived"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReturned"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["roomName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["lockerName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center">RM<?php echo $row["totalPayment"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><input class="Lbtn2" type="submit" name="checkout" value="checkout"></a> 
				</tr>
				
				<?php
				$rowNumber++;
				} 
				?>
				
              </table>
			  
				<?php 
			}		else{
							echo "<p align=center>No record of student item found</p>";
						}
				?>
            </form>
			</div>
			<!-- box of footer -->
			<div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Weekday : 10.00 a.m - 4.00 p.m <br>
					Weekend : 10.00 a.m - 2.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
