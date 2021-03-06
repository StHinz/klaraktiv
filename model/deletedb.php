
<?php


require_once "../model/database.php";

class deletedb {
    
    private $db;


    public function __construct()
    {
        $this->db = new database();

    }

    public function deletestudent($getStudentid) {
        try {
            $deletstudent = $this->db->updateRow("DELETE FROM student WHERE studentID like ?",
        array($getStudentid));

            
            
            //back to site
            header("location:../view/attendees.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/attendees.php?abgewiesen=true');
            
            } 

    }

    public function deleteUSer($getUserID) {

        try {
            $deleteUser = $this->db->updateRow("DELETE FROM userdb WHERE userid like ?",
        array($getUserID));
            
            
            // back to site
            header("location:../view/user.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/user.php?abgewiesen=true');
            
            }
    }
   
    public function deletestation($getStationID) {

        try {
            $deletestation = $this->db->updateRow("DELETE FROM station WHERE stationid like ?",
        array($getStationID));
            
            // back to site
            header("location:../view/station.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/station.php?abgewiesen=true');
            
            }

    }

    public function deleteclass($getClass) {
        try {
            $deleteclass = $this->db->updateRow("DELETE FROM class WHERE classname like ?",
        array($getClass));
            
            // back to site
            header("location:../view/system.php?success=true");
            } catch (Exception $e) {
                
                header('Location:../view/system.php?abgewiesen=true');
            
            }

    }

    public function deleteAttennde($getStudentid) {
        try {
        $deletStudentFromContest = $this->db->updateRow("DELETE FROM student_station WHERE studentid like ?",
            array($getStudentid));
            
            // back to site
            header("location:../view/system.php?success=true");
            } catch (Exception $e) {
                
                header('Location:../view/system.php?abgewiesen=true');
            
            }

    }
    
    public function deleteAll() {
        try {
            $deleteAtteende = $this->db->updateRow("DELETE FROM student_station WHERE student_station_id >= 0");
        
            

            $deletstudent = $this->db->updateRow("DELETE FROM student WHERE studentid >0 ");

           

            $deleteClass = $this->db->updateRow("DELETE FROM class WHERE classid >0");

            

            $deleteStation = $this->db->updateRow("DELETE FROM station WHERE stationid >0");

           
            // back to site
            header("location:../view/system.php?deleteall=true");

            } catch (Exception $e) {
                
                header('Location:../view/system.php?abgewiesen=true');
            
            } 

    }
    
}

?>