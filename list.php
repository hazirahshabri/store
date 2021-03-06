<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";
$sql ="SELECT studentName, studentID, gender, phoneNo, address, postcode, state, faculty FROM student"; 
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));

if (isset($_GET['studentId'])){
	$matricNo = $_GET['studentId'];
	
	$run = mysqli_query($conn, "select lockerid from locker where lockerid in (select lockerid from storedetail where studentid = (select studentid from student where studentid = '$matricNo'))");
	
	if (mysqli_num_rows($run) == 0){
		mysqli_query($conn,"delete from student where studentid = '$matricNo'");
		echo "<meta http-equiv = 'refresh' content='0; url=list.php'/>";
	}
	else
	{
		echo "<meta http-equiv = 'refresh' content='0; url=delete.php?studentId=$matricNo'/>";
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
          <div class="Mcontent6">
            <br>
			<?php
			if(mysqli_num_rows($result)>0){
			?>
            <table align="center" border="0" width="70%" cellpadding="5" cellspacing="1">
              <td><hr></td>
              <td width="35%" align="center"><h2><p><img src="logo/s.png" alt="icon list" width="62" height="42" align="middle" hspace="20"><font color="#8B008B">List of Students</font></h2></td>
              <td><hr></td>
            </table>
            <!-- List of Students Content -->
			<table width="580" border="0">
              <tbody>
                <tr>
                  <td width="225">&nbsp;</td>
				  <td width="225">&nbsp;</td>
                  <td width="155"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for matric no" maxlength="10" title="Type in a name"></td>
                  <td width="26">&nbsp;</td>
                </tr>
              </tbody>
            </table>
            </br>
            <form action="insert_student.php" method="post">
              <table id="myTable" align="center" border="1" width="85%" cellpadding="8" cellspacing="0">
			  <tr align="center">
				  <th width="7%" style="background-color: #ededed;">No.</th>
                  <th style="background-color: #ededed;">Student FullName</th>
				  <th width="15%" style="background-color: #ededed;">Matric No</th>
				  <th width="3%" style="background-color: #ededed;">Gender</th>
                  <th width="10%" style="background-color: #ededed;">Phone No</th>
                  <th width="20%" style="background-color: #ededed;">Address</th>
				  <th style="background-color: #ededed;">Faculty</th>
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
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["gender"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["phoneNo"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["address"];?> <?php echo $row["postcode"];?> <?php echo $row["state"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["faculty"];?></td>
				  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "item.php?studentId=<?php echo $row["studentID"];?>">Add Item</a> 
																													&nbsp 
																			   <a href = "update.php?studentId=<?php echo $row["studentID"];?>">Update</a> 
																													&nbsp 
																			   <a href = "list.php?studentId=<?php echo $row["studentID"];?>">Delete</a</td>
                </tr>
				<?php
				$rowNumber++;
				} 
				?>
				
              </table>
			  
			  <?php 
			}else{
				
					echo "<p align=center>No student record found</p>";
	
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
