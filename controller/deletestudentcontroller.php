
<?php

require '../Model/deletedb.php';
require './selectcontroller.php';
require '../session.inc.php';




// get Data from Form
$getStudent = $_POST['student'];
$getPassword =$_POST['password'];


// Get Student and Password from DB
$selectquery = new selectcontroller();
$getStudentID = $selectquery->getSingleStudent($getStudent);
$getPasswordHash = $selectquery->getPasswordFromUser($username);



// delete students from contest and studenttable

if(empty($getStudent) || empty($getPassword)) {

    header('Location:../view/system.php?empty=true');

} else {

if(md5($getPassword) == $getPasswordHash[0]['userpassword']) {  
    $deleteStudentsComplete = new deletedb();

    foreach($getStudentID as $row) {
        $deleteStudentsComplete->deleteAttennde($row['studentid']);
        $deleteStudentsComplete->deletestudent($row['studentid']);
    
    }

} else {

    header('Location:../view/system.php?password=true');
}
}
?>