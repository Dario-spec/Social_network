<?php
include "../actions/connection.php";

$id = $_GET['id'];
$post = $_GET['post'];
$myname = $_SESSION['username'];
$time = date("Y/m/d");


$sql = "INSERT INTO comments (username,post_id,comment,time) VALUES ('$myname','$id','$post','$time')";

if($mysqli->query($sql)){
    $sql5 = "SELECT * FROM posts WHERE id = '$id'";
    $result5 = $mysqli->query($sql5);
    if($result5->num_rows > 0){ 
        $row5 = $result5->fetch_assoc();
        $primil = $row5['username'];
        $sql = "INSERT INTO notifications (pratil,post_id,vid,time,primil) VALUES ('$myname','$id','comments','$time','$primil')";
        
if($mysqli->query($sql)){

   
    echo "";

}else{

    echo "";

}
}


    echo "";
}else{
    echo "";
}





