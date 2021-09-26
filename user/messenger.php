<?php
include "../actions/connection.php";

$test = $_GET['username'];


$myusername = $_SESSION['username'];

$sql = "SELECT * FROM friends WHERE friend_1 = '$myusername' OR friend_2 = '$myusername'";
$result = $mysqli->query($sql);
if($result->num_rows > 0){

    
    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
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
<style>
    ul li{
        display: inline-block;
        padding-left: 10px;
  
    }
    ul{
        background-color: #fff;
        padding: 10px;

    }
</style>
</head>
<body>

    

<aside class="side" >
        <center>
            <h1>
                My Friends
                <br>
                <a class="btn btn-danger" href="index.php">Back</a>
                <br> 
            </h1>

            <div class="friends">
              
                <?php
                
                $user_fr = '';
                while($row = $result->fetch_assoc()){
                    
                    if($row['friend_1'] == $_SESSION['username']){
                        $user_fr = $row['friend_2'];
                        
            
                    }else if($row['friend_2'] == $_SESSION['username']){
                        $user_fr = $row['friend_1'];
            
                    }
            
                    $sql2 = "SELECT * FROM users WHERE username = '$user_fr'";
                    $result2 = $mysqli->query($sql2);
                    while($row2 = $result2->fetch_assoc()){
                        ?>
  
                          <ul>
                          <li>
                            <img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt="">
                            </li>
                            <li>
                            <a href="messenger.php?username=<?php echo $row2['username']  ?>" style="font-size: 22px;" href=""><?php echo $row2['username'] ?></a>
                            </li>

                          </ul>
                          <br>
            
            
                        <?php
                    }
                }
                
                ?>
              
            </div>

        </center>

    </aside>
<div id="msg_scroll" class="messenger">

<div id="msg_div" ></div>


<div class="send">
<input autocomplete="off" class="inp" type="text" placeholder="Aa" id="message" >
<button id="snd" data-id="<?php echo $_GET['username'] ?>" onclick="sendMessage(this)" class="btn btn-primary" >Send</button>
</div>
</div>

<?php
}else{
    echo "<script>alert('You need friends to chat!')</script>";
    echo "<script>window.location.replace('index.php')</script>";
}


?>

     
<input type="hidden" value="<?php echo $_GET['username'] ?>"  id="id_msg">
<script>

  

</script>
<script src="main.js"></script>
<script>
    
setInterval(function(){
    
    var msg_id = document.getElementById("id_msg").value;
    const xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onload = function () {
  
      
    
    
      
     
    }
    
    xmlhttp.open("GET", "seen.php?id=" + msg_id);
    xmlhttp.send();
},1000)
</script>
</body>
</html>
