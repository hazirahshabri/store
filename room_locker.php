<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";
$sql ="SELECT studentName, gender, phoneNo, semester, sessions, roomName,lockerName, student.studentID
	   FROM student,storedetail, locker, room
	   WHERE student.studentID = storedetail.studentID 
	   AND storedetail.lockerID = locker.lockerID
	   AND locker.roomID = room.roomID"; 
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
          <div class="Mcontent6">
			<br>
			<?php
			if(mysqli_num_rows($result)>0){
		
			?>
            <table align="center" border="0" width="70%" cellpadding="5" cellspacing="1">
              <td><hr></td>
              <td width="35%" align="center"><h2><p><img src="logo/l.jpg" alt="icon list" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">History of Room & Locker</font></h2></td>
              <td><hr></td>
            </table>
            <!-- List of locker and room Content -->
			<table width="980" border="0">
            <tbody>
                <tr>
                  <td width="225">&nbsp;</td>
                  <td width="155"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for matric no" title="Type in a name"></td>
                </tr>
			</tbody>
			</table>
			</br>
            <form action="insert_student.php" method="post">
			  <table id="myTable" align="center" border="1" width="70%" cellpadding="8" cellspacing="0">
                <tr align="center">
                  <th width="7%" style="background-color: #ededed;">No.</th>
                  <th style="background-color: #ededed;">Student FullName</th>
				  <th width="14%" style="background-color: #ededed;">Matric No</th>
				  <th width="8%" style="background-color: #ededed;">Gender</th>
                  <th width="10%" style="background-color: #ededed;">Phone No</th>
				  <th width="5%" style="background-color: #ededed;">Semester</th>
				  <th width="8%" style="background-color: #ededed;">Session</th>
                  <th width="8%" style="background-color: #ededed;">Room</th>
				  <th width="8%" style="background-color: #ededed;">Locker</th>
                </tr>
				
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
				?>
				
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentID"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["gender"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["phoneNo"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["semester"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["sessions"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["roomName"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["lockerName"];?></td>
				</tr>
				
				<?php
				$rowNumber++;
				} 
				?>
				
              </table>
			  
			  <?php 
			}else{
				
					echo "<p align=center>No record of room and locker found</p>";
	
				 }
			  ?>
            </form>
			
          </div>
          
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
