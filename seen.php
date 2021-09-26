<?php
include "../actions/connection.php";

$user = $_GET['id'];

$me = $_SESSION['username'];

$seen = 1;

$sql = "UPDATE message SET seen = '$seen' WHERE primil = '$me' AND pratil = '$user'";

if($mysqli->query($sql)){

$sql2 = "DELETE FROM notifications WHERE primil = '$me' AND pratil = '$user' AND vid = 'msg'";
if($mysqli->query($sql2)){
    echo "";
}else{
    echo "";
}

}else{
    echo "";
}