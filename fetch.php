<?php
//fetch.php

// ni maksudnya bila kau dah tekan dropdown tu dia akan
// cari sendiri 2nd dropdown kau.. 
// * $_POST["action"] * sini jangan ubah apa2
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "store");
 $output = '';
 
 // sini kau start ubah..
 // sama dengan file sebelah id select yang first
 if($_POST["action"] == "room")
 {
// ni statemnet kau nak select untuk 2nd drop down tu..
  $query = "SELECT lockerid,lockername FROM locker WHERE status = 'Available' AND roomid = '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select locker</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["lockerid"].'">'.$row["lockername"].'</option>';
  }
 }

 echo $output;
}
?>