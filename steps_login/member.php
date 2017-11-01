<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<head><title> steps member </title></head>
<div class='container'>

<?php

    $query_team = "SELECT team_id,name FROM team;";
    $result_team = $connect->query($query_team);

    while ($row_team=$result_team->fetch_assoc()){
    $query = "SELECT studentid, nickname,nameeng  FROM members WHERE team=". $row_team['team_id'];
    $result = $connect->query($query);
    echo "<h4 class='text-primary'>".$row_team['name']."</h4>";

    if ($result){
        echo "<TABLE class='table-condensed text-muted' ><TR><TD> student id </t></TD><TD>nickname</TD><TD>name</TD></TR>";
        while ($row = $result->fetch_assoc()){
            $studentid = $row['studentid'];
            $nickname = $row['nickname'];
            $nameeng = $row['nameeng']; 
            echo "<TR><TD>$studentid </TD><TD>$nickname</TD><TD>$nameeng</TD>
            <TD><a href=\"memberinfo.php?id=$studentid\" data-toggle=\"tooltip\" title = \"more info\">
                more info
            </a></TD></TR>";

        }  
        echo "</TABLE><br />";
    }}
?>
