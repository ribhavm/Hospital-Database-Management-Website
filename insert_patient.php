<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$patientName = $_POST['patientName'];
$phone = $_POST['phone'];
$altPhone = $_POST['altPhone'];
if(file_exists($_FILES["patientIMG"]["tmp_name"])){
    $patientIMG = addslashes(file_get_contents($_FILES["patientIMG"]["tmp_name"]));
}
else{
	$patientIMG=NULL;
}
$registerDate = $_POST['registerDate'];

// database insert SQL code
$sql = "INSERT INTO `PATIENT` (`Patient_Name`, `Phone_No`, `Alt_Phone_No`, `Patient_Image`, `Register_Date`) VALUES ('$patientName', '$phone', '$altPhone', '$patientIMG', '$registerDate')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "New Patient Added";
}
mysqli_close($con);
?>