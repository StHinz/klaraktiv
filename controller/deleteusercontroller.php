
<?php

require '../model/deletedb.php';

$getUserId = $_POST['userid'];


$deleteuser =  new deletedb();
$deleteuser->deleteUSer($getUserId);


?>