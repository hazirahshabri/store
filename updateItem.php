<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$matricNo = $_GET['studentId'];
$sql ="SELECT studentName, semester, sessions, dateReceived, dateReturned, totalBag, otherItem, description, student.studentID
FROM student, storedetail, management, item
WHERE student.studentID = storedetail.studentID 
AND management.storeID = storedetail.storeID
AND item.storeid = storedetail.storeid";  

$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
$data = mysqli_fetch_assoc($result);

$sem = $data["semester"];
$satu = '';
$dua  = '';
$tiga  = '';

if($sem == '1' )
	$satu = 'checked';
if($sem == '2')
	$dua = 'checked';
if($sem == '3')
	$tiga = 'checked';

$sesi = $data["sessions"];
$satuu = '';
$duaa  = '';
$tigaa  = '';
$empatt  = '';
$limaa  = '';
$enamm  = '';
$tujuhh  = '';

if($sesi == '2017/2018' )
	$satuu = 'checked';
if($sesi == '2018/2019')
	$duaa = 'checked';
if($sesi == '2019/2020')
	$tigaa = 'checked';
if($sesi == '2020/2021')
	$empatt = 'checked';
if($sesi == '2021/2022')
	$limaa = 'checked';
if($sesi == '2022/2023')
	$enamm = 'checked';
if($sesi == '2023/2024')
	$tujuhh = 'checked';
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
          <div class="Mcontent5">
		  
            <table align="center" border="0" width="50%" cellpadding="0" cellspacing="0">
              <td><hr></td>
              <td width="60%" align="center"><h2><p><img src="logo/updates.jpg" alt="icon update" width="42" height="42" align="center" hspace="20"><font color="#8B008B">Update Student Items</font></h2></td>
              <td><hr></td>
            </table>
            <!-- update student Content -->
            <form action="updateItemAction.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center" width="30%">Student Name</td>
                  <td><input class="Minput2" type="text" name="name" value="<?php echo $data["studentName"];?>" disabled ></td>
                <!-- echo $data["database declaration"]; -->
				<!-- name="" kena sama dengan post yg kt atas -->
				</tr>
				<tr>
                  <td align="center" width="30%">Matric No</td>
                  <td><input class="Minput2" type="text" name="studentId" maxlength="10" value="<?php echo $matricNo;?>" disabled ></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Semester</td>
				  <td><input type="radio" name="sem" value = "1" required <?php echo $satu?>>Sem 1 &nbsp;
				  <input type="radio" name="sem" value = "2" required <?php echo $dua?>>Sem 2 &nbsp;&nbsp;
				  <input type="radio" name="sem" value = "3" required <?php echo $tiga?>>Sem 3</td>
                </tr>
                <tr>
                  <td align="center" width="30%">Session</td>
				  <td><input type="radio" name="session" value = "2017/2018" required <?php echo $satuu?>>2017/2018 &nbsp;<br>
				  <input type="radio" name="session" value = "2018/2019" required <?php echo $duaa?>>2018/2019 &nbsp;<br>
				  <input type="radio" name="session" value = "2019/2020" required <?php echo $tigaa?>>2019/2020 &nbsp;<br>
				  <input type="radio" name="session" value = "2020/2021" required <?php echo $empatt?>>2020/2021 &nbsp;<br>
				  <input type="radio" name="session" value = "2021/2022" required <?php echo $limaa?>>2021/2022 &nbsp;<br>
				  <input type="radio" name="session" value = "2022/2023" required <?php echo $enamm?>>2022/2023 &nbsp;<br>
				  <input type="radio" name="session" value = "2023/2024" required <?php echo $tigaa?>>2023/2024</td>
                </tr>
				<tr>
                  <td align="center" width="30%">Date Received</td>
                  <td><input class="Minput2" type="date" name="dReceived" value="<?php echo $data["dateReceived"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Date Returned</td>
                  <td><input class="Minput2" type="date" name="dReturned" value="<?php echo $data["dateReturned"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Total Bag</td>
                  <td><input class="Minput2" type="text" name="totalBag" value="<?php echo $data["totalBag"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Other Item</td>
                  <td><input class="Minput2" type="text" name="otheritems" value="<?php echo $data["otherItem"];?>"required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Description</td>
                  <td><input class="Minput2" type="text" name="desc" value="<?php echo $data["otherItem"];?>"required></td>
                </tr>
				<td></td><td></td>
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
      </div>
  </body>
</html>
