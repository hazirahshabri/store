<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";
$sql ="SELECT storedetail.storeid,lockerName,roomName,semester,sessions,studentName,totalBag,otherItem,description,dateReceived,dateReturned,student.studentID,locker.lockerID
	   FROM student,room,locker,management,storedetail,item
	   WHERE student.studentID = storedetail.studentID 
	   AND storedetail.lockerID = locker.lockerID 
       AND management.storeID = storedetail.storeID
	   AND locker.roomID = room.roomID
	   AND item.storeid = storedetail.storeid
	   AND status like 'not available' order by storedetail.storeID";
	   
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
			<br>
			<?php
			if(mysqli_num_rows($result)>0){
			?>
            <table align="center" border="0" width="70%" cellpadding="5" cellspacing="1">
              <td><hr></td>
              <td width="40%" align="center"><h2><p><img src="logo/g.png" alt="icon list" width="62" height="52" align="middle" hspace="20"><font color="#8B008B">List of Student Items</font></h2></td>
              <td><hr></td>
            </table>
            <!-- List of Students item Content -->
			<table width="348" border="0">
            <tbody>
                <tr>
                  <td width="225">&nbsp;</td>
                  <td width="155"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for matric no" title="Type in a name"></td>
                </tr>
			</tbody>
			</table>
			</br>
			<form action="insert_student.php" method="post">
              <table id="myTable" align="center" border="1" width="100%" cellpadding="8" cellspacing="0">
				<tr align="center">
                  <th width="4%" style="background-color: #ededed;">No.</th>
                  <th style="background-color: #ededed;">Student FullName</th>
                  <th width="8%" style="background-color: #ededed;">Matric No</th>
                  <th width="6%" style="background-color: #ededed;">Semester</th>
				  <th width="5%" style="background-color: #ededed;">Sessions</th>
				  <th width="8%" style="background-color: #ededed;">Date Received</th>
				  <th width="8%" style="background-color: #ededed;">Date Returned</th>
				  <th width="6%" style="background-color: #ededed;">Total Bag</th>
				  <th width="7%" style="background-color: #ededed;">Other Item</th>
				  <th width="7%" style="background-color: #ededed;">Description</th>
				  <th width="4%" style="background-color: #ededed;">Room</th>
				  <th width="4%" style="background-color: #ededed;">Locker</th>
                  <th style="background-color: #ededed;">Action</th>
                </tr>
				
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
				?>
				
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentName"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentID"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["semester"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["sessions"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReceived"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["dateReturned"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["totalBag"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["otherItem"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["description"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["roomName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["lockerName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "item.php?studentId=<?php echo $row["studentID"];?>">New Item</a> 
																													&nbsp 
																			   <a href = "updateItem.php?studentId=<?php echo $row["studentID"];?>">Update Item</a>
																													&nbsp
																			   <a href = "checkout.php?studentId=<?php echo $row["studentID"];?>">Checkout</a>
																													&nbsp
																			   <a href = "deleteItem.php?storeid=<?php echo $row["storeid"];?>">Delete</a></td>
                </tr>
				
				<?php
				$rowNumber++;
				} 
				?>
				
              </table>
			  
				<?php 
			}		else
					{
						echo "<p align=center>No record of student item found</p>";
					}
				?>
            </form>
			</div>
			<!-- box of footer -->
			
      </div>
  </body>  
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
  </html>
