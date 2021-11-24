<?php

require "database.php";

class updatedb {

    private $db;


    public function __construct()
    {
        $this->db = new database();

    }

    public function updatestation($getStationID,$getStationName,$getPoints,$getUser,$getStationAdress) {

            // get DB-Entry USER
            $getUserIDFromDB = $this->db->getRows("SELECT userid from USER WHERE username like '$getUser'");
            $userID = $getUserIDFromDB[0]['userid'];

            
            // update DB-Entry Station
            $updateStation = $this->db->updateRow("UPDATE station SET stationname = '$getStationName', points = '$getPoints', userid = '$userID',
            stationadress = '$getStationAdress' WHERE stationid = '$getStationID'");

    
            // back to site
            header("location:../view/station.php?success=true");
        

    }

    public function updateuser($getUserID,$getUserName,$getUserPassword,$getRole){

        
          // check if new password, than hashen
    
            $getpasswordhashdb = $this->db->getRows("SELECT userpassword FROM user WHERE userid like '$getUserID'");
            if($getUserPassword !== $getpasswordhashdb[0]['userpassword']) {
            $getUserPassword = md5($getUserPassword);
            }

        // get Role ID 
            $getRoleID = $this->db->getRows("SELECT roleid FROM role WHERE rolename like '$getRole'");

            $roleID = $getRoleID[0]['roleid'];
            
          

        // update row
            
            $updateUser = $this->db->updateRow("UPDATE user SET username = '$getUserName', 
            userpassword = '$getUserPassword', roleid = '$roleID' WHERE userid = '$getUserID'");



        // back to site
            header("location:../view/user.php?success=true"); 

            
        }
   
}

?>