<?php
include "connection.php";

$password = $mysqli->real_escape_string(strip_tags($_POST['password']));

$email = $mysqli->real_escape_string(strip_tags($_POST['email']));


$sql = "SELECT * FROM users WHERE email = '$email'";

$result = $mysqli->query($sql);

if($result->num_rows > 0){

$row = $result->fetch_assoc();

if(password_verify($password,$row['password'])){

    $_SESSION['login'] = true;

    $_SESSION['username'] = $row['username'];

    $_SESSION['name'] = $row['name'];

    $_SESSION['profil'] = $row['profil_image'];

    header("location:../user/index.php");

}else{

        $_SESSION['error'] = "Incorrect username or password";

        header("location:../index.php");

}
}else{
    
        $_SESSION['error'] = "Incorrect username or password";

        header("location:../index.php");

}
