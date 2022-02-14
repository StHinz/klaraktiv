
<?php

require '../model/deletedb.php';
require './selectcontroller.php';
require '../session.inc.php';

// get Password to verify
$getPassword = $_POST['password'];


//Password from DV
$selectquery = new selectcontroller();
$getPasswordHash = $selectquery->getPasswordFromUser($username);


if(md5($getPassword) == $getPasswordHash[0]['userpassword']) {

$deleteAll = new deletedb();

$deleteAll->deleteAll();

} else {

    header('Location:../view/system.php?password=true');


}



?>