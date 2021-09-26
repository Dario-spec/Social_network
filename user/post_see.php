
<?php
include "../actions/connection.php";

$id = $_GET['id'];

$myname4 = $_SESSION['username'];
$sql = "DELETE FROM notifications WHERE primil = '$myname4' AND post_id = '$id'";
if($mysqli->query($sql)){
    echo "";
}else{
    echo "";
}

$sql = "SELECT * from posts WHERE id = '$id'";
$result = $mysqli->query($sql);
if($result->num_rows > 0){

    $row = $result->fetch_assoc();

}else{
    header("location:index.php");
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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<br>
  <a style="position:fixed;margin-left: 10px;" class="btn btn-danger" href="index.php">Back</a>
    <br>
    <br>
    <br>
    <br>
<div class="container">
  <p style="background-color: #000;color: #fff;display: inline-block;padding: 5px;" ><?php echo $row['time'] ?></p>
<div class="card">
  <div class="card-header">
    <img style="border-radius:50%;" width="50px" height="50px" src="<?php echo $row['profil_image'] ?>" alt="">
    <h3 style="float:right" >
  
    <?php
    
    if($row['username'] == $_SESSION['username']){
      ?>
      <a href="profil.php?name=<?php echo $_SESSION['username'] ?>&profil=<?php echo $_SESSION['profil']; ?>"><?php echo $row['username'] ?></a>
  <?php
    }else{
      ?>
          <a href="user_profil.php?username=<?php echo $row['username'] ?>"><?php echo $row['username'] ?></a>
      <?php
    }

    ?>

  </h3>
  </div>
  <div class="card-body">

    <p class="card-text"><?php echo $row['description'] ?></p>
   <div class="like"><a style="cursor: pointer;" onclick="who_like(this)" data-post-id="<?php echo $row['id'] ?>" data-toggle="modal" data-target="#likes" >Likes</a> <b id="likes_<?php echo $row['id'] ?>" ><?php echo $row['likes'] ?></b>
    <?php
   $id_post = $row['id'];
   $myname2 = $_SESSION['name'];
  $sql2 = "SELECT * FROM likes WHERE name = '$myname2' AND post_id = '$id_post'";
  $result2 = $mysqli->query($sql2);
  if($result2->num_rows > 0){
    echo "<button id='unlike{$row['id']}' onclick='unlike_post(this)'  data-post-id='{$row['id']}'  class='btn btn-primary' >Unlike</button>";
    echo "<button style='display:none;' id='like{$row['id']}' onclick='like_post(this)'  data-post-id='{$row['id']}'  class='btn btn-primary' >Like</button>";
  }else{
    echo "<button id='like{$row['id']}' onclick='like_post(this)'  data-post-id='{$row['id']}'  class='btn btn-primary' >Like</button>";
    echo "<button style='display:none;' id='unlike{$row['id']}' onclick='unlike_post(this)'  data-post-id='{$row['id']}'  class='btn btn-primary' >Unlike</button>";
  }
   ?> 
    <button onclick="post_comments(this)" data-post-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#comments" style="float: right;" class="btn btn-info" >Comments</button>
   </div>
  
  </div>
</div>
<br>
</div>
<!-- The Modal -->
<div class="modal fade" id="likes">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">LIKES</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <dov id="who"></dov>
    
      </div>

      

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="comments">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Notifications</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     
        <div id="post_comments222" ></div>
        <br>
        <br>

      <center>
      <input type="text" placeholder="Comments" id="comments33"> <button class="btn btn-primary" onclick="comments()" >Post</button>
      </center>
     
      </div>

      

    </div>
  </div>
</div>

<script src="script.js" ></script>
<script src="like.js" ></script>

</body>
</html>