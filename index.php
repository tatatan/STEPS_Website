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

</html>