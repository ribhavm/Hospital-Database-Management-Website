<?php
    $con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');
    $hospitalName = urldecode($_POST['hospitals']);
    $sql = "SELECT * from PATIENT WHERE Patient_ID IN (SELECT Patient_ID from PATIENT_RECORD WHERE Doctor_ID IN (SELECT Doctor_ID from DOCTOR WHERE Dept_ID IN (SELECT Dept_ID from DEPARTMENT WHERE Hospital_ID=(SELECT Hospital_ID from HOSPITAL WHERE Hospital_Name='$hospitalName'))))";
    $patient_list = mysqli_query($con, $sql);
    ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="button_styles.css">
    <title><?php echo "Patients at $hospitalName"?></title>
    <style>
    td, th {
        border: 1px solid #777;
        padding: 0.5rem;
        text-align: center;
    }
 
    table {
        border-collapse: collapse;
    }
 
    tbody tr:nth-child(odd) {
        background: #eee;
    }
    caption {
        font-size: 0.8rem;
    }
    </style>
</head>
<body>
    <h1 align="center">
    <?php echo "Welcome to ".$hospitalName;?>
    </h1>
<table align ="center" border="0" style="width:100%">
    <tr>
     <th>   
    <form id="departmentForm" method="post" action="department_page.php">
        <input type="hidden" name="hospitals" id="hospitals" value="<?php echo $hospitalName?>">
        <input type="submit" name="Submit" id="departmentSubmit" value="Departments" class="button3">
    </form>
     </th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id="doctorForm" method="post" action="doctor_page.php">
    <input type="hidden" name="hospitals" id="hospitals" value="<?php echo $hospitalName?>">
        <input type="submit" name="Submit" id="doctorSubmit" value="Doctors" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id=insertRecordForm method=post action=insert_record.html target="_blank">
        <input type=submit name=Submit id=insertRecordBtn value="New Patient Record" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id=insertDepartmentForm method=post action=insert_department.html target="_blank">
        <input type=submit name=Submit id=insertDepartmentBtn value="New Department" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id=insertDoctorForm method=post action=insert_doctor.html target="_blank">
        <input type=submit name=Submit id=insertDoctorBtn value="New Doctor" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id=insertPatientForm method=post action=insert_patient.html target="_blank">
        <input type=submit name=Submit id=insertPatientBtn value="Register Patient" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id=changeHospitalForm method=post action=hospital_page.php>
        <input type=submit name=Submit id=changeHospitalBtn value="Change Hospital Branch" class="button3">
    </form>
</th>
</tr>
</table>  
    <div style="padding:2px;">
    </div>    
    <br><br>
    <table align = "center">
        <caption style="text-align:top; font-size:30px;font-weight: bold">PATIENTS</caption>
        <tr>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Phone No.</th>
        <th>Alternate Phone No.</th>
        <th>Register Date</th> 
        <th>Patient Record</th>
        <th>Profile Image</th>
        </tr>
        <?php while($row = mysqli_fetch_array($patient_list, MYSQLI_ASSOC)){
            $patientID=$row['Patient_ID'];
            $patientName=$row['Patient_Name'];
        ?>
            <tr>
            <td> <?php echo $patientID ?></td>
            <td> <?php echo $patientName ?></td>
            <td> <?php echo $row['Phone_No'] ?></td>
            <td> <?php echo $row['Alt_Phone_No'] ?></td> 
            <td> <?php echo $row['Register_Date'] ?></td>
            <td> <?php echo "<form id=recordForm method=post action=patient_record_page.php target=\"_blank\">
                                <input type=hidden name=patientID id=patientID value=$patientID>
                                <input type=hidden name=patientName id=patientName value=\"$patientName\">
                                <input type=submit name=Submit id=recordSubmit value=\"Show Record\">
                            </form>";?></td>
            <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Patient_Image']).'" border=3 height=100 alt="Profile Photo"/>';?></td>          
            </tr>           
        <?php }?>
    </table>
</body>
</html>