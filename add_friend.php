<?php
include "../actions/connection.php";

$username = $_GET['username'];
$myusername = $_SESSION['username'];
$time = date("Y/m/d");

$sql = "INSERT INTO notifications (pratil,primil,vid,time,post_id) VALUES ('$myusername','$username','friend','$time','-1')";
        
if($mysqli->query($sql)){

   
    echo "<script>alert('You are friends now!')</script>";

}else{

    echo "<script>alert('Error')</script>";
    

}
