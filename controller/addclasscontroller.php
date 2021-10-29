<?php

require "../model/insertdb.php";

// get Data from Form
$getClass = $_POST['class'];
$getNumberOfStudents = $_POST['numberofstudents'];


if(empty($getClass) || empty($getNumberOfStudents)) {

       // back to site
       header("location:../view/addclass.php?empty=true"); 

} else {


$insertStudents = new insertdb();

$insertStudents->addclass($getClass,$getNumberOfStudents);

}

?>