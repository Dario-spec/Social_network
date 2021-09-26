<?php
include "actions/connection.php";
$error = "";
if(isset($_SESSION['error'])){
$error = $_SESSION['error'];
unset($_SESSION['error']);
}

if(isset($_SESSION['login']) && $_SESSION['login']){
    header("location:user/index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <center>
  <form class="form" action="actions/create.php" method="post">
  <h1>Register</h1> 
  <br>
  <h4>STANKOVSKI</h4>         
  <br>
  <br>
    <input type="text" placeholder="Name" name="name" required>
    <input type="text" placeholder="Last Name" name="last_name" required>
    <input type="text" placeholder="Username" name="username" required>
    <input type="email" placeholder="Email" name="email" required>
    <input type="password" placeholder="Password" name="password" required>
    <button class="btn btn-primary" type="submit" >Register</button>
    <br>
    <br>
    <a href="index.php">You have a acc?</a>
    <br>
    <br>
    <p class="error" ><?php echo $error ?></p>
</form>
  </center>
</body>
</html>