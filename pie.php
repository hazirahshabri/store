<?php

include "connection.php";
session_start();

$sql1 = "select count(gender) as amount, gender 
FROM storedetail, student 
where student.studentID = storedetail.studentID 
and checkout = 'N'
group by gender";

$run1 = mysqli_query($conn,$sql1);

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
        width: 150px;
        height: 85px;
        margin-left:950px;
      }
    </style>
  </head>
  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['gender', 'amount'],  
                          <?php  
                          while($row = mysqli_fetch_array($run1))  
                          {  
                               echo "['".$row["gender"]."', ".$row["amount"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Student Using Locker and Room by Gender',  
                      //is3D:true,  
                      pieHole: 0.0
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div width = "100%" align="center">  
                <h1 align="center">Percentage of Student Using Locker and Room by Gender</h1>  
                <br />  
                <div align="center" id="piechart" style="width: 800px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>
			<br></br>	
                <tr>
				  <form action="main.php" align = "center" method= ""> 
					
				  <td align = "center" width = "30%" cellpadding = "0" cellspacing = '0' border = '1'><input  align = "center" class = "Lbtn4" type = "submit" name = "submit" value = "Back"></td>
				  </form>
				</tr>
			
          <!-- box of footer -->
		  <br></br>
          <div class="footer">
      				&#9400; UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM <br>
					Weekday : 10.00 a.m - 4.00 p.m <br>
					Weekend : 10.00 a.m - 2.00 p.m <br>
					Place : Level 2,UTeM Student Centre 
      	  </div>
      </div>
  </body>
</html>