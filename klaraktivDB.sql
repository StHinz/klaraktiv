DROP DATABASE IF EXISTS klaraktiv;
CREATE DATABASE IF NOT EXISTS klaraktiv;

use klaraktiv;

CREATE TABLE IF NOT EXISTS role (
roleid int auto_increment PRIMARY KEY,
rolename varchar(45)
);

insert into  role VALUES(1,"Superadmin"),(2,"Admin"),(3,"Lehrer"),(4,"Schueler"); 

CREATE TABLE IF NOT EXISTS userdb (
userid INT auto_increment PRIMARY KEY,
username varchar(12),
userpassword varchar(255),
roleid int,
FOREIGN KEY(roleid) REFERENCES role(roleid)
);

insert into  userdb VALUES(NULL,"SHinz", MD5("thx1138#2022"),1), (NULL,"BHoffmann", MD5("kos1138"),1), (NULL,"teacheradmin", MD5("test"),2),(NULL,"teacher1", MD5("test"),3)
,(NULL,"teacher2", MD5("test"),3); 

CREATE TABLE IF NOT EXISTS class (
classid int auto_increment PRIMARY KEY,
classname varchar(10)
);

INSERT INTO class VALUES(1,"12FI1");


CREATE TABLE IF NOT EXISTS student (
studentid INT auto_increment PRIMARY KEY,
studentnumber varchar(12) unique,
studentstatus tinyint,
classid int,
roleid int,
FOREIGN KEY(classid) REFERENCES class(classid),
FOREIGN KEY(roleid) REFERENCES role(roleiD)
);

INSERT INTO student VALUES(1,"761134",1,1,4);
INSERT INTO student VALUES(2,"543329",1,1,4);

CREATE TABLE IF NOT EXISTS station (
stationid int auto_increment PRIMARY KEY,
stationname varchar(100),
stationadress varchar(100),
points int(3),
information text,
stationstatus tinyint,
userid int,
FOREIGN KEY (userid) REFERENCES userdb(userid)
);

INSERT INTO station VALUES(1,"Fussball","s.Oliver-Arena",2,"Hier stehte eine Information",1,3);


CREATE TABLE IF NOT EXISTS student_station (
student_station_id int auto_increment PRIMARY KEY,
studentid int,
stationid int,
stationtime timestamp,
FOREIGN KEY (studentid) REFERENCES student(studentid),
FOREIGN KEY (stationid) REFERENCES station(stationid)
);

INSERT INTO student_station VALUES(NULL,1,1,now());
INSERT INTO student_station VALUES(null,2,1,now());




