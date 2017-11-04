<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<head><title> steps member </title></head>
<div class='container'>

<?php

    $query_team = "SELECT TeamID, TeamName FROM Teams;";
    $result_team = $connect->query($query_team);

    while ($row_team=$result_team->fetch_assoc()){
    $query = "SELECT *  FROM Members WHERE TeamID=". $row_team['TeamID'];
    $result = $connect->query($query);
    echo "<h4 class='text-primary'>".$row_team['TeamName']."</h4>";

    if ($result){
        echo "<TABLE class='table-condensed text-muted' ><TR><TD> student id </t></TD><TD>nickname</TD><TD>name</TD></TR>";
        while ($row = $result->fetch_assoc()){
            $studentid = $row['StudentID'];
            $nickname = $row['Nickname'];
            $nameeng = $row['NameEng']; 
            echo "<TR><TD>$studentid </TD><TD>$nickname</TD><TD>$nameeng</TD>
            <TD><a href=\"page/memberinfo.php?id=$studentid\" data-toggle=\"tooltip\" title = \"more info\">
                more info
            </a></TD></TR>";

        }  
        echo "</TABLE><br />";
    }}
?>
