-- Suraj Shrestha (sshrest4@go.olemiss.edu)
-- This script is used for my practice database

--Remove old tables, if they already exist.
DROP TABLE IF EXISTS Emp, Dept;

--Create the new tables

CREATE TABLE Emp(
    EID int PRIMARY KEY,
    ename varchar(50),
    age int,
    salary double,
    deptID int
) Engine=InnoDB;

CREATE TABLE dept (
    deptID int NOT NULL PRIMARY KEY,
    dname varchar(50),
    budget double
) Engine=InnoDB;

insert into Emp values (1,'Suraj Shrestha',23,90000.00,101);
insert into Emp values (2,'Ned Stark',31,60000.00,105);
insert into Emp values (3,'Grand Mayster',60,50000.00,102);
insert into Emp values (4,'John Snow',19,20000.00,104);
insert into Emp values (5,'Samwell Tarly',23,90000.00,103);

insert into dept values (101,'Gaming and Animation',200000.00);
insert into dept values (102,'UI Design Team',100000.00);	
insert into dept values (103,'Java Developers',80000.00);
insert into dept values (104,'Server Programmers',90000.00);
insert into dept values (105,'Psychology Research',20000.00);
insert into dept values (106,'Help and Technical Support',70000.00);
insert into dept values (107,'Database Team',150000.00);