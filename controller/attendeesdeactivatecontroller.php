
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStudent = $_POST['studentid'];
$getStatusFromDB = $db->getRows("SELECT studentstatus FROM student WHERE studentid like '$getStudent'");


// update status 

if($getStatusFromDB[0]['studentstatus'] == 1) {

$updateStatus = $db->updateRow("UPDATE student SET studentstatus = 0 WHERE studentid like '$getStudent' ");

} else {
    $updateStatus = $db->updateRow("UPDATE student SET studentstatus = 1 WHERE studentid like '$getStudent' ");
}

// back to site
header("location:../view/attendees.php");

?>