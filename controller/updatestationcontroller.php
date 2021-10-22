
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStationID = $_POST['stationid'];
$getStationName = $_POST['stationname'];
$getPoints = $_POST['points'];


// update DB-Entry Station
$updateStation = $db->updateRow("UPDATE station SET stationname 
= '$getStationName', points = '$getPoints' WHERE stationid = '$getStationID'");

// back to site
header("location:../view/station.php?success=true");



?>