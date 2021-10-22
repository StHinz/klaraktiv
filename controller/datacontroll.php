
<?php

require '../Model/database.php';

$db =  new Database();


$getAllattendees= $db->getRows("SELECT student.studentid, studentnumber, classname, SUM(points) AS points, studentstatus FROM student LEFT JOIN class ON student.classid = class.classid LEFT JOIN 
student_station ON student.studentid = student_station.studentid LEFT JOIN station ON student_station.stationid = station.stationid
GROUP BY student.studentid;");

$getAllstations = $db->getRows("SELECT * FROM station");

$getBestClass = $db->getRows("SELECT classname, SUM(points) as summe FROM class JOIN student ON class.classid = student.classid JOIN student_station 
ON student.studentid = student_station.studentid JOIN station ON station.stationid = student_station.stationid
GROUP BY 1 ORDER BY summe DESC LIMIT 5;")


?>
