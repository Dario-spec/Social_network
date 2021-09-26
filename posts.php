<?php
include "../actions/connection.php";

$post = $mysqli->real_escape_string(strip_tags($_POST['content']));

$myname = $_SESSION['name'];

$sql = "SELECT * FROM users WHERE name = '$myname'";

$result = $mysqli->query($sql);


if($result->num_rows > 0){
$row = $result->fetch_assoc();



$username = $row['username'];
$profil_img = $row['profil_image'];
$like = 0;
$time = date("Y/m/d");

$sql = "SELECT * FROM posts";
$result = $mysqli->query($sql);
$count = 0;
while($row = $result->fetch_assoc()){
$count++;

}

$new = "-{$count}";

$sql = "INSERT INTO posts (username,profil_image,likes,time,description,new) VALUES ('$username','$profil_img','$like','$time','$post','$new')";

if($mysqli->query($sql)){
    echo "<script>alert('Your Post is uploaded!')</script>";
    header("location:index.php");
   
}else{
    echo "<script>alert('Error in uploading your post! Try again later.')</script>";
    header("location:index.php");
    

}




}