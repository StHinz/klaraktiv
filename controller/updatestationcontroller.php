
<?php

require '/xampp/htdocs/klaraktiv/model/updatedb.php';



// get Data from Form
$getStationID = $_POST['stationid'];
$getStationName = $_POST['stationname'];
$getPoints = $_POST['points'];

$updatestation = new updatedb();

$updatestation->updatestation($getStationID,$getStationName,$getPoints);



?>