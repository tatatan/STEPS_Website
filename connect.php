<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'steps';

$connect= mysqli_connect($servername,$username,$password,$database);
$connect->set_charset("utf8");
if(mysqli_connect_error($connect))
{
		echo 'Failed to connect';
}

?>
