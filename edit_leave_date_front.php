<!DOCTYPE html>
<html>
<head>
    <title>Add Leave Date</title>
</head>
<body>
    <?php
    $doctorID=$_POST['doctorID'];
    ?>
    <form id="leaveDateForm" method="post" action="edit_leave_date.php">
        <input type="hidden" name="doctorID" id="doctorID" value="<?php echo $doctorID?>">
        <p>
            <label for="leaveDate">Leave Date</label>
            <input type="date" name="leaveDate" id="leaveDate">
        </p>
        <input type="submit" name="Submit" id="Submit" value="Submit">
    </form>
</body>
</html>