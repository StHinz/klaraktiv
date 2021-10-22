<?php
require_once '../model/database.php';
$db = new Database();


// Best Class
$data_points_class = array();
   
$getBestClass = $db->getRows("SELECT classname, SUM(points) as summe FROM class JOIN student ON class.classid = student.classid JOIN student_station 
ON student.studentid = student_station.studentid JOIN station ON station.stationid = student_station.stationid
GROUP BY 1 ORDER BY summe DESC LIMIT 5;");
 

     foreach($getBestClass as $row)
        {        
      /* Push the results in our array */
            $point = array("label" =>  $row['classname'] ,"y" =>  $row['summe']);
            array_push($data_points_class, $point);
        }

// Best students

$data_points_students = array();
 
$getBestStudents = $db->getRows("SELECT studentnumber, SUM(points) AS summe FROM student JOIN student_station 
ON student.studentid = student_station.studentid JOIN station ON station.stationid = student_station.stationid
WHERE student.studentstatus = 1
GROUP BY 1 ORDER BY summe DESC LIMIT 5;");

foreach($getBestStudents as $row)
        {        
      /* Push the results in our array */
            $point = array("label" =>  $row['studentnumber'] ,"y" =>  $row['summe']);
            array_push($data_points_students, $point);
        }


?>

