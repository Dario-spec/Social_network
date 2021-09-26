<?php

include "../actions/connection.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
  <a style=" position:fixed; margin-left: 10px;" class="btn btn-danger" href="index.php">Back</a>
    
    <br>

<center>
<div class="hello_profil">
        <img class="profil_img" width="300px" height="300px" src="<?php echo $_GET['profil']?>" alt="">
        <br>
        <br>
        <h1 class="profil_username" ><?php echo $_GET['name']?></h1>
        <br>
        
        <br>
        <button data-toggle="modal" data-target="#myModal" class="btn btn-secondary" >Change Profil Image</button>
        </div>
    </center>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload Profil Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="upload.php" method="post" enctype="multipart/form-data" >
        <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
        </form>
      </div>

      

    </div>
  </div>
</div>

</body>
</html>