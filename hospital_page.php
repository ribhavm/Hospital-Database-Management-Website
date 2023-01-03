<!DOCTYPE html>
<html>
<head>
    <title>Hospital Database System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<!-- <body align='center'>   -->
 <body align='center'>   
    <?php
    $con = mysqli_connect('localhost', 'ribhav', 'ribhav','HOSPITAL_DATABASE');

    $sql = "SELECT DISTINCT Hospital_Name from HOSPITAL";
    $hospital_list = mysqli_query($con, $sql);
    ?>
    <h1 align='center'>
        HOSPITAL MANAGEMENT SYSTEM
    </h1>
    <div class="data">
        <br></br>
    <label for="hospitals" class="button" id="button4">Select Hospital Branch: </label>
    <select form="hospitalForm" name="hospitals" id="hospitals" class="button3">
        <?php while($row = mysqli_fetch_array($hospital_list, MYSQLI_ASSOC)){
        $hospital=$row['Hospital_Name'];
        ?>
        <option value=<?php echo urlencode($hospital) ?>><?php echo $hospital ?></option>    
    <?php }  ?>
    </select>
    <br></br>
    <form id="hospitalForm" method="post" action="department_page.php">
        <input type="submit" name="Submit" id="Submit" value="Submit" class="button3">
    </form>

    <div style="padding:2px;">
    </div>
    
    <form id=insertHospitalForm method=post action=insert_hospital.html target="_blank">
        <input type=submit name=Submit id=insertHospitalBtn value="New Hospital Branch" class="button3">
    </form>
    <br></br>
    </div>
    <br></br>
    
    
    <div id="example1">
               
    </div>
    <h2 align='center'>
        A project by students of Indian Institute of Technology Jodhpur
    </h2>
</body>
</html>