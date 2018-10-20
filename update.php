<?php
session_start();
include "connection.php";

$bookId = $_GET['bookId'];
$sql = " SELECT book_id, book_name, quantity, price FROM book WHERE book_id = '$bookId' ";
$result = mysqli_query ($conn, $sql) or die (mysqli_error($conn));
$data = mysqli_fetch_assoc($result);
//echo $data['book_id']

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
            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="30%" align="center"><h2><font color="#1168da">Update Books</font></h2></td>
              <td><hr></td>
            </table>
            <!-- Register Books Content -->
            <form action="update_action.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center" width="30%">Book Name</td>
                  <td><input type="hidden" name="bookId" value="<?php echo $data["book_id"];?>"><input class="Minput" type="text" name="name" value="<?php echo $data["book_name"];?>" autofocus required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Quantity</td>
                  <td><input class="Minput" type="number" name="quantity" value="<?php echo $data["quantity"];?>"required></td>
                </tr>
                <tr>
                  <td align="center" width="30%">Price</td>
                  <td><input class="Minput" type="number" name="price" value="<?php echo $data["price"];?>" name="price" step="0.01" required></td>
                </tr>
                <tr>
                  <td></td>
                  <td><input class="Lbtn" type="submit" name="submit" value="submit"></td>
                </tr>
              </table>
            </form>
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
