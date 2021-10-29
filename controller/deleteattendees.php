
<?php

require '../Model/deletedb.php';

$db =  new Database();

// get Data from Form
$getStudentid = $_POST['studentid'];

// delete student

$deletstudent = new deletedb();
$deletstudent->deletestudent($getStudentid);

?>