<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<div class='container'>

<?php

    $query_team = "SELECT team_id,name FROM team;";
    $result_team = $connect->query($query_team);
    $row_team = $result_team->fetch_assoc();

    while ($row_team){
    $query = "SELECT studentid, nickname,nameeng  FROM members WHERE team=". $row_team['team_id'];
    $result = $connect->query($query);
    echo "<h4 class='text-important'>".$row_team['name']."</h4>";

    if ($result != NULL){
        echo "<TABLE class='text-muted'><TR><TD> student id </TD><TD>nickname</TD><TD>name</TD></TR>";
        while ($row = $result->fetch_assoc()){
            $studentid = $row['studentid'];
            $nickname = $row['nickname'];
            $nameeng = $row['nameeng']; 
            echo "<TR><TD>$studentid</TD><TD>$nickname</TD><TD>$nameeng</TD></TR>";

        }  
        echo "</TABLE>";
    }}
?>