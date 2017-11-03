<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<div class='container'>

<?php

    if(isset($_GET['id'])){
    $studentid = $_GET['id'];
    $query = sprintf("SELECT studentid, nickname, nameeng, major,team, email, facebook,tel FROM members WHERE studentid=$studentid");
    $result = $connect->query($query);


    if ($result != NULL){
        
        

        
        while ($row = $result->fetch_assoc()){
            $studentid = $row['studentid'];
            $nickname = $row['nickname'];
            $nameeng = $row['nameeng']; 
            $team_id = $row['team'];
            $email = $row['email'];
            $facebook = $row['facebook'];
            $tel = $row['tel'];
            $major = $row['major'];

           //check team name :: hey why don't everyone fix their team name LOL 
            $query_team = "SELECT name FROM team WHERE team_id=$team_id;";
            $result_team = $connect->query($query_team);
            $row_team = $result_team->fetch_assoc();
            $team = "";
            
            if ($result_team!=NULL){
                $team = $row_team['name'];
            }

            echo "<h4 class='text-primary'> $nameeng </h4>
            <h5 class='text-primary'> Member Info </h5>
            
            <TABLE class='table text-muted'>
            <TR><TD> Student id</TD><TD>:  $studentid</TD></TR>
            <TR><TD> Nickname</TD><TD>:  $nickname</TD></TR>
            <TR><TD> Name </TD><TD>:  $nameeng</TD></TR>
            <TR><TD> Major </TD><TD>: $major </TD></TR>
            <TR><TD> Team </TD><TD>:  $team</TD></TR></TABLE>
            <br />
            <h5 class='text-primary'> Contact </h5>
            <TABLE class='table text-muted'>
            <TR><TD> Email </TD><TD>:  $email</TD></TR>
            <TR><TD> Facebook </TD><TD>:  $facebook</TD></TR>
            <TR><TD> Tel </TD><TD>:   $tel </TD></TR></TABLE><BR />";
            

        }  
    }}
?>