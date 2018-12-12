<?php
//fetch.php

// ni maksudnya bila kau dah tekan dropdown tu dia akan
// cari sendiri 2nd dropdown kau.. 
// ** $_POST["action"] ** sini jangan ubah apa2
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "dummy2");
 $output = '';
 
 // sini kau start ubah..
 // sama dengan file sebelah id select yang first
 if($_POST["action"] == "country")
 {
// ni statemnet kau nak select untuk 2nd drop down tu..
  $query = "SELECT airportid,airportname FROM airport WHERE airportid != '".$_POST["query"]."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select asd</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["airportid"].'">'.$row["airportname"].'</option>';
  }
 }

 echo $output;
}
?>