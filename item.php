<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$room = '';
$query = "SELECT roomid,roomname FROM room";
$result1 = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result1))
{
 $room .= '<option value="'.$row["roomid"].'">'.$row["roomname"].'</option>';
}

$matricNo = $_GET['studentId'];

$sql = "SELECT * FROM storedetail WHERE studentID='$matricNo' AND checkout ='N'";
$query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)>0)
{
	echo "<script>alert('Student must checkout first!');</script>";
	echo "<meta http-equiv='refresh' content='0; url= checkout.php?studentId=$matricNo'/>";		
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Store System</title>
    <link rel="icon" href="Logo/5.jpg" type="image/gif" sizes="16x16">
    <!-- external css -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- internal css -->
    <style media="screen">
      .logo {
        width: 180px;
        height: 80px;
        margin-left: 20px;
      }
    </style>
	    <link rel="stylesheet" href="style.css" type="text/css" />
  </head>
  <body>
    <!-- main box of content -->
      <div class="main">
          <!-- box of header -->
          <div class="headerspecialcase">
			<?php include 'menu.php'; ?>
          </div>
          
          <!-- box of content -->
          <div class="Mcontent4">

            <table align="center" border="0" width="60%" cellpadding="0" cellspacing="0">
              <td><hr></td>
			  <td width="40%" align="center"><h2><p><img src="logo/register.png" alt="icon register" width="42" height="42" align="middle" hspace="20"><font color="#8B008B">Manage student Items</font></h2></td>
              <td><hr></td>
            </table>
				<!-- Manage student items Content -->
			  <form action="action-item.php" method="post">
              <table align="center" border="0" width="40%" cellpadding="5" cellspacing="0">
			  <input type="hidden" name="studentId" value="<?php echo $matricNo;?>" hidden >
			  
			  <input type="hidden" name= "staffid" value="<?php echo $_SESSION['staffid'];?>" hidden>
				<tr>
                  <td align="center" width="30%">Semester</td>
                  <td>
				  <select class="Minput2" type="text" name="sem" required>
				  <option value="1">Sem 1</option>
				  <option value="2">Sem 2</option>
				  <option value="3">Sem 3</option>
				  </select>
				  </td>
				<tr>
				<tr>
                  <td align="center" width="30%">Session</td>
                  <td>
				  <select class="Minput2" type="text" name="session" required>
				  <option>2017/2018</option>
				  <option>2018/2019</option>
				  <option>2019/2020</option>
				  <option>2020/2021</option>
				  <option>2021/2022</option>
				  <option>2022/2023</option>
				  <option>2023/2024</option>
				  </select>
				  </td>
				<tr>
                  <td align="center" width="30%">Date Received</td>
                  <td><input class="Minput2" type="date" name="dReceived" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Date Returned</td>
                  <td><input class="Minput2" type="date" name="dReturned" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Total Bag</td>
                  <td><input class="Minput2" type="number" min="1" max="4" name="totalBag" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Other Item</td>
                  <td><input class="Minput2" type="number" min="0" max="3" name="otheritems" required></td>
                </tr>
				<tr>
                  <td align="center" width="30%">Description</td>
                  <td><input class="Minput2" type="text" name="desc" maxlength="30" ></td>
                </tr>
				<tr>
                  <td width="20%" height="50" align="center">Room</td>
                  <td>
				  <select class="form-control action" type="text" id = "room" name="room" required>
				  <option value ="">Room</option>
				  <?php echo $room; ?>
				  </select>
				  </td>
				</tr>
				<tr>
                  <td width="20%" height="53" align="center">Locker</td>
                  <td>
				  <select class="form-control action" type="text" id = "locker" name="lockerId" required>
				  <option value = "">Locker</option>
				  </select>
				  </td>
				</tr>
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

<script>

$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "room")
   {
    result = 'locker';
   }
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});
</script>