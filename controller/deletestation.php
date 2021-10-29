
<?php

require '../Model/deletedb.php';


// get Data from Form
$getStationID = $_POST['stationid'];

// delete student

    $deletestation = new deletedb();
    $deletestation->deletestation($getStationID);



?>