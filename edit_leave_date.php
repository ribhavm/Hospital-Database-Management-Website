<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$doctorID = $_POST['doctorID'];
$leaveDate = $_POST['leaveDate'];

// database insert SQL code
$sql = "UPDATE DOCTOR SET Leave_Date = '$leaveDate' WHERE Doctor_ID='$doctorID';";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Leave Date Added";
}
mysqli_close($con);
?>