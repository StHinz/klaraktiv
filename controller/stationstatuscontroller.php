
<?php

require '../Model/database.php';

$db =  new Database();

// get Stationstatus From DB 

$getStationStatusFromDB = $db->getRows("SELECT stationstatus FROM station WHERE stationid > 0");


// update status 

if($getStationStatusFromDB[0]['stationstatus'] == 1) {

$updateStatus = $db->updateRow("UPDATE station SET stationstatus = 0 WHERE stationid > 0;");

} else {
    $updateStatus = $db->updateRow("UPDATE station SET stationstatus = 1 WHERE stationid > 0;");
}

// back to site
header("location:../view/system.php");

?>