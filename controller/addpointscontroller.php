
<?php

require '../model/insertdb.php';
require './selectcontroller.php';

// get Status from DB

$select = new selectcontroller();
$getStationStatus = $select->getStationStatus();

// get Data from Form
$getStudent = $_POST['student'];
$getStation = $_POST['station'];

// check if fields are empty 

if(empty($getStudent) || empty($getStation)) {


          // back to site
          header("location:../view/awardpoints.php?empty=true"); 

} else {
         
   if($getStationStatus[0]['stationstatus'] == 0) { 
      
      // back to site
      header("location:../view/awardpoints.php?stationstatus=true"); 

   } else {

   $insertPointsforStudent = new insertdb();
         
   $insertPointsforStudent->addPoints($getStudent,$getStation);
         
   }
}
         


?>