
<?php

require '../Model/insertdb.php';



// get Data from Form
$getStation = $_POST['station'];
$getPoints = $_POST['points'];
$getUser = $_POST['user'];
$getAdress = $_POST['adress'];


if(empty($getStation) || empty($getPoints) || empty($getUser)) {

     // back to site
     header("location:../view/addstation.php?empty=true"); 

} else {


    $insterstation =  new insertdb();
    $insterstation->addstation($getStation,$getPoints,$getUser,$getAdress);

}



?>