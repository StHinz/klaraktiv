DROP DATABASE IF EXISTS klaraktiv;
CREATE DATABASE IF NOT EXISTS klaraktiv;

use klaraktiv;

CREATE TABLE IF NOT EXISTS role (
roleid int auto_increment PRIMARY KEY,
rolename varchar(45)
);

insert into  role VALUES(NULL,"admin"),(NULL,"lehrer"),(NULL,"schueler"); 

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

CREATE TABLE IF NOT EXISTS student (
studentid INT auto_increment PRIMARY KEY,
studentnumber varchar(12),
classid int,
roleid int,
FOREIGN KEY(classid) REFERENCES class(classid),
FOREIGN KEY(roleid) REFERENCES role(roleiD)
);

CREATE TABLE IF NOT EXISTS station (
stationid int auto_increment PRIMARY KEY,
stationname varchar(100),
points int(3)
);

CREATE TABLE IF NOT EXISTS student_station (
student_station_id int auto_increment PRIMARY KEY,
studentid int,
stationid int,
stationtime timestamp,
FOREIGN KEY (studentid) REFERENCES student(studentid),
FOREIGN KEY (stationid) REFERENCES station(stationid)
);

Select * from role;
