
<?php

require '../Model/database.php';

$db =  new Database();

$getallRows = $db->getRows("
SELECT student.studentid, studentnumber, classname, SUM(points) AS points FROM student JOIN class ON student.classid = class.classid JOIN 
student_station ON student.studentid = student_station.studentid JOIN station ON student_station.stationid = station.stationid
GROUP BY student.studentid;");
?>
