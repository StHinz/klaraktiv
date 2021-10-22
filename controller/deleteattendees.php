
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStudentid = $_POST['studentid'];

// delete student
try {
$deletstudent = $db->deleteRow("DELETE FROM student WHERE studentID like '$getStudentid'");



// back to site
header("location:../view/attendees.php?delete=true");
} catch (Exception $e) {
    
    header('Location:../view/attendees.php?abgewiesen=true');

}
?>