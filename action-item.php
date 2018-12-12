<?php
session_start();
if(!isset($_SESSION["LoggedIn"]) || $_SESSION["LoggedIn"] !== true)
{
	header("location: index.php");
	exit;
}
include "connection.php";

$semester = $_POST["sem"];   		//Yang belah kiri amik value belah kanan 
$sesi = $_POST["session"]; 			//based on html kita
$dateReceive = $_POST["dReceived"];
$dateReturn = $_POST["dReturned"];
$quantity = $_POST["totalBag"];
$item = $_POST["otheritems"];
$description = $_POST["desc"];
$lockerNo = $_POST["lockerId"];
$staffNo = $_POST["staffid"];
$matricNo = $_POST['studentId'];

if($dateReceive < $dateReturn)
{
		$check = "SELECT * FROM storedetail WHERE studentID='$matricNo' AND semester='$semester' AND sessions='$sesi'";
		$checkresult  = mysqli_query($conn,$check) or die (mysqli_error($conn));

		if(mysqli_num_rows($checkresult)>0)
		{	
			echo "<script>alert('Locker and room has been taken for this semester and session!');</script>";
			echo "<meta http-equiv='refresh' content='0; url= item.php?studentId=$matricNo'/>";		
		}

		else
		{
			$sql        = "INSERT INTO storedetail (lockerID,studentID,semester,sessions,totalPayment,checkout) 
						   VALUES ('$lockerNo','$matricNo','$semester','$sesi','$quantity'*15,'No')";
			$sqlresult  = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	
			if($sqlresult)
			{
				$sql2     	= 'SELECT max(storeID) AS "storeID" FROM storedetail';
				$sqlresult2 = mysqli_query($conn,$sql2);
			}
	
				$storeid    = mysqli_fetch_assoc($sqlresult2);
				$storeNo    = $storeid['storeID'];
		 
				$sql3       ="INSERT INTO item (storeID,totalBag,otherItem,description) 
							  VALUES ('$storeNo','$quantity','$item','$description')";
				$sqlresult3 = mysqli_query($conn,$sql3);
		
					$sql4       ="INSERT INTO management (staffID,storeID,dateReceived,dateReturned) 
								  VALUES ('$staffNo','$storeNo','$dateReceive','$dateReturn')";	
					$sqlresult4 = mysqli_query($conn,$sql4);

						$sql5       ="UPDATE locker SET status = 'Not Available' WHERE lockerID = '$lockerNo'";			  
						$sqlresult5 = mysqli_query($conn,$sql5);
				
								echo "<script>alert('Insert Student Item Success!');</script>";
								echo "<meta http-equiv='refresh' content='0; url= payment.php'/>";
		}
}
else
	{
		if($dateReceive < $dateReturn)
		{
			echo "<script>alert('Date Receive cannot higher than Date Returne!');</script>";
			echo "<meta http-equiv='refresh' content='0; url= item.php'/>";
		}
		
	}
?>