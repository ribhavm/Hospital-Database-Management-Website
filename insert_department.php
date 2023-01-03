<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$deptName = $_POST['deptName'];
$hospitalID = $_POST['hospitalID'];
$HOD_ID = $_POST['HOD_ID'];
$deptID = $deptName.$hospitalID;
$patientCount = 0;

// database insert SQL code
$sql = "INSERT INTO `department` (`Dept_ID`, `Dept_Name`, `Hospital_ID`, `HOD_ID`, `Patient_Count`) VALUES ('$deptID', '$deptName', '$hospitalID', '$HOD_ID', '$patientCount')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "New Department Created";
}
mysqli_close($con);
?>