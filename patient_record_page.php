<?php
    $con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');
    $patientID = urldecode($_POST['patientID']);
    $patientName = urldecode($_POST['patientName']);
    $sql = "SELECT * from PATIENT_RECORD WHERE Patient_ID=$patientID";
    $record_data = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $patientName.'\'s Record'?> </title>
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
    <table align ="center">
        <caption style="text-align:top">Patient Record</caption>
        <tr>
        <th>Record ID</th>
        <th>Patient ID</th>
        <th>Patient Name</th>
        <th>Doctor ID</th>
        <th>Doctor Name</th>
        <th>Prescription</th>
        <th>Tests</th>        
        <th>Payment (Rs.)</th>
        <th>Consultation Date</th>
        </tr>
        <?php while($row = mysqli_fetch_array($record_data, MYSQLI_ASSOC)){
            $doctorID=$row['Doctor_ID'];
            $doctorNameQuery="SELECT Doctor_Name from DOCTOR WHERE Doctor_ID=$doctorID";
            $doctorName = mysqli_fetch_array(mysqli_query($con, $doctorNameQuery))['Doctor_Name'];
        ?>
            <tr>
            <td> <?php echo $row['Record_ID'] ?></td>
            <td> <?php echo $row['Patient_ID'] ?></td>
            <td> <?php echo $patientName ?></td>
            <td> <?php echo $doctorID ?></td>
            <td> <?php echo $doctorName ?></td>
            <td> <?php $data=base64_encode($row['Prescription_IMG']);
                echo "<button type=button  onclick=openimg('data:image/jpeg;base64,$data',\"Prescription\")>Show Prescription</button>";?></td>
            <td> <?php $data=base64_encode($row['Tests_IMG']);
                echo "<button type=button  onclick=openimg('data:image/jpeg;base64,$data',\"Tests\")>Show Tests</button>";?></td>
            <td> <?php echo $row['Payment'] ?></td>    
            <td> <?php echo $row['Consultation_Date'] ?></td>
            
            </tr>           
        <?php }?>
    </table>
</body>
<script>
    function openimg(source,title) {
        var image = new Image();
        image.src = source;

        var w = window.open(name=title);
        w.document.write("<title>"+title+"</title>\n"+image.outerHTML);
    }
    </script>
</html>