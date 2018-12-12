<?php

session_start();
include "connection.php";
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
	$matricNo = $_GET['studentId'];

	$sql = "SELECT lockerName,roomName,gender,semester,sessions,studentName,dateReceived,dateReturned,totalPayment,totalBag,otherItem,description,student.studentID,locker.lockerID 
		    FROM student,room,locker,management,storedetail,item
		    WHERE student.studentID = storedetail.studentID 
			AND storedetail.lockerID = locker.lockerID 
			AND management.storeID = storedetail.storeID
			AND locker.roomID = room.roomID
			AND item.storeID=storedetail.storeID
			and student.studentID = '$matricNo'"; 
	   
	$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

	if(isset($_POST['delete']))
	{
	$sql2 = "SELECT lockerID FROM locker WHERE lockerid IN 
			(SELECT lockerID FROM storedetail WHERE studentID='$matricNo' AND checkout='n')";
																	
	$result2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn)); 

	if(mysqli_num_rows($result) > 0) 
	{
		$lockerid    = mysqli_fetch_assoc($result2);
		$lockerNo    = $lockerid['lockerID'];
		
		$sql3 = "UPDATE locker SET status='Available' WHERE lockerID='$lockerNo'";
		$result3 = mysqli_query($conn,$sql3) or die (mysqli_error($conn)); 
	}	
	
	$sql4 = "DELETE FROM item WHERE storeID IN (SELECT storeID FROM storedetail WHERE studentID='$matricNo')";
	$result4 = mysqli_query($conn,$sql4);
	
	$sql5 = "DELETE FROM management WHERE storeID IN (SELECT storeID FROM storedetail WHERE studentID='$matricNo')";
	$result5 = mysqli_query($conn,$sql5);
	
	$sql5 = "DELETE FROM storedetail WHERE studentid IN (SELECT studentid FROM student WHERE studentID='$matricNo')";
	$result5 = mysqli_query($conn,$sql5);
	
	$sql6 = "DELETE FROM student WHERE studentID='$matricNo'";
	$result6 = mysqli_query($conn,$sql6);
	
	echo "<script>alert('Delete Student Success!');</script>";
	echo "<meta http-equiv='refresh' content='0; url= list.php'/>";
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
		  
			<?php
			if(mysqli_num_rows($result)>0){
			?>
			
            <table align="center" border="0" width="90%" cellpadding="3" cellspacing="1">
              <td><hr></td>
              <td width="20%" align="center"><h2><p><font color="#8B008B">Detail Student Item</font></h2></td>
              <td><hr></td>
            
			</table>
            <!-- payment Content -->
			<form action="" method="post">
              <table id="myTable" align="center" border="1" width="85%" cellpadding="8" cellspacing="0">
			    <tr align="center">
                  <td width="3%" style="background-color: #ededed;">No.</td>
                  <td style="background-color: #ededed;">Student FullName</td>
                  <td width="6%" style="background-color: #ededed;">Matric No</td>
				  <td width="3%" style="background-color: #ededed;">Gender</td>
                  <td width="6%" style="background-color: #ededed;">Semester</td>
				  <td width="6%" style="background-color: #ededed;">Sessions</td>
				  <td width="8%" style="background-color: #ededed;">Date Received</td>
				  <td width="8%" style="background-color: #ededed;">Date Returned</td>
				  <td width="5%" style="background-color: #ededed;">Room</td>
				  <td width="5%" style="background-color: #ededed;">Locker</td>
				  <td width="8%" style="background-color: #ededed;">Total Payment</td>
				  <td width="5%" style="background-color: #ededed;">Total Bag</td>
				  <td width="5%" style="background-color: #ededed;">Other Item</td>
				  <td width="8%" style="background-color: #ededed;">Description</td>
				</tr>
				
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
				?>
				
                <tr>
				  <input name="studentId" type="hidden" value="<?php echo $row['studentID'];?>">
				  <input name="lockerId"  type="hidden" value="<?php echo $row['lockerID'];?>">
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentName"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentID"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["gender"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["semester"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["sessions"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReceived"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReturned"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["roomName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["lockerName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center">RM<?php echo $row["totalPayment"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["totalBag"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["otherItem"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["description"];?></td>
				</tr>
				
				<?php
				$rowNumber++;
				} 
				?>
				
              </table>
			  

            <table align="center" border="0" width="85%" cellpadding="5" cellspacing="1">
              			    <tr align="center">
                  <td width="3%"></td>
                  <td ></td>
                  <td width="6%" ></td>
				  <td width="8%" ></td>
                  <td width="8%" ></td>
				  <td width="8%" ></td>
				  <td width="10%" ></td>
				  <td width="10%" ></td>
				  <td width="8%" ></td>
				  <td width="8%" ></td>
				  <td width="8%" ></td>
				  <td width="8%" ></td>
				  <td width="8%" ></td>
              <td width="40%" align="right"><h2><input class="Lbtn4" type="submit" name="delete" value="DELETE"></td>

				</tr>
              
			</table>
				<?php 
			}		else
					{
						echo "<p align=center>Student item has deleted. No longer record found.</p>";
					}
				?>
            </form>
			</div>
			<!-- box of footer -->
      </div>
  </body>
</html>
