<?php
require_once ('process/dbh.php');
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

<div class="panel-heading">
    <h2 style="text-align: center;">Date wise Attendance</h2>

</div>
<div class="panel-body">
    <div class="p-t-10">
	    <a class="btn btn--radius btn--green" style=" margin-Left: 60px" href="attendance.php">Back</a>
    </div><br>
<form method="post">
<table class="table">
    <thead>
        <tr>
            <th>Serial Number</th>
            <th>Date</th>
            <th>View</th>
        </tr>
    </thead>

    <?php
    $query="select distinct date from attendance";
    $result=$conn->query($query);

    if($result->num_rows>0){
        $i=0;
        while($val=$result->fetch_assoc()){
        $i++;
        
    ?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $val['date']; ?></td>
    <td><a href="viewreport.php?date=<?php echo $val['date'] ?>" class="btn btn--radius btn--green">View </a></td>
</tr>
<?php } } ?>

</div>
<div class="panel-footer">
</div>
</div>
</body>
</html>