<?php

require "database.php";

class updatedb {

    private $db;


    public function __construct()
    {
        $this->db = new database();

    }

    

    public function updatestation($getStationID,$getStationName,$getPoints,$getUser,$getStationAdress,$getInfo) {

        // get DB-Entry USER
        $getUserIDFromDB = $this->db->getRows("SELECT userid from userdb WHERE username like ?",array($getUser));
        
        
        $userID = $getUserIDFromDB[0]['userid'];

        
        // update DB-Entry Station
        $updateStation = $this->db->updateRow("UPDATE station SET stationname = ?, points = ?, userid = ?,
        stationadress = ?, information = ? WHERE stationid = ?",
        array($getStationName,$getPoints,$userID,$getStationAdress,$getInfo,$getStationID));


        // back to site
        header("location:../view/station.php?success=true");
    

}

    public function updateuser($getUserID,$getUserName,$getUserPassword,$getRole){

        
          // check if new password, than hashen
    
            $getpasswordhashdb = $this->db->getRows("SELECT userpassword FROM userdb WHERE userid like ?",array($getUserID));
            if($getUserPassword !== $getpasswordhashdb[0]['userpassword']) {
            $getUserPassword = md5($getUserPassword);
            }

        // get Role ID 
            $getRoleID = $this->db->getRows("SELECT roleid FROM role WHERE rolename like ?",array($getRole));

            $roleID = $getRoleID[0]['roleid'];
            
          

        // update row
            
            $updateUser = $this->db->updateRow("UPDATE userdb SET username = ?, 
            userpassword = ?, roleid = ? WHERE userid = ?",
            array($getUserName,$getUserPassword,$roleID,$getUserID));



        // back to site
            header("location:../view/user.php?success=true"); 

            
        }
   
}

?>