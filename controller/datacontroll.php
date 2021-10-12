
<?php

require '../Model/database.php';

$db =  new Database();



$getAllattendees= $db->getRows("SELECT student.studentid, studentnumber, classname, SUM(points) AS points FROM student LEFT JOIN class ON student.classid = class.classid LEFT JOIN 
student_station ON student.studentid = student_station.studentid LEFT JOIN station ON student_station.stationid = station.stationid
GROUP BY student.studentid;");

$getAllstations = $db->getRows("SELECT * FROM station");



?>
