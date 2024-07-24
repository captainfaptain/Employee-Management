<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `attendance` where empid = '$id'";
	$result = mysqli_query($conn, $sql);
	
?>

<html>
<head>
	<title>Employee Panel | My Attendance | Artisan Aid</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>Artisan Aid</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
                <li><a class="homered" href="empattend.php?id=<?php echo $id?>"">My Attendance</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homeblack" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div id="divimg">

		<table>
			<tr>

				<th align = "center">Employee Id</th>
				<th align = "center">Date</th>
				<th align = "center">Status</th>

			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

					echo "<tr>";
					echo "<td>".$employee['empid']."</td>";
					echo "<td>".$employee['date']."</td>";
					echo "<td>".$employee['value']."</td>";

				}

			?>
		</table>
</body>
</html>