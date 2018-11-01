<?php
session_start();
include "connection.php";

if(isset($_POST['register']))
{
	$staffid =$_POST['staffid'];
	$name =$_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
	$password =$_POST['password'];
	$comfirmPassword =$_POST['password2']; 
 	
    if($password==$comfirmPassword)
    {
        $sql="INSERT INTO staff(staffID, staffName, phoneNo, email, password, comfirmPassword)VALUES ('$staffid','$name','$phone','$email','$password','$comfirmPassword')";
        $execute = mysqli_query($conn,$sql) or die (mysqli_error($conn));
			if(mysqli_num_rows($execute)>0)
            {
                echo "<script>alert('Register Fail!);</script>";
				echo "<meta http-equiv='refresh' content='0; url=register.php'/>";

            }else
				{
					if($execute)
				{
					echo "<script>alert('Register Success!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=index.php'/>";

				}else
				{
					echo "<script>alert('Register Fail!);</script>";
					echo "<meta http-equiv='refresh' content='0; url=register.php'/>";
				}
            }
			
           
    }else
    {
        echo "<script>alert('Password not match');</script>";
	}
}
?>