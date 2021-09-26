<?php
include "../actions/connection.php";

$username = $_GET['username'];
$myusername = $_SESSION['username'];
$time = date("Y/m/d");

$sql = "INSERT INTO friends (friend_1,friend_2,time) VALUES ('$myusername','$username','$time')";
        
if($mysqli->query($sql)){


    $sql2 = "DELETE FROM notifications WHERE primil = '$myusername' AND pratil = '$username' AND vid = 'friend'";
    if($mysqli->query($sql2)){
        echo "";
    }else{
       echo "";
        
    }

}else{

    echo "<script>alert('Error')</script>";
    

}
