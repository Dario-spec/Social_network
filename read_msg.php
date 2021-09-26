<?php
include "../actions/connection.php";

$user = $_GET['id'];
$me = $_SESSION['username'];

$sql = "SELECT * FROM message WHERE pratil = '$me' AND primil = '$user' OR pratil = '$user' AND primil = '$me'";

$result = $mysqli->query($sql);

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

if($row['pratil'] == $me){
//jas sum pratil

$sql_me = "SELECT * FROM users WHERE username = '$me'";
$result_me = $mysqli->query($sql_me);
$row_me = $result_me->fetch_assoc();

$seen = '';
if($row['seen'] == 0){
    $seen = 'not seen';
}else if($row['seen'] == 1){
    $seen = 'seen';
}

?>

<div class="row">
<div class="col-md-12">

<ul style="float: right;" >
<li  ><p data-id="<?php echo $row['time'] ?>" onclick="when(this)" style="background-color: aqua;padding: 5px;cursor: pointer;" ><?php echo $row['message'] ?></p></li>
    <li  ><img width="50px" height="50px" src="<?php echo $row_me['profil_image'] ?>" alt=""></li>
    <p><?php echo $seen ?></p>
</ul>
</div>
</div>



<?php

}else if($row['pratil'] == $user){
//on pratil

$sql_user = "SELECT * FROM users WHERE username = '$user'";
$result_user = $mysqli->query($sql_user);
$row_user = $result_user->fetch_assoc();

?>

<div class="row">
<div class="col-md-12">
<ul  >
    <li><img width="50px" height="50px" src="<?php echo $row_user['profil_image'] ?>" alt=""></li>
    <li  ><p data-id="<?php echo $row['time'] ?>" onclick="when(this)" style="background-color: aqua;padding: 5px;cursor: pointer;" ><?php echo $row['message'] ?></p></li>
</ul>


</div>
</div>

<?php

}

}

}else{
   if($user == 0){
    echo "<br>";
    echo "<center><h3>Welcome!</h3></center>";
   }else{
    echo "<br>";
    echo "<center><h3>No messages!</h3></center>";
   }
}

