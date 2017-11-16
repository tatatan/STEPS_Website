<!DOCTYPE html>
<?php 

include ('navbar.php');
include ('connect.php');

 ?>
 <head><title><?php echo $_SESSION['nameeng'];?> </title></head>

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
    <TR>
        <TD> tel  </TD><TD>  :  0<?php echo $_SESSION['tel'];?> </TD></TR>
    </TABLE>
</div>

    

</html>