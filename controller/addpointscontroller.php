
<?php

require '../Model/insertdb.php';



// get Data from Form
$getStudent = $_POST['student'];
$getStation = $_POST['station'];

if(empty($getStudent) || empty($getStation)) {


          // back to site
          header("location:../view/awardpoints.php?empty=true"); 

} else {
         
         
   $insertPointsforStudent = new insertdb();
         
   $insertPointsforStudent->addPoints($getStudent,$getStation);
         
}
         


?>