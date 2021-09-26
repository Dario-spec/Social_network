<?php
include "connection.php";


//varijable
$name = $mysqli->real_escape_string(strip_tags($_POST['name']));

$last_name = $mysqli->real_escape_string(strip_tags($_POST['last_name']));

$password = $mysqli->real_escape_string(strip_tags($_POST['password']));

$username = $mysqli->real_escape_string(strip_tags($_POST['username']));

$email = $mysqli->real_escape_string(strip_tags($_POST['email']));

$profil_image = "../uploads/user.png";


//provera dali postoi takav user
$sql = "SELECT * FROM users WHERE username = '$username'";

$result = $mysqli->query($sql);

if($result->num_rows > 0){

    $_SESSION['error'] = "This username is alredy taken!!";

    header("location:../register.php");

}else{

    $sql = "SELECT * FROM users WHERE email = '$email'";

    $result = $mysqli->query($sql);

    if($result->num_rows > 0){

        $_SESSION['error'] = "This email is alredy taken!!";

    header("location:../register.php");

    }else{

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name,last_name ,password,profil_image,username,email) VALUES ('$name','$last_name','$password','$profil_image','$username','$email')";
        
        if($mysqli->query($sql)){

           
            $_SESSION['error'] = "Yoyr acc. is created try login!";    
            header("location:../index.php");
            

        }else{

            echo "Error in creating your account!! Pleas try again later.";

        }
    } 
}