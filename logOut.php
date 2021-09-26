<?php
include "../actions/connection.php";

$online = "ofline";
$nnm = $_SESSION['name'];
$sql = "UPDATE users SET status = '$online' WHERE name = '$nnm'";

if($mysqli->query($sql)){
    header("location:log.php");
}else{
    header("location:index.php");
}