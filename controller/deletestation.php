
<?php

require '../Model/database.php';

$db =  new Database();

// get Data from Form
$getStationID = $_POST['stationid'];

// delete student
try {
$deletstudent = $db->deleteRow("DELETE FROM station WHERE stationid = '$getStationID'");



// back to site
header("location:../view/station.php");

} catch (Exception $e) {
    header('Location:../view/station.php?abgewiesen=true');
}
?>