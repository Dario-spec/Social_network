<?php
include "../actions/connection.php";
$user = $_GET['username'];

$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
  $row = $result->fetch_assoc();
}else{
    header("location:index.php");
}
$color = "";
if($row['status'] == "online"){
$color = "green";
}else{
  $color = "red";
}
$myname55 = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">


            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <br>
  <a style="position:fixed;margin-left: 10px;" class="btn btn-danger" href="index.php">Back</a>
    <br>

<center>
<div class="hello_profil">
        <img style="border: solid 5px <?php echo $color ?>;" class="profil_img" width="300px" height="300px" src="<?php echo $row['profil_image']?>" alt="">
        <br>
        <br>
        <h1 class="profil_username" ><?php echo $row['username']?></h1>
        <br>
        <br>
     <?php
      $sql45 = "SELECT * FROM friends WHERE friend_2 = '$user' AND friend_1 = '$myname55'";
      $result45 = $mysqli->query($sql45);
      if($result45->num_rows > 0){
          //priateli smo vise
          ?>
          <button class="btn btn-primary" disabled >You are friends</button>
                <?php
      }else{
        $sql55 = "SELECT * FROM friends WHERE friend_2 = '$myname55' AND friend_1 = '$user'";
        $result55 = $mysqli->query($sql55);
        if($result55->num_rows > 0){
          //prieteli smo vise
          ?>
        <button class="btn btn-primary" disabled >You are friends</button>
              <?php

        }else{
          $sql7 = "SELECT * FROM notifications WHERE pratil = '$myname55' AND primil = '$user' AND vid = 'friend'";
          $result7 = $mysqli->query($sql7);
          if($result7->num_rows > 0){
           // jas sum mu pratil frien request
     
           ?>
       <button class="btn btn-primary" disabled >Whaiting for respond...</button>
           <?php
           
     
          }else{
           $sql7 = "SELECT * FROM notifications WHERE primil = '$myname55' AND pratil = '$user'  AND vid = 'friend'";
           $result7 = $mysqli->query($sql7);
           if($result7->num_rows > 0){
           // On mi pratil frien request
           ?>
           <button class="btn btn-primary" data-id="<?php echo $user ?>" onclick="confirm(this)" >Confirm</button>
               <?php
           }else{
             //Nikoj ne pratil na nikogo 
             ?>
             <button class="btn btn-primary" data-id="<?php echo $user ?>" onclick="add_friend(this)"  >Add Friend</button>
                 <?php
     
           }
          }
          
          
        }
      }
     
     ?>
        <br>
        <br>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-secondary" >Info</button>
        </div>
    </center>


    
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
   <center>
       <img width="100px" src="<?php echo $row['profil_image'] ?>" alt="">
        <br>
        <h2>Name:<?php echo $row['name'] ?></h2>
        <br>
        <h2>Last-Name:<?php echo $row['last_name'] ?></h2>
        <br>
        <h2>Username:<?php echo $row['username'] ?></h2>
        <br>
        <h2>Email:<?php echo $row['email'] ?></h2>

   </center>

      </div>

      

    </div>
  </div>
</div>
<div id="alert" ></div>
<script src="code.js"></script>
</body>
</html>