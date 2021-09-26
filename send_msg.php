<?php
include "../actions/connection.php";

$user = $_GET['username'];
$msg = $_GET['msg'];
$me = $_SESSION['username'];
$time = date("Y/m/d");

$sql = "INSERT INTO message (pratil,primil,message,time) VALUES ('$me','$user','$msg','$time')";

if($mysqli->query($sql)){
   

    $sql = "INSERT INTO notifications (pratil,primil,vid,time) VALUES ('$me','$user','msg','$time')";

    if($mysqli->query($sql)){
        echo "";
    }else{
        echo "";
    }

}else{
    echo "";
}