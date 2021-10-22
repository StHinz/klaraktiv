
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStation = $_POST['station'];
$getPoints = $_POST['points'];

// get DB-Entry
$stationGetFromDB = $db->getRows("SELECT stationid FROM station WHERE stationname like '$$getStation'");


// Check if Class exists, if not insert in DB
if(empty($stationGetFromDB)) {

    $insertStation = $db->insertRow("INSERT INTO station VALUES(NULL,'$getStation','$getPoints')");
    
    // back to site
    header("location:../view/station.php?success=true");
    
} else {

    header('Location:../view/addstation.php?abgewiesen=true');

}





?>