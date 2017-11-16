<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<head><title> steps member </title></head>
<div class='container'>


<br />
<form method="get" action="search.php">
    
        <div class="input-group col-xs-6 col-md-4">
            <input type="text" class="form-control" placeholder="Search member nickname..." name="name" id="name">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        
        </div>
        </form>
<br /><br />
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
            <TD><a href=\"memberinfo.php?id=$studentid\" data-toggle=\"tooltip\" title = \"more info\">
                more info
            </a></TD></TR>";

        }
        echo "</TABLE><br />";
    }}
?>
