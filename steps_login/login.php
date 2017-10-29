<!DOCTYPE html>
<?php 
    session_start();
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
            $facebook_id = $user->id;

            echo $name; echo $email; echo $facebook_id;


            $conn  = new mysqli("localhost", "root", "", "step");
            $query = sprintf("SELECT email, password, nickname, fbid, team,studentid, nameeng FROM members
                    WHERE fbid = $facebook_id ");
            echo $query;

            $result = mysqli_query($conn,$query);
            

            if(mysqli_num_rows($result) != 1){
                $_SESSION['error']="You are not in our system, Please Register first.";
                echo ("You are not in our system, Please Register first.");
        }
            else{

                $row=$result->fetch_assoc();
                // echo $row['Email'];
                $_SESSION['nickname'] = $row['nickname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['facebook_id'] = $row['fbid'];
                $_SESSION['team'] = $row['team'];
                $_SESSION['student_id'] = $row['studentid'];
                $_SESSION['nameeng'] = $row['nameeng'];
                header('Location: index.php');
            }

        
    }}

?>
<html lang"en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title> STEPS ! login </title>
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php
      if((isset($_SESSION['fbid']))and(isset($_SESSION['nickname']))){
          echo " <li><a href=\"member.php\"><span class=\"glyphicon glyphicon-user\"></span>".$_SESSION['nickname']."</a></li>
        <li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-in\"></span> Logout</a></li>";
      }
      else{
        echo "<li><a href=\"regis.php\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
        <li><a href=\"login.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Login</a></li>";
      } ?>
      </ul>
    </div>
  </div>
</nav>

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