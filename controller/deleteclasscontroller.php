
<?php

require '../Model/deletedb.php';
require './selectcontroller.php';
require '../session.inc.php';



// get Data from Form
$getClass = $_POST['class'];
$getPassword = $_POST['password'];




// get All Students from Class

$selectquery = new selectcontroller ();
$getStudentID = $selectquery->getStudentsfromClass($getClass);
$getPasswordHash = $selectquery->getPasswordFromUser($username);

  

// delete students from contest and class

if(empty($getPassword) || empty($getClass)) {

    header('Location:../view/system.php?empty=true');




} else {

if(md5($getPassword) == $getPasswordHash[0]['userpassword']) {
    $deleteStudentsComplete = new deletedb();

    foreach($getStudentID as $row) {
        $deleteStudentsComplete->deleteAttennde($row['studentid']);
        $deleteStudentsComplete->deletestudent($row['studentid']);
    
    }

    // delete class 

    $deleteclass = new deletedb();
    $deleteclass->deleteclass($getClass);
} else {

    header('Location:../view/system.php?password=true');

}
}


?>