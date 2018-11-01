<!--<?php
session_start();
include "connection.php";
$sql ="SELECT studentName, studentID, phoneNo, address, faculty, gender from student"; 
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>
-->

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
            <br><br><br><br>
			
			<?php
			if(mysqli_num_rows($result)>0){
		
			?>
            <table align="center" border="0" width="70%" cellpadding="5" cellspacing="1">
              <td><hr></td>
              <td width="25%" align="center"><h2><p><img src="logo/list.png" alt="icon list" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">List of Students</font></h2></td>
              <td><hr></td>
            </table>
            <!-- List of Students Content -->
            <form action="insert_student.php" method="post">
              <table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <td width="7%" style="background-color: #ededed;">No.</td>
                  <td  style="background-color: #ededed;">Student Name</td>
                  <td width="10%" style="background-color: #ededed;">Phone No</td>
                  <td width="15%"  style="background-color: #ededed;">Address</td>
				  <td width="15%"  style="background-color: #ededed;">Faculty</td>
                  <td  style="background-color: #ededed;">Action</td>
                </tr>
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
					
				?>
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["studentName"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center">0<?php echo $row["phoneNo"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["address"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["faculty"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "update.php?studentId=<?php echo $row["studentID"];?>">Update</a> 
																													&nbsp 
																				<a href = "delete.php?studentId=<?php echo $row["studentID"];?>">Delete</a</td>
                </tr>
				<?php
				$rowNumber++;
				} 
				?>
              </table>
			  
			  <?php 
			}else{
				
				echo "<p align=center>No record has found</p>";
	
			}
			  ?>
            </form>
			
          </div>
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 10.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
