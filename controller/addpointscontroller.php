
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStudent = $_POST['student'];
$getStation = $_POST['station'];

$getStudentFromDB = $db->countRows("SELECT studentid FROM student WHERE studentnumber like '$getStudent'");
$getStudentIDFromDB = $db->getRows("SELECT studentid FROM student WHERE studentnumber like '$getStudent'");
$getStationIDFromDB = $db->getRows("SELECT stationid FROM station WHERE stationname like '$getStation'");
$getStatusFromDB = $db->getRows("SELECT studentstatus FROM student WHERE studentnumber like '$getStudent'");


// Check if Student exists
if($getStudentFromDB == 0) {

   header('Location:../view/awardpoints.php?abgewiesen=true');

} else {

if($getStatusFromDB[0]['studentstatus'] == 1) {

// Insert Points for student 
$studentid = $getStudentIDFromDB[0]['studentid'];
$stationid = $getStationIDFromDB[0]['stationid']; 

$insertPointsStudent = $db->insertRow("INSERT INTO student_station VALUES (NULL,'$studentid','$stationid',now())");


// back to site
header("location:../view/awardpoints.php?success=true");


} else {

   header('Location:../view/awardpoints.php?status=false');

} }

?>