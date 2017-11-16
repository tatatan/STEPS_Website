<!DOCTYPE html>
<?php
include 'navbar.php';
?>

<html>
<head><title> STEPS member </title></head>
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
      $query = "SELECT * FROM Members WHERE StudentID=$student_id;";
      $result = $connect->query($query);

      $my_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      urlencode($my_url);

      if ($result != NULL){
        $row = $result->fetch_assoc();

        $nameEng = $row['NameEng'];
        $nickname = $row['Nickname'];
        $teamID = $row['TeamID'];
        $email = $row['Email'];

        if($row['StudentID'] != NULL) {
            $query_team = "SELECT TeamName FROM Teams WHERE TeamID=$teamID;";
            $result_team = $connect->query($query_team);
            $rowTeam = $result_team->fetch_assoc();

            echo "<div class=\"container\">
                <p></p>
                <p></p>
                <TABLE>
                <TR>
                <TD> student ID </TD><TD> :  ".$row['StudentID']." <TD></TR>
                <TR>
                <TD> name  </TD><TD> :  ". $nameEng."<TD></TR>
                <TR>
                <TD> nickname </TD><TD> :  ".$nickname." <TD></TR>
                <TR>
                <TD> team  </TD><TD>:  ". $rowTeam['TeamName']." <TD></TR>
                <TR>
                <TD> email  </TD><TD>:  ". $email."<TD></TR></TABLE>";

                if (($row['FacebookID'] !='') or ($row['FacebookID']!= NULL)   ){
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
        $app_secret = "71359ff0b37716abe9c02c8130d20898";

        $token_url = "https://graph.facebook.com/oauth/access_token?"
            . "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
            . "&client_secret=" . $app_secret . "&code=" . $code
            . "&scope=email";


        $response = json_decode(file_get_contents($token_url));

        //$params = null;
        //parse_str($response,$params);
        //$_SESSION['response'] = @file_get_contents($token_url);
        if($response!=null){
            //echo "<br><br>" . $token_url;
            $graph_url = "https://graph.facebook.com/me?fields=id,name,email&access_token=" . $response->access_token;
            $user = json_decode(file_get_contents($graph_url));
            //$_SESSION['graph'] = file_get_contents($graph_url);
            //echo "<br><br>" . $graph_url;

            $fbname = $user->name;
            $fbemail = $user->email;
            $facebook_id = $user->id;
            $student_id = $_SESSION['student_id'];

            $query = "SELECT * FROM Members
                    WHERE StudentID ='" . $student_id . "';";
            session_unset();
            $query_result = $connect->query($query);
            $fbRow=$query_result->fetch_assoc();

            $sql = "UPDATE Members SET FacebookID = '$facebook_id' WHERE StudentID =  $student_id ;";
            if ($connect->query($sql) === TRUE) {

                $_SESSION['nickname'] = $row['Nickname'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['facebook_id'] = $row['FacebookID'];
                $_SESSION['team_id'] = $row['TeamID'];
                $_SESSION['team_name'] = $rowTeam['TeamName'];
                $_SESSION['student_id'] = $row['StudentID'];
                $_SESSION['nameeng'] = $row['NameEng'];
                $_SESSION['tel'] = $row['Tel'];
                
                echo "<div class=\"container\"
                <p></p><p class=\"text-primary\"> Register successfully </p>";
                echo "<p></p>
      <a href=\"index.php\" class=\"btn btn-info my-2 my-sm-0\">
          Go to mainpage
        </a>";
          } else {
                echo "Error updating record: " . $connect->error;
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
