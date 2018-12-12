<!DOCTYPE html>
<html>
	    <link rel="stylesheet" href="style.css" type="text/css" />
<table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <tr width="100%"><h2><font color="#8B008B"> UTeM STUDENT CENTRE STORE MANAGEMENT SYSTEM</font></h2></tr>
	<br>
	<tr></tr>
	<tr>
	<td width="0%" align="center"><a href="main.php" class="menu">User</a> 
	<td width="0%" align="center"><a href="cp.php" class="menu">Change password</a>&nbsp; 
	<td width="0%" align="center"><a href="room_locker.php" class="menu">room & locker</a>
	<div class = "dropdown">
		<a href="searchstudent.php" class="dropbtn">Manage Student</a>
			<div class="dropdown-content">
				<a href="searchstudent.php" class="menu">Search</a>
				<a href="list.php" class="menu">List</a>
			</div>
	</div><td><td><td>
	<div class = "dropdown">
		<a href="listItem.php" class="dropbtn">Student Items</a>
			<div class="dropdown-content">
				<a href="listItem.php" class="menu">List</a>
			</div>
	</div>
	&nbsp;
	<td width="0%" align="center"><a href="report.php" class="menu">report</a></td>
	<td width="0%" align="center"><a href="pie.php" class="menu">Chart</a></td>
    <td width="0%" align="center"><a href="logout.php" class="menu" onClick="return confirm('Are You Sure?')">Logout</a></td>
	</tr>
</table>
</html>