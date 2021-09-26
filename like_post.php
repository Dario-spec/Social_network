<?php
include "../actions/connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$now =  $row['likes'] + 1;
$primil = $row['username'];
$l = "{$now}";
$sql = "UPDATE posts SET likes='$l' WHERE id = '$id'";
if($mysqli->query($sql)){

    echo $l;
  
}else{
    echo "Error";

}

$myname = $_SESSION['name'];

$sql = "INSERT INTO likes (name,post_id) VALUES ('$myname','$id')";
        
if($mysqli->query($sql)){


    $time = date("Y/m/d");
$sql = "INSERT INTO notifications (pratil,post_id,vid,time,primil) VALUES ('$myname','$id','like','$time','$primil')";
        
if($mysqli->query($sql)){

   
    echo "";

}else{

    echo "";

}


   
    echo "";

}else{

    echo "";

}




