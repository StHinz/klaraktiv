
<?php

require '../model/insertdb.php';



// get Data from Form
$getUserName = $_POST['username'];
$getPassword = $_POST['password'];
$getRoleName = $_POST['rolename'];

if(empty($getUserName) || empty($getPassword) || empty($getRoleName)) {

     // back to site
     header("location:../view/adduser.php?empty=true"); 

} else {


    $insterstation =  new insertdb();
    $insterstation->addUser($getUserName,$getPassword,$getRoleName);

}



?>