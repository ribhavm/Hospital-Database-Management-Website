<?php
    $con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');
    $hospitalName = urldecode($_POST['hospitals']);
    $sql = "SELECT * from DEPARTMENT WHERE Hospital_ID=(SELECT Hospital_ID from HOSPITAL WHERE Hospital_Name='$hospitalName');";
    $dept_data = mysqli_query($con, $sql);
    ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="button_styles.css">
    <title><?php echo "Departments at $hospitalName"?></title>
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
    <form id="doctorForm" method="post" action="doctor_page.php">
        <input type="hidden" name="hospitals" id="hospitals" value="<?php echo $hospitalName?>">
        <input type="submit" name="Submit" id="Submit" value="Doctors" class="button3">
    </form>
</th>
    <div style="padding:2px;">
    </div>
    <th>
    <form id="transactionForm" method="post" action="patient_page.php">
    <input type="hidden" name="hospitals" id="hospitals" value="<?php echo $hospitalName?>">
        <input type="submit" name="Submit" id="Submit" value="Patients" class="button3">
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
    <table align ="center">
        <caption style="text-align:top; font-size:30px;font-weight: bold">DEPARTMENTS</caption>
        <tr>
        <th>Department ID</th>
        <th>Department Name</th>
        <th>Hospital ID</th>
        <th>HOD ID</th>
        <th>HOD Name</th>
        <th>Patient Count</th>
        </tr>
        <?php while($row = mysqli_fetch_array($dept_data, MYSQLI_ASSOC)){
            $HODID=$row['HOD_ID'];
            $HODNameQuery="SELECT Doctor_Name from DOCTOR WHERE Doctor_ID=$HODID";
            $HODName = mysqli_fetch_array(mysqli_query($con, $HODNameQuery))['Doctor_Name'];
        ?>
            <tr>
            <td> <?php echo $row['Dept_ID'] ?></td>
            <td> <?php echo $row['Dept_Name'] ?></td>
            <td> <?php echo $row['Hospital_ID'] ?></td>
            <td> <?php echo $HODID ?></td>
            <td> <?php echo $HODName ?></td>
            <td> <?php echo $row['Patient_Count'] ?></td>
            </tr>           
        <?php }?>
    </table>
</body>
</html>