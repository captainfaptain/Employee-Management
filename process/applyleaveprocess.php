<?php

require_once ('dbh.php');

$id = $_GET['id'];

$reason = $_POST['reason'];

$comment = $_POST['comment']; 

$start = $_POST['start'];

$end = $_POST['end'];

$sql = "INSERT INTO `employee_leave`(`id`,`token`, `start`, `end`, `reason`, `comment`, `status`) VALUES ('$id','','$start','$end','$reason', '$comment','Pending')";

$result = mysqli_query($conn, $sql);

header("Location:..//eloginwel.php?id=$id");
?>