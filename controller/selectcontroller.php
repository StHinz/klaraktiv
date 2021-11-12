<?php

require "../model/database.php";

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

        $bestClass = $this->db->getRows("SELECT class.classname, sum(Points)/count(distinct student_station.studentid) as summe from student_station 
        JOIN station ON student_station.stationid = station.stationid
        JOIN student ON student_station.studentid = student.studentid
        JOIN class ON student.classid = class.classid
        WHERE student.studentstatus = 1
        group by student.classid ORDER BY summe ASC LIMIT 5;");

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

        $bestStudents = $this->db->getRows("SELECT studentnumber, SUM(points) AS summe FROM student JOIN student_station 
        ON student.studentid = student_station.studentid JOIN station ON station.stationid = student_station.stationid
        WHERE student.studentstatus = 1
        GROUP BY 1 ORDER BY summe ASC LIMIT 5;");

        foreach($bestStudents as $row) {        
            /* Push the results in our array */
                $point = array("label" =>  $row['studentnumber'] ,"y" =>  $row['summe']);
                array_push($data_points_students, $point);
        }

        // return array best students
        return $data_points_students;

    }

    public function getAllStations() {

        $allStations = $this->db->getRows("SELECT stationid, stationname, points, username FROM station JOIN user ON user.userid = station.userid");
    
        return $allStations;
    
    }

    public function getSingelStation($stationid) {

        $singleStation = $this->db->getRows("SELECT stationid, stationname, points, username FROM station 
        join user on user.userid = station.userid WHERE stationid = '$stationid'");

        return $singleStation;

    } 
       
    public function getAllUsers() {
    
        $allUsers = $this->db->getRows("SELECT user.userid, username, userpassword, rolename, stationname FROM user JOIN role ON user.roleid = role.roleid
        JOIN station ON user.userid = station.userid WHERE rolename NOT LIKE 'Superadmin'");

        return $allUsers;
    
    
    }

    public function getSingleUser($userid) {

        $singleUser = $this->db->getRows("SELECT userid, username, userpassword, rolename FROM user JOIN role ON user.roleid = role.roleid WHERE userid = '$userid'");
    
        return $singleUser;
    }

    public function getAllRoles() {

        $allRoles = $this->db->getRows("SELECT * FROM role WHERE rolename NOT LIKE 'Superadmin' AND rolename NOT LIKE 'Schueler'");
    
        return $allRoles;
    }

    public function getUserTeacher(){

        $userTeacher = $this->db->getRows("SELECT userid, username FROM user join role 
        ON role.roleid = user.roleid WHERE(rolename like 'Lehrer' OR rolename like 'Admin' OR rolename) AND userID not IN (
        SELECT user.userid from user JOIN station 
        ON user.userid = station.userid);");

        return $userTeacher;

    }

    public function getStationfromUser($username){

        $stationfromuser = $this->db->getRows("SELECT stationid, stationname, points, username FROM station 
        join user on user.userid = station.userid WHERE username like '$username'");

        return $stationfromuser;
    }

}

?> 