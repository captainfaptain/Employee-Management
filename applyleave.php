<?php 
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
?>

<html>
<head>
	<title>Employee Panel | Apply Leave | Artisan Aid</title>
	<link href="css/main.css" rel="stylesheet" media="all">
	<link rel="stylesheet" type="text/css" href="styleapply.css">
</head>
<body>
	
	<header>
		<nav>
			<h1>Artisan Aid</h1>
			<ul id="navli">
				<li><a class="homeblack" href="eloginwel.php?id=<?php echo $id?>"">HOME</a></li>
				<li><a class="homeblack" href="myprofile.php?id=<?php echo $id?>"">My Profile</a></li>
				<li><a class="homeblack" href="empattend.php?id=<?php echo $id?>"">My Attendance</a></li>
				<li><a class="homeblack" href="empproject.php?id=<?php echo $id?>"">My Projects</a></li>
				<li><a class="homered" href="applyleave.php?id=<?php echo $id?>"">Apply Leave</a></li>
				<li><a class="homeblack" href="elogin.html" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
			</ul>
		</nav>
	</header>
	 
	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="process/applyleaveprocess.php?id=<?php echo $id?>" method="POST">
					
					<p>Reason</p><br>
                        <div class="input-group">
						<div class="rs-select2 js-select-simple select--no-search" >
                                <select name="reason" >
                                    <option disabled="disabled" selected="selected">Leave Type</option>
                                    <option value="Casual Leave">Casual Leave</option>
                                    <option value="Half-day Leave">Half-day Leave</option>
                                    <option value="One-day Leave">One-day Leave</option>
									<option value="Earned/Vacation/Privilege Leave">Earned/Vacation/Privilege Leave</option>
									<option value="Sick Leave/Medical Leave">Sick Leave/Medical Leave</option>
									<option value="Marriage leave">Marriage leave</option>
									<option value="Maternity Leave">Maternity Leave</option>
									<option value="Sabbatical Leave">Sabbatical Leave</option>
									<option value="Bereavement leave">Bereavement leave</option>
                                </select>
                            <div class="select-dropdown"></div>
                        </div>
                        </div>
						<div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Comment" name="comment">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name="start"  required="required">
                                   
                                </div>
                            </div>
                            <div class="col-2">
                            	<p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end"  required="required">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
		<br>

	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Leave Type</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			<?php

				$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.comment, employee_leave.status From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";
				$result = mysqli_query($conn, $sql);
				while ($employee = mysqli_fetch_assoc($result)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['comment']."</td>";
					echo "<td>".$employee['status']."</td>";
				}

			?>

		</table>
			
</body>
</html>