<?php
session_start();
include "connection.php";
$sql ="SELECT book_id, book_name, quantity, price from book";
$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>

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
            <?php include 'menu.php'; ?>
          </div>
          <!-- box of content -->
          <div class="Mcontent">
            <br><br><br><br>
			
			<?php
			if(mysqli_num_rows($result)>0){
		
			?>
            <table align="center" border="0" width="70%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="20%" align="center"><h2><font color="#1168da">List of Books</font></h2></td>
              <td><hr></td>
            </table>
            <!-- List of Books Content -->
            <form action="" method="post">
              <table align="center" border="0" width="70%" cellpadding="5" cellspacing="0">
                <tr align="center">
                  <td width="7%" style="background-color: #ededed;">No.</td>
                  <td  style="background-color: #ededed;">Book Name</td>
                  <td width="10%" style="background-color: #ededed;">Quantity</td>
                  <td width="15%"  style="background-color: #ededed;">Price</td>
                  <td  style="background-color: #ededed;">Action</td>
                </tr>
				<?php
				$rowNumber = 1;
				while($row = mysqli_fetch_assoc($result)){
					
				?>
                <tr>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $rowNumber;?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;"><?php echo $row["book_name"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["quantity"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><?php echo $row["price"];?></td>
                  <td style="border-bottom: 1px solid #b3b3b3;" align="center"><a href = "update.php?bookId=<?php echo $row["book_id"];?>">Update</a> &nbsp <a href = "delete.php?bookId=<?php echo $row["book_id"];?>">Delete</a</td>
                </tr>
				<?php
				$rowNumber++;
				} 
				?>
              </table>
			  <?php
			}else{
				echo "No record found";
			}
			  ?>
            </form>
			<?php
			include ('query.php');
			?>
          </div>
          <!-- box of footer -->
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Time : 8.00 a.m - 4.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      		</div>
      </div>
  </body>
</html>
