<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$hospitalName = $_POST['hospitalName'];
$hospitalAddress = $_POST['hospitalLocation'];

// database insert SQL code
$sql = "INSERT INTO `HOSPITAL` (`Hospital_Name`, `Hospital_Location`) VALUES ('$hospitalName', '$hospitalAddress')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "New Hospital Branch Created";
}
mysqli_close($con);
?>