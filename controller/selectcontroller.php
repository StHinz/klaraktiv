<?php

require_once "../model/database.php";

class selectcontroller {

    private $db;

    public function __construct()
    {
        $this->db = new database();
    }

    public function getAllAttendes(){

        $AllAttendees = $this->db->getRows("SELECT student.studentid, studentnumber, classname, SUM(points) AS points, Count(Distinct student_station.stationid) AS stations, studentstatus FROM student LEFT JOIN class ON student.classid = class.classid LEFT JOIN 
        student_station ON student.studentid = student_station.studentid LEFT JOIN station ON student_station.stationid = station.stationid
        GROUP BY student.studentid;");
        
        return $AllAttendees; 

    } 
  
    public function getBestClass(){
       
        $data_points_class = array();

        $bestClass = $this->db->getRows("SELECT class.classname, (sum(Points)/(SELECT count(student.studentid) from student where student.classid = class.classid AND student.studentstatus = 1 )) as summe from student_station 
        JOIN station ON student_station.stationid = station.stationid
        JOIN student ON student_station.studentid = student.studentid
        JOIN class ON student.classid = class.classid
        WHERE student.studentstatus = 1
        group by student.classid
        ORDER BY Summe DESC LIMIT 5;");

         foreach($bestClass as $row) {        
                /* Push the results in our array */
                    $point = array("label" =>  $row['classname'] ,"y" =>  $row['summe']);
                    array_push($data_points_class, $point);
                }

        // return array best class
        return $data_points_class;

    }

    public function getBestStudent() {

        $data_points_students = array();

        $bestStudents = $this->db->getRows("SELECT studentnumber, SUM(points) AS summe, count(student_station.stationid) as diffstation, classname FROM student JOIN student_station 
        ON student.studentid = student_station.studentid JOIN station ON station.stationid = student_station.stationid
        JOIN class ON class.classid = student.classid
        WHERE student.studentstatus = 1
        GROUP BY 1 ORDER BY summe DESC , diffstation DESC LIMIT 5;");

        foreach($bestStudents as $row) {        
            /* Push the results in our array */
                $point = array("label" => ( $row['studentnumber'].' ('.$row['classname']).')' ,"y" =>  $row['summe']);
                array_push($data_points_students, $point);
        }

        // return array best students
        return $data_points_students;

    }

    public function getAllStations() {

        $allStations = $this->db->getRows("SELECT stationid, stationname, stationadress, points, information, stationstatus, username FROM station JOIN userdb ON userdb.userid = station.userid Order By stationname");
    
        return $allStations;
    
    }

    public function getSingelStation($stationid) {

        $singleStation = $this->db->getRows("SELECT stationid, stationname, stationadress, points, information, username FROM station 
        join userdb on userdb.userid = station.userid WHERE stationid = '$stationid'");

        return $singleStation;

    } 
       
    public function getAllUsers() {
    
        $allUsers = $this->db->getRows("SELECT userdb.userid, username, userpassword, rolename, stationname FROM userdb LEFT JOIN role ON userdb.roleid = role.roleid
        Left JOIN station ON userdb.userid = station.userid WHERE rolename NOT LIKE 'Superadmin'");

        return $allUsers;
    
    
    }

    public function getSingleUser($userid) {

        $singleUser = $this->db->getRows("SELECT userid, username, userpassword, rolename FROM userdb JOIN role ON userdb.roleid = role.roleid WHERE userid = '$userid'");
    
        return $singleUser;
    }

    public function getAllRoles() {

        $allRoles = $this->db->getRows("SELECT * FROM role WHERE rolename NOT LIKE 'Superadmin' AND rolename NOT LIKE 'Schueler'");
    
        return $allRoles;
    }

    public function getUserTeacher(){

        $userTeacher = $this->db->getRows("SELECT userid, username FROM userdb join role 
        ON role.roleid = userdb.roleid WHERE(rolename like 'Lehrer' OR rolename like 'Admin' OR rolename) AND userID not IN (
        SELECT userdb.userid from userdb JOIN station 
        ON userdb.userid = station.userid);");

        return $userTeacher;

    }

    public function getStationfromUser($username){

        $stationfromuser = $this->db->getRows("SELECT stationid, stationname, points, information, username FROM station 
        join userdb on userdb.userid = station.userid WHERE username like '$username'");

        return $stationfromuser;
    }

    public function getAllClass () {

        $AllClasses = $this->db->getRows("SELECT * FROM class;");
        return $AllClasses;
    }

    public function getStudentsfromClass ($classname) {

        $allStudentsFromClass = $this->db->getRows("SELECT studentid, studentnumber, classname FROM student JOIN
        class ON class.classid = student.classid WHERE classname like '$classname';");
        return $allStudentsFromClass;
    }

    public function getSingleStudent ($studentnumber) {

        $singleStudent = $this->db->getRows("SELECT studentid, studentnumber, classname FROM student 
        JOIN class ON class.classid = student.classid WHERE studentnumber like '$studentnumber';");
        return $singleStudent;
    }

    public function getPasswordFromUser ($username) {

        $getPasswordHash = $this->db->getRows("SELECT userpassword FROM userdb WHERE username like '$username'");
        return $getPasswordHash;


    }

    public function getStationStatus() {

        $getStationStatus = $this->db->getRows("SELECT stationstatus FROM station");
        return $getStationStatus;

    }
}

?> 