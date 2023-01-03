<?php

$con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

// get the post records
$patientID = $_POST['patientID'];
$doctorID = $_POST['doctorID'];
$prescriptionIMG = addslashes(file_get_contents($_FILES["prescriptionIMG"]["tmp_name"]));

if(file_exists($_FILES["testsIMG"]["tmp_name"])){
    $testsIMG = addslashes(file_get_contents($_FILES["testsIMG"]["tmp_name"]));
}
else{
	$testsIMG=NULL;
}

$payment = $_POST['payment'];
$consultationDate = $_POST['consultationDate'];

$chkDocQuery="SELECT COUNT(Doctor_ID) AS cnt FROM `PATIENT_RECORD` WHERE Doctor_ID=$doctorID AND Patient_ID=$patientID;";
$chkDoc = mysqli_fetch_array(mysqli_query($con, $chkDocQuery), MYSQLI_ASSOC)['cnt'];
if($chkDoc==0){
	$incPatCntDoc="UPDATE DOCTOR SET Patient_Count = Patient_Count + 1 WHERE Doctor_ID=$doctorID;";
	$incPatCntDocR = mysqli_query($con, $incPatCntDoc);
	$getDeptQuery="SELECT Dept_ID FROM `DEPARTMENT` WHERE Dept_ID=(SELECT Dept_ID FROM DOCTOR WHERE Doctor_ID=$doctorID);";
	$dept = mysqli_fetch_array(mysqli_query($con, $getDeptQuery), MYSQLI_ASSOC)['Dept_ID'];
	$chkDeptQuery="SELECT COUNT(*) AS cnt FROM `DOCTOR` D,`PATIENT_RECORD` P WHERE P.Doctor_ID=D.DOCTOR_ID AND D.Dept_ID='$dept' AND P.Patient_ID=$patientID;";
	$chkDept=mysqli_fetch_array(mysqli_query($con, $chkDeptQuery), MYSQLI_ASSOC)['cnt'];
	if($chkDept==0){
		$incPatCntDep="UPDATE DEPARTMENT SET Patient_Count = Patient_Count + 1 WHERE Dept_ID='$dept';";
		$incPatCntDepR = mysqli_query($con, $incPatCntDep);
	}
}
// database insert SQL code
$sql = "INSERT INTO `PATIENT_RECORD` (`Patient_ID`, `Doctor_ID`, `Prescription_IMG`, `Tests_IMG`, `Payment`, `Consultation_Date`) VALUES ('$patientID', '$doctorID', '$prescriptionIMG', '$testsIMG', '$payment', '$consultationDate')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Record Inserted";
}
mysqli_close($con);
?>