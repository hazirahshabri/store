<?php

include "connection.php";
session_start();

$sql1 = "select count(gender) as amount, gender 
         from student 
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
		// Load google charts
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() 
		{
		  var data = google.visualization.arrayToDataTable([
		  ['Task', 'Hours per Day'],
		  ['Work', 8],
		  ['Eat', 2],
		  ['TV', 4],
		  ['Gym', 2],
		  ['Sleep', 8]
		]);

		  // Optional; add a title and set the width and height of the chart
		  var options = {'title':'Average using locker and room by gender', 'width':550, 'height':400};

		  // Display the chart inside the <div> element with id="piechart"
		  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		  chart.draw(data, options);
		}
		</script>
          
      </head>  
      <body>  
           <br /><br />  
           <div style="width:500px;">  
                <h1 align="center">Percentage orders by gender</h1>  
                <br />  
                <div id="piechart" style="width: 950px; height: 700px;"></div>  
           </div>  
      </body>  
 </html>
 
 
 
 <br></br>
                <tr>
				  <form action="main.php" method= ""> 
				  <td   align = 'center' width = '30%' cellpadding = "0" cellspacing = '0' border = '1'><input class = "Lbtn" type = "submit" name = "submit" value = "Back"></td>
				  </form>
				</tr>
				
				<br></br>
				<tr>
			    <form action="main.php" method= ""> 

					<td align ='center' width = '30%' cellpadding = "0" cellspacing = '0' border = '1'><input class = "Lbtn" type = "submit" name = "submit" value = "Logout"></td>
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