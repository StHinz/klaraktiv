<?php

require "database.php";

class insertdb {

    private $db;


    public function __construct()
    {
        $this->db = new database();

    }


    public function addclass($getClass, $numberofstudents) {

        $getClassFromDB = $this->db->getRows("SELECT classid FROM class WHERE classname like '$getClass'");

        if(empty($getClassFromDB)) {

            $insertClass = $this->db->updateRow("INSERT INTO class VALUES(NULL,'$getClass')");
            $getClassFromDB = $this->db->getRows("SELECT classid FROM class WHERE classname like '$getClass'");
        } 

         //Insert Students 
        for ($i=1; $i <= $numberofstudents; $i++) {

            // studentnumber-Algorithem

                $genStudentNumber = rand(111111,999999);
                $classID = $getClassFromDB[0]['classid'];
                $insertStudent = $this->db->updateRow("INSERT INTO student VALUES (NULL,'$genStudentNumber',1,'$classID',4)");
        
                
        // back to site
        header("location:../view/attendees.php?success=true"); 
        }
    }


    public function addstation($getStation,$getPoints,$getUser,$getAdress,$getInfo) {

        // get DB-Entry StationID
        $stationGetFromDB = $this->db->getRows("SELECT stationid FROM station WHERE stationname like '$getStation'");

        // get DB-Entry UserID
        $userGetFromDB = $this->db->getRows("SELECT * from user WHERE username like '$getUser'");
        $userID = $userGetFromDB[0]['userid'];

    

        // Check if Class exists, if not insert in DB
        if(empty($stationGetFromDB)) {

        $insertStation = $this->db->updateRow("INSERT INTO station VALUES(NULL,'$getStation','$getAdress','$getPoints','$getInfo','$userID')");
    
            // back to site
         header("location:../view/station.php?success=true"); 
    
        } else {

            header('Location:../view/addstation.php?abgewiesen=true');

        } 

    }

    public function addPoints($getStudent, $getStation) {

        $getStudentFromDB = $this->db->countRows("SELECT studentid FROM student WHERE studentnumber like '$getStudent'");
        $getStudentIDFromDB = $this->db->getRows("SELECT studentid FROM student WHERE studentnumber like '$getStudent'");
        $getStationIDFromDB = $this->db->getRows("SELECT stationid FROM station WHERE stationname like '$getStation'");
        $getStatusFromDB = $this->db->getRows("SELECT studentstatus FROM student WHERE studentnumber like '$getStudent'");

        // Check if Student exists
        if($getStudentFromDB == 0) {

            header('Location:../view/awardpoints.php?abgewiesen=true');
 
        } else {
 
            if($getStatusFromDB[0]['studentstatus'] == 1) {
 
                // Insert Points for student 
                $studentid = $getStudentIDFromDB[0]['studentid'];
                $stationid = $getStationIDFromDB[0]['stationid']; 
 
                $insertPointsStudent = $this->db->updateRow("INSERT INTO student_station VALUES (NULL,'$studentid','$stationid',now())");
 
 
            // back to site
            header("location:../view/awardpoints.php?success=true");
 
 
            } else {
 
                    header('Location:../view/awardpoints.php?status=false');
 
                    } 
                }

    }


    public function addUser($getUser,$getPassword,$getRole) {
        
        // get DB-Entry
        $userGetFromDB = $this->db->countRows("SELECT * from user WHERE username like '$getUser'");

        if($userGetFromDB > 0) {
                   // back to site
         header("location:../view/adduser.php?abgewiesen=true");
    

        } else {

        $getRoleID = $this->db->getRows("SELECT * FROM role WHERE rolename like '$getRole'");
        $roleID = $getRoleID[0]['roleid'];
        $insertUser = $this->db->updateRow("INSERT INTO  user VALUES(NULL,'$getUser', md5('$getPassword'),'$roleID')");

        header("location:../view/user.php?success=true");

        }
        
        

    }
}

?>