
<?php


require "../model/database.php";

class deletedb {
    
    private $db;


    public function __construct()
    {
        $this->db = new database();

    }

    public function deletestudent($getStudentid) {
        try {
            $deletstudent = $this->db->updateRow("DELETE FROM student WHERE studentID like '$getStudentid'");
            
            // back to site
            header("location:../view/attendees.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/attendees.php?abgewiesen=true');
            
            }

    }

    public function deleteUSer($getUserID) {

        try {
            $deleteUser = $this->db->updateRow("DELETE FROM USER WHERE userid like '$getUserID'");
            
            // back to site
            header("location:../view/user.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/user.php?abgewiesen=true');
            
            }
    }
   
    public function deletestation($getStationID) {

        try {
            $deletestation = $this->db->updateRow("DELETE FROM Station WHERE stationid like '$getStationID'");
            
            // back to site
            header("location:../view/station.php?delete=true");
            } catch (Exception $e) {
                
                header('Location:../view/station.php?abgewiesen=true');
            
            }

    }
}

?>