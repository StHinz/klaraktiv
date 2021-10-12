
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getClass = $_POST['class'];
$getNumberOfStudents = $_POST['numberofstudents'];

// get DB-Entry
$classGet = $db->getRows("SELECT classid FROM class WHERE classname like '$getClass'");


// Check if Class exists, if not insert in DB
if(empty($classGet)) {

    $insertClass = $db->insertRow("INSERT INTO class VALUES(NULL,'$getClass')");
    $classGet = $db->getRows("SELECT classid FROM class WHERE classname like '$getClass'");
    
} 


// Insert Students 

for ($i=1; $i <= $getNumberOfStudents; $i++) {

    // studentnumber-Algorithem

    $genStudentNumber = rand(111111,999999);
    $classID = $classGet[0]['classid'];
    
    $insertStudent = $db->insertRow("INSERT INTO student VALUES (NULL,'$genStudentNumber','$classID',3)");

}


// back to site
header("location:../view/attendees.php");

?>