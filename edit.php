<?php

require_once ('process/dbh.php');
$sql = "SELECT * FROM `employee` WHERE 1";

$result = mysqli_query($conn, $sql);
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$joindate = mysqli_real_escape_string($conn, $_POST['joindate']);
	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
	
$result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`joindate`='$joindate',`address`='$address',`dept`='$dept',`designation`='$designation', `salary`='$salary' WHERE id=$id");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");

}
?>

<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
	while($res = mysqli_fetch_assoc($result)){
	$firstname = $res['firstName'];
	$lastname = $res['lastName'];
	$email = $res['email'];
	$contact = $res['contact'];
	$address = $res['address'];
	$gender = $res['gender'];
	$birthday = $res['birthday'];
	$joindate = $res['joindate'];
	$dept = $res['dept'];
	$designation = $res['designation'];
    $salary = $res['salary'];
	
}
}

?>

<html>
<head>
	<title>View Employee |  Admin Panel | Artisan Aid</title>
    <link href="main.css" rel="stylesheet" media="all">
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
	
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id = "registration" action="edit.php" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="First Name"  name="firstName" value="<?php echo $firstname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Last Name"  name="lastName" value="<?php echo $lastname;?>">
                                </div>
                            </div>
                        </div>
                        
                        <p>Email</p>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" value="<?php echo $email;?>">
                        </div>
                        <p>Birthday</p>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" name="birthday" value="<?php echo $birthday;?>">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="gender" value="<?php echo $gender;?>">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Contact</p>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" value="<?php echo $contact;?>">
                        </div>
                        <p>Joining Date</p>
                        <div class="input-group">
                            <input class="input--style-1" type="date" name="joindate" value="<?php echo $joindate;?>">
                        </div>
                        <p>Address</p>
                         <div class="input-group">
                            <input class="input--style-1" type="text"  placeholder="Address"  name="address" value="<?php echo $address;?>">
                        </div>
                        <p>Department</p>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  placeholder="Department" name="dept" value="<?php echo $dept;?>">
                        </div>
                        <p>Designation</p>
                        <div class="input-group">
                            <input class="input--style-1" type="text"  placeholder="Designation" name="designation" value="<?php echo $designation;?>">
                        </div>
                        <p>Salary</p>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Salary" name="salary" value="<?php echo $salary;?>">
                        </div>

                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
