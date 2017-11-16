<!DOCTYPE html>
<?php

    include ('navbar.php');
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


        $response =  json_decode(file_get_contents($token_url));

        //$params = null;
        //parse_str($response,$params);
        //$_SESSION['response'] = @file_get_contents($token_url);
        if($response!=null){
            //echo "<br><br>" . $token_url;
            $graph_url = "https://graph.facebook.com/me?fields=id,name,email&access_token=" . $response->access_token;
            $user = json_decode(file_get_contents($graph_url));
            //$_SESSION['graph'] = file_get_contents($graph_url);
            //echo "<br><br>" . $graph_url;

            $name = $user->name;
            $email = $user->email;
            $facebookID = $user->id;

            echo $name; echo $email; echo $facebookID;



            $query = "SELECT * FROM Members WHERE FacebookID = $facebookID ";


            $result = mysqli_query($connect,$query);


            if(mysqli_num_rows($result) != 1){
                $_SESSION['error']="You are not in our system, Please Register first.";
                echo ("You are not in our system, Please Register first.");
            }
            else{

                $row=$result->fetch_assoc();

                $teamID = $row['TeamID'] ;
                $queryTeam = sprintf("SELECT TeamID,TeamName FROM Teams WHERE TeamID = $teamID");
                $resultTeam = $connect->query($queryTeam);
                $rowTeam=$resultTeam->fetch_assoc();

                $_SESSION['nickname'] = $row['Nickname'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['facebook_id'] = $row['FacebookID'];
                $_SESSION['team_id'] = $row['TeamID'];
                $_SESSION['team_name'] = $rowTeam['TeamName'];
                $_SESSION['student_id'] = $row['StudentID'];
                $_SESSION['nameeng'] = $row['NameEng'];
                $_SESSION['tel'] = $row['Tel'];
                header('Location: member.php');
            }


    }}

?>
<html>

<div class="container">
    <h4 class="text-primary"> Login  </h4>
    <p class="text-muted"> to access only-member information </p>
    <?php if(isset($_GET['error_code'])){
          echo "<p class=\"text-warning\"> some error occured please try again </p>";}
    ?>
    <?php if (isset($_SESSION['error'])){
        echo "<p class=\"text-warning\">".$_SESSION['error']."</p>";
        unset($_SESSION['error']);} ?>

    <form method = "post" action="login_process.php" >
      <div class="input-group pull-left col-xs-7">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="email" type="text" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="input-group pull-left col-xs-7 ">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                 <i class="glyphicon glyphicon-log-in"></i>
              </button>
          </div>
      </div>
    </form>
  </div>
  <div class="container">
      <p></p>
      <a href="https://www.facebook.com/dialog/oauth?client_id=504893919875225&redirect_uri=<?php echo urlencode($my_url)?> &scope=email" class="btn btn-info my-2 my-sm-0">
          Login via Facebook
        </a>
  </div>

</html>
