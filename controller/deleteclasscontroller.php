
<?php

require '../Model/deletedb.php';
require './selectcontroller.php';


// get Data from Form
$getClass = $_POST['class'];

// get All Students from Class

$selectquery = new selectcontroller ();
$getStudentID = $selectquery->getStudentsfromClass($getClass);


// delete students from contest and class

    $deleteStudentsComplete = new deletedb();
    $deleteStudentsComplete->deleteAttennde($getStudentID);
    $deleteStudentsComplete->deletestudent($getStudentID);

    $deleteclass = new deletedb();
    $deleteclass->deleteclass($getClassID);

?>