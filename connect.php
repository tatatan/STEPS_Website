<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'step';

$connect= mysqli_connect($servername,$username,$password,$database);
 
if(mysqli_connect_error($connect))
{
		echo 'Failed to connect';
}
 
?>