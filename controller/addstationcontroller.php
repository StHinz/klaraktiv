
<?php

require '../Model/insertdb.php';



// get Data from Form
$getStation = $_POST['station'];
$getPoints = $_POST['points'];


if(empty($getStation) || empty($getPoints)) {

     // back to site
     header("location:../view/addstation.php?empty=true"); 

} else {


    $insterstation =  new insertdb();
    $insterstation->addstation($getStation,$getPoints);

}



?>