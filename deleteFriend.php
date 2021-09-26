<?php
include "../actions/connection.php";

$username = $_GET['username'];

$myname4 = $_SESSION['username'];

$sql = "DELETE FROM notifications WHERE primil = '$myname4' AND pratil = '$username' AND vid = 'friend'";

if($mysqli->query($sql)){

    echo "";

}else{

    echo "";

}