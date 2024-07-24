<?php
require_once ('process/dbh.php');
$sql = "SELECT * from `employee` ORDER BY employee.id asc";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
	<title>View Employee |  Admin Panel | Artisan Aid</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	<header>
		<nav>
			<h1>Artisan Aid</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>
				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homered" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="attendance.php">Attendance</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
			</ul>
		</nav>
	</header>
	
	<div class="divider"></div>
		<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthdate</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact No.</th>
				<th align = "center">Joining Date</th>
				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Designation</th>
				<th align = "center">Salary</th>
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";
					echo "<td>".$employee['joindate']."</td>";
					echo "<td>".$employee['address']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['designation']."</td>";
					echo "<td>".$employee['salary']."</td>";
					echo "<td><a href=\"edit.php?id=$employee[id]\">Edit</a> | <a href=\"delete.php?id=$employee[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

				}
			?>
		</table>
</body>
</html>