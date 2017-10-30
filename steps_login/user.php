<!DOCTYPE html>
<?php 

include ('navbar.php');
include ('connect.php');
$team_id = $_SESSION['team'];
 $query_team = "SELECT name FROM team WHERE team_id=$team_id;";
      $result_team = $connect->query($query_team);
      $row_team = $result_team->fetch_assoc();
      $_SESSION['team_name'] = $row_team['name'];

 ?>

<div class='container'>
    
    <h4 class= 'text-primary'> <?php echo $_SESSION['nameeng'];?> </h4>
    <TABLE class= 'text-muted'>
    <TR>
        <TD> student id  </TD><TD>  :  <?php echo $_SESSION['student_id'] ;?> </TD></TR>
    <TR>
        <TD> name  </TD><TD>  :   <?php echo $_SESSION['nameeng'];?> </TD></TR>
    <TR>
        <TD> nickname  </TD><TD>  :   <?php echo $_SESSION['nickname'] ;?> </TD></TR>
    <TR>
        <TD> team  </TD><TD>  :  <?php echo $_SESSION['team_name'];?> </TD></TR>
    <TR>
        <TD> email  </TD><TD>  :  <?php echo $_SESSION['email'];?> </TD></TR>
    </TABLE>
</div>

    

</html>