<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Explore California Login</title>
    <!--meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--bootstrap/style-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="style.css" path>-->
    <style>
        h1, h5, form{
            padding-left: 10px;
        }
    </style>
    <!--scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!--<script src="script.js" path></script>-->
  </head>
    <body>
    <header><?php include ("nav.php") ?></header>
        <h1>Login to Explore California!</h1>
<br>
<h5 class="text-muted">Login</h5>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="loginUser">Username</label>
    <input type="text" class="form-control" name="loginUser" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="createPassword">Password</label>
    <input type="password" class="form-control" name="loginPassword" placeholder="Enter password">
  </div>
  <button type="submit" class="btn btn-primary" name="loginSubmit">Login</button>
</form>
      <?php
      include ("connect.php");
        
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['loginSubmit'])){
            
            $username = $_POST['loginUser'];
            $password = $_POST['loginPassword'];
            
        //user login
        $sql = "SELECT userName, password FROM admin WHERE userName=? AND password=?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        if($stmt->execute() == true){
            $stmt->bind_result($user, $pass);
            $stmt->fetch();
                
            if($user == $username && $password == $pass){
                session_start();
                $_SESSION['login'] = $username;
                echo "<br>Successful login!";
                header("Location: index.php");
                } else {
                    echo "<br>Username or password not found!";
                }
            }
                $stmt->close();
                $connect->close();
            }
      ?>
      <div>
      </div>
    </body>
</html>