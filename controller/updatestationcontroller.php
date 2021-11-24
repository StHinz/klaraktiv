
<?php

require '/xampp/htdocs/klaraktiv/model/updatedb.php';



// get Data from Form
$getStationID = $_POST['stationid'];
$getStationName = $_POST['stationname'];
$getStationadress = $_POST['adress'];
$getPoints = $_POST['points'];
$getUser =$_POST['user'];


if(empty($getUser)){

     // back to site
     header("location:../view/station.php?empty=true");
} else {

$updatestation = new updatedb();

$updatestation->updatestation($getStationID,$getStationName,$getPoints,$getUser,$getStationadress); 

} 

?>