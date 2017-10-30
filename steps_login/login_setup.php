<?php
include 'connect.php';

$query = "CREATE TABLE members(member_id INT(6) NOT NULL AUTO_INCREMENT,

email VARCHAR(100) NOT NULL,
password VARCHAR(50) NOT NULL,
team int(5) NOT NULL,
gender int(2) NOT NULL,
namethai VARCHAR(50) NOT NULL,
nameeng VARCHAR(50) NOT NULL,
nickname VARCHAR(50) NOT NULL,
studentid VARCHAR(20) NOT NULL,
faculty VARCHAR(60) NOT NULL,
major VARCHAR(80) NOT NULL,
birthday DATE NOT NULL,
tel VARCHAR(20) NOT NULL,
line_id VARCHAR(50) NOT NULL,
facebook VARCHAR(100) NOT NULL,
fbid VARCHAR(50),
address VARCHAR(200) NOT NULL,
allergic VARCHAR(100) NOT NULL,
congenital_disease VARCHAR(100) NOT NULL,
contact_member  VARCHAR(100) NOT NULL,
activity_outsidestep VARCHAR(100) NOT NULL,
color_prefer VARCHAR(50) NOT NULL,
interest VARCHAR(100) NOT NULL,
knowingstep_from VARCHAR(100) NOT NULL,
PRIMARY KEY(member_id))";

$query2= "CREATE TABLE team(team_id INT(4) NOT NULL, name VARCHAR(40) NOT NULL)";

 mysqli_query($connect,$query);
 mysqli_query($connect,$query2);


?>