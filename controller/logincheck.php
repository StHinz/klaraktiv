<?php

require_once "../model/database.php";

$db = new database();

$username = $_POST['username'];
$password = $_POST['password'];
$countrow  = $db->countRows("Select userid FROM user WHERE username like '$username'");
$getPasswordHash = $db->getRows("SELECT userpassword FROM user WHERE username like '$username'");

//echo md5($password)."</br>". $getPasswordHash[0]['userpassword']."</br>".$countrow;
//Login Daten pruefen
// Implementiere Check mit DB-Eintrag


if($countrow > 0 
&& md5($password) == $getPasswordHash[0]['userpassword'])

{
//Eine Session starten und der Name des Users wird gespeichert
session_start();
$_SESSION['username'] = $_POST['username'];

//umleiten auf Hauptseite
header('Location:../view/main.php');
}

//Die Login-Seite wird mit der Information, dass Login abgewiesen wurde, erneut aufgerufen
else
{

   
    header('Location:./index.php?abgewiesen=true');
}

?>