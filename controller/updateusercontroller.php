
<?php

require '../model/updatedb.php';



// get Data from Form
$getUserId = $_POST['userid'];
$getUserName = $_POST['username'];
$getUserPassword = $_POST['password'];
$getUserRole = $_POST['rolename'];

$updateUser = new updatedb();

$updateUser->updateuser($getUserId,$getUserName,$getUserPassword,$getUserRole); 



?>