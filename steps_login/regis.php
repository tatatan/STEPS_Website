<!DOCTYPE html>
<?php 
session_start();
?>
<html lang"en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title> STEPS ! register </title>
    </head>
<nav class="navbar ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Steps</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 

        <!-- link for only-member page /-->
         <?php
         if((isset($_SESSION['fbid']))and(isset($_SESSION['nickname']))){
           echo "<li><a href=\"#\">Page 4</a></li>";
           echo "li><a href=\"#\">Page 5</a><li>";
         }
         ?>
         <!-- link for fuction login/logout and memberpage /-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
      if((isset($_SESSION['facebook_id']))and(isset($_SESSION['nickname']))){          
          echo " <li><a href=\"member.php\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['nickname']."    </a></li>
        <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></li>";
      }
      else{
        echo "<li><a href=\"regis.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
        <li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>";
      } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- registration /-->
<div class="container">
  <h4 class="text-primary"> Register to STEPS website </h4>
  <p class="text-muted"> You should be STEPS staff to register </p>
    <form method = "post" action="regis.php"> 
      <div class="input-group col-xs-6 col-s-4 col-m-4">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="student_id" type="text" class="form-control" name="student_id" placeholder="Student ID">
             <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-log-in"></i>
                </button>
            </div>
            <p> </p>
      </div>
    </form>
</div>

<!-- registeration check and sql -->

<?php
  include 'connect.php';
  if(isset($_POST['student_id'])){

      $student_id = $_POST['student_id'];
      $_SESSION['student_id'] = $student_id;
      $query = "SELECT studentid, nickname,nameeng, team, email, fbid FROM members WHERE studentid=$student_id;";
      $result = $connect->query($query);

      $my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      urlencode($my_url);

      if ($result != NULL){
      $row = $result->fetch_assoc();
      
      $nameeng = $row['nameeng'];
      $nickname = $row['nickname'];
      $team_id = $row['team'];
      $email = $row['email'];

      $query_team = "SELECT name FROM team WHERE team_id=$team_id;";
      $result_team = $connect->query($query_team);
      $row_team = $result_team->fetch_assoc();

      if($row['studentid'] != NULL) {
        echo "<div class=\"container\"> 
                <p></p>
                <p></p>
                <TABLE> 
                <TR>
                <TD> student ID </TD><TD> :  ".$row['studentid']." <TD></TR>
                <TR>
                <TD> name  </TD><TD> :  ". $nameeng."<TD></TR>
                <TR>
                <TD> nickname </TD><TD> :  ".$nickname." <TD></TR>
                <TR>
                <TD> team  </TD><TD>:  ". $row_team['name']." <TD></TR>
                <TR>
                <TD> email  </TD><TD>:  ". $email."<TD></TR></TABLE>";

                if (($row['fbid'] !='') or ($row['fbid']!= NULL)   ){
                   echo " <p></p> <p class=\"text-muted\"> This member has already registered </p>";    
                }
                else{
                 echo "
                <p></p>
                <a href=\"https://www.facebook.com/dialog/oauth?client_id=504893919875225&redirect_uri=".$my_url."&scope=email\" class=\"btn btn-info my-2 my-sm-0\">
                    Register via facebook
                </a>
                </div>";    
                }}
      else{
        echo "<div class=\"container\">
              <p></p>
              <p class=\"text-warning\"> Your student id are not in our database, please contact the admin </p>
              <a href=\"https://www.facebook.com/STEPSCHULA\" class=\"btn btn-info my-2 my-sm-0\">
                steps page
              </a></div>  ";
      }


  } }
  include 'connect.php';
    $fbid = null;
    $my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    urlencode($my_url);

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        //echo "code=" . $code;
        $app_id = "504893919875225";
        $app_secret = "f05c08e4317152d98a1a59d4cc32ddbe";

        $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
            . "&client_secret=" . $app_secret . "&code=" . $code
            . "&scope=email";


        $response = file_get_contents($token_url);
        
        $params = null;
        parse_str($response,$params);
        //$_SESSION['response'] = @file_get_contents($token_url);
        if($response!=null){
            //echo "<br><br>" . $token_url;
            $graph_url = "https://graph.facebook.com/me?fields=id,name,email&access_token=" . $params['access_token'];
            $user = json_decode(file_get_contents($graph_url));
            //$_SESSION['graph'] = file_get_contents($graph_url);
            //echo "<br><br>" . $graph_url;

            $fbname = $user->name;
            $fbemail = $user->email;
            $facebook_id = $user->id;
            $student_id = $_SESSION['student_id'];


            $conn = new mysqli("localhost", "root", "", "step");
            $query = "SELECT email, password, nickname, fbid, team, studentid FROM members
                    WHERE studentid ='" . $student_id . "';";
            session_unset(); 
            $query_result = $conn->query($query);
            $fb_row=$query_result->fetch_assoc();

            $sql = "UPDATE members SET fbid = '$facebook_id' WHERE studentid =  $student_id ;";
            if ($conn->query($sql) === TRUE) {
              
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['facebook_id'] = $row['fbid'];
                $_SESSION['team'] = $row['team'];
                echo "<div class=\"container\"
                <p></p><p class=\"text-primary\"> Register successfully </p>";
                echo "<p></p>
      <a href=\"index.php\" class=\"btn btn-info my-2 my-sm-0\">
          Go to mainpage
        </a>";
          } else {
                echo "Error updating record: " . $conn->error;
            }
 


            
        }
           

        
    }

    /* $fbid = null;
    $my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    urlencode($my_url);

      if(isset($_GET['code'])){
        $code = $_GET['code'];
        //echo "code=" . $code;
        $app_id = "504893919875225";
        $app_secret = "f05c08e4317152d98a1a59d4cc32ddbe";

        $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
            . "&client_secret=" . $app_secret . "&code=" . $code
            . "&scope=email";
        echo $token_url;
        
        $response = @file_get_contents($token_url);
        
        $params = null;
        parse_str($response,$params);
        echo $params['access_token'];
        $_SESSION['response'] = @file_get_contents($token_url);

       
            //echo "<br><br>" . $token_url;
        $graph_url = "https://graph.facebook.com/me?fields=id,name,email&access_token=" . $params['access_token'];
        $user = json_decode(file_get_contents($graph_url));
            //$_SESSION['graph'] = file_get_contents($graph_url);
            //echo "<br><br>" . $graph_url;

            $name = $user->name;
            $email = $user->email;
            $facebook_id = $user->id;


            $conn = new mysqli("localhost", "root", "", "step");
            $query = "UPDATE members SET fbid = ".$facebook_id."WHERE studentid=".$_SESSION['student_id'];
            $query_result = $conn->query($query);}*/

  

  ?>

</html>