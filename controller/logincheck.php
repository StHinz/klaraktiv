<?php

require_once "../model/database.php";

try{
$db = new database();
$username = $_POST['username'];
$password = $_POST['password'];
$role = $db->getRows("SELECT rolename FROM role WHERE roleid = (SELECT roleid from user WHERE username like '$username')");
$countrow  = $db->countRows("Select userid FROM user WHERE username like '$username'");
$getPasswordHash = $db->getRows("SELECT userpassword FROM user WHERE username like '$username'");

// password check decrypt

if($countrow > 0 
&& md5($password) == $getPasswordHash[0]['userpassword'])

{
//start session and save username
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['role'] = $role[0]['rolename'];

//location to main-site
header('Location:../view/main.php');
}

//Die Login-Seite wird mit der Information, dass Login abgewiesen wurde, erneut aufgerufen
else
{
    header('Location:../index.php?abgewiesen=true');
} 
} catch(Exception $e) {

    echo $e->getMessage();
}

?>