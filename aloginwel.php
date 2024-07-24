<?php 
require_once ('process/dbh.php');
$sql = "SELECT id, firstName, lastName FROM employee  order by employee.id";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
	<title>Admin Panel | Artisan Aid</title>
	<link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>Artisan Aid</h1>
			<ul id="navli">
				<li><a class="homered" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="attendance.php">Attendance</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">

		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Employees</h2>
    	<table class="table">
			<tr bgcolor="#000">
				<th align = "center">Serial No.</th>
				<th align = "center">Employee ID</th>
				<th align = "center">Name</th>
			</tr>

			<?php
				$seq = 1;
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$seq."</td>";
					echo "<td>".$employee['id']."</td>";
					
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					$seq+=1;
				}

			?>

		</table>
	
	</div>
</body>
</html>