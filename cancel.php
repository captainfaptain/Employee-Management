<?php

include("process/dbh.php");

$id = $_GET['id'];
$token = $_GET['token'];

$result = mysqli_query($conn, "UPDATE `employee_leave` SET `status`='Cancelled' WHERE `id`=$id and `token` = $token");

header("Location:empleave.php");
?>