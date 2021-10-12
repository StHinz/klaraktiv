DROP DATABASE IF EXISTS klaraktiv;
CREATE DATABASE IF NOT EXISTS klaraktiv;

use klaraktiv;

CREATE TABLE IF NOT EXISTS role (
roleid int auto_increment PRIMARY KEY,
rolename varchar(45)
);

insert into  role VALUES(1,"admin"),(2,"lehrer"),(3,"schueler"); 

CREATE TABLE IF NOT EXISTS user (
userid INT auto_increment PRIMARY KEY,
username varchar(12),
userpassword varchar(255),
roleid int,
FOREIGN KEY(roleid) REFERENCES role(roleid)
);

insert into  user VALUES(NULL,"teacheradmin", MD5("test"),1),(NULL,"teacher", MD5("test"),2); 

CREATE TABLE IF NOT EXISTS class (
classid int auto_increment PRIMARY KEY,
classname varchar(10)
);

INSERT INTO class VALUES(1,"12FI1");


CREATE TABLE IF NOT EXISTS student (
studentid INT auto_increment PRIMARY KEY,
studentnumber varchar(12) unique,
classid int,
roleid int,
FOREIGN KEY(classid) REFERENCES class(classid),
FOREIGN KEY(roleid) REFERENCES role(roleiD)
);

INSERT INTO student VALUES(1,"761134",1,3);
INSERT INTO student VALUES(2,"543329",1,3);

CREATE TABLE IF NOT EXISTS station (
stationid int auto_increment PRIMARY KEY,
stationname varchar(100),
points int(3)
);

INSERT INTO station VALUES(1,"Fussball",2);
INSERT INTO station VALUES(2,"Badminton",1);
INSERT INTO station VALUES(3,"Bublesoccer",3);

CREATE TABLE IF NOT EXISTS student_station (
student_station_id int auto_increment PRIMARY KEY,
studentid int,
stationid int,
stationtime timestamp,
FOREIGN KEY (studentid) REFERENCES student(studentid),
FOREIGN KEY (stationid) REFERENCES station(stationid)
);

INSERT INTO student_station VALUES(1,1,1,now());
INSERT INTO student_station VALUES(2,1,2,now());
INSERT INTO student_station VALUES(3,1,3,now());
INSERT INTO student_station VALUES(null,2,3,now());


Select * from class;

SELECT * from student;

DELETE FROM Student;