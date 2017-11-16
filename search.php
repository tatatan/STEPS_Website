<?php
include ('navbar.php');
include ('connect.php');
?>

<html>
<head><title> search result </title></head>
<div class='container'>

<h4 class="text-primary"> Search Result </h4>

<?php 
if (isset($_GET['name'])){
    $name = $_GET['name'];
    if ( $name != "" ){
        $name = trim($name); 
        $sql="SELECT StudentID, NameEng, Nickname FROM Members WHERE Nickname LIKE '%$name%'";
        $result = mysqli_query($connect,$sql); 
        if($result){
            echo "<TABLE class='table-condensed text-muted' ><TR><TD> student id </t></TD><TD>nickname</TD><TD>name</TD></TR>";            
            
        while ($row = $result->fetch_assoc()){
            $studentID = $row['StudentID'];
            $name = $row['NameEng'];
            $nickname = $row['Nickname'];
            echo "<TR><TD>$studentID </TD><TD>$nickname</TD><TD>$name</TD>
            <TD><a href=\"memberinfo.php?id=$studentID\" data-toggle=\"tooltip\" title = \"more info\">
                more info
            </a></TD></TR>";
        }
        echo "</table>";
        echo "<br /><p><a href=\"member.php\" class=\"btn btn-info my-2 my-sm-0\"> Go back </a></p>";
    }

    else{
        echo "<h5 class= \"text-warning\"> Please enter some data </h5><br /> <p><a href=\"member.php\" class=\"btn btn-info my-2 my-sm-0\"> Go back </a></p>";
    }
}}

else{
    echo "<p><a href=\"member.php\" class=\"btn btn-info my-2 my-sm-0\"> Go back </a></p>";
    
}

?>