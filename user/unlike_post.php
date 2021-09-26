<?php
include "../actions/connection.php";

(int)$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$now =  $row['likes'] - 1;
$l = "{$now}";
$sql = "UPDATE posts SET likes='$l' WHERE id = '$id'";
if($mysqli->query($sql)){

    echo $l;
  
}else{
    echo "Error";

}

$mm = $_SESSION['name'];
$sql = "DELETE FROM likes WHERE name = '$mm' AND post_id = '$id'";
if($mysqli->query($sql)){
    echo "";
}else{
    echo "";
}

