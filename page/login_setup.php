<?php
include 'connect.php';

$query = "CREATE TABLE Teams(TeamID INT(4) NOT NULL, TeamName VARCHAR(40) NOT NULL)";

$query2= "CREATE TABLE Members(MemberID INT(6) NOT NULL AUTO_INCREMENT,
Email VARCHAR(100) NOT NULL,
Password VARCHAR(50) NOT NULL,
Team int(5) NOT NULL,
Gender int(2) NOT NULL,
NameThai VARCHAR(50) NOT NULL,
NameEng VARCHAR(50) NOT NULL,
Nickname VARCHAR(50) NOT NULL,
StudentID VARCHAR(20) NOT NULL,
Faculty VARCHAR(60) NOT NULL,
Major VARCHAR(80) NOT NULL,
Birthday DATE NOT NULL,
Tel VARCHAR(20) NOT NULL,
LineID VARCHAR(50) NOT NULL,
Facebook VARCHAR(100) NOT NULL,
FacebookID VARCHAR(50),
Address VARCHAR(200) NOT NULL,
Allergic VARCHAR(100) NOT NULL,
CongenitalDisease VARCHAR(100) NOT NULL,
ContactMember  VARCHAR(100) NOT NULL,
ActivityOutsideSteps VARCHAR(100) NOT NULL,
ColorPrefer VARCHAR(50) NOT NULL,
Interest VARCHAR(100) NOT NULL,
KnowingStepsFrom VARCHAR(100) NOT NULL,
PRIMARY KEY (MemberID) )";

 mysqli_query($connect,$query);
 mysqli_query($connect,$query2);


?>