<?php
require_once ('process/dbh.php');
$cur_date = date('d-m-y'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance |  Admin Panel | Artisan Aid</title>
    <link rel="stylesheet" type="text/css" href="styleemplogin.css">
</head>

<body>
    <header>
        <nav>
            <h1>Artisan Aid</h1>
            <ul id="navli">
                <li><a class="homeblack" href="aloginwel.php">HOME</a></li>
                <li><a class="homeblack" href="addemp.php">Add Employee</a></li>
                <li><a class="homeblack" href="viewemp.php">View Employee</a></li>
                <li><a class="homered" href="attendance.php">Attendance</a></li>
                <li><a class="homeblack" href="assign.php">Assign Project</a></li>
                <li><a class="homeblack" href="assignproject.php">Project Status</a></li> 
                <li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
                <li><a class="homeblack" href="alogin.html" onclick="return confirm('Are you sure you want to log out?')">Log Out</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="divider"></div>

<body>
<div class="panel panel-default">
<div class="panel-body">
    <div class="card bg-light text-center mb-3">
        <h3 style="text-align: center;" class="m-0 py-3"><strong>Date</strong>: <?php echo $cur_date; ?></h3>
	</div>

<form method="post">
<table class="table">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Attendance</th>
        </tr>
    </thead>
<tbody>

<?php

$query="SELECT id,firstName,lastName,dept,designation,id FROM employee";
$result=$conn->query($query);
while($show=$result->fetch_assoc()){

?>
    <tr>
        <td><?php echo $show['id'];?></td>
        <td><?php echo $show['firstName'] ." " . $show['lastName'];?></td>
        <td><?php echo $show['dept'];?></td>
        <td><?php echo $show['designation'];?></td>
        <td>
        <input required type="radio" name="attendance[<?php echo $show['id']; ?>]" id="attendance_Present" value="Present" />
        <label for="attendance_Present">Present</label>

        <input required type="radio" name="attendance[<?php echo $show['id']; ?>]" id="attendance_Absent" value="Absent"/>
        <label for="attendance_Absent">Absent</label>
        </td>
    </tr>
    <?php } ?>

</tbody>

<?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $att=$_POST['attendance'];
            $date=date('d-m-y');
            $query="select distinct date from attendance";
            $result=$conn->query($query);
            $b=false;
            if($result->num_rows>0){
            while($check=$result->fetch_assoc()){

                if($date==$check['date']){
                    $b=true;
                    echo "<div class='alert alert-danger>
                    Attendance already taken.;
                    </div>";
                }  
            }
        }
                if(!$b){
                    foreach($att as $key => $value){
                        if($value=="Present"){
                            $query="insert into attendance(value,empid,date) values('Present',$key,'$date')";
                            $insertResult=$conn->query($query);
                        }
                        else{
                            $query="insert into attendance(value,empid,date) values('Absent',$key,'$date')";
                            $insertResult=$conn->query($query);
                        }
                    }

                    if($insertResult){
                        echo "<div class='alert alert-success>
                    Attendance taken successfully.;
                    </div>";
                    }
                }

        }
    
?>
</table>
<br>
<div class="p-t-20">
	<button class="btn btn--radius btn--green" style="float: left; margin-Left: 60px"><a href="view.php" style="text-decoration: none; color: white">View</button>
</div>

<div class="p-t-10">
	<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px">Submit</button>
</div>
</form>
</div>
<div class="panel-footer">
</div>
</body>
</html>