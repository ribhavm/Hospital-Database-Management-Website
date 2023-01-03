<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$doctorName = $_POST['doctorName'];
$deptID = $_POST['deptID'];
$workEmail = $_POST['workEmail'];
$phone = $_POST['phone'];
if(file_exists($_FILES["doctorIMG"]["tmp_name"])){
    $doctorIMG = addslashes(file_get_contents($_FILES["doctorIMG"]["tmp_name"]));
}
else{
	$doctorIMG=NULL;
}
$joinDate = $_POST['joinDate'];

// database insert SQL code
$sql = "INSERT INTO `DOCTOR` (`Doctor_Name`, `Dept_ID`, `Work_Email`, `Phone_No`, `Doctor_Image`, `Patient_Count`, `Join_Date`) VALUES ('$doctorName', '$deptID', '$workEmail', '$phone', '$doctorIMG', '0', '$joinDate')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "New Doctor Added";
}
mysqli_close($con);
?>