<?php

include "../actions/connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM likes WHERE post_id = '$id'";

$result = $mysqli->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
       if($row['name'] == $_SESSION['name']){
        $usr = $row['name'];
        $sql22 = "SELECT * FROM users WHERE name = '$usr'";
        $result22 = $mysqli->query($sql22);
        if($result22->num_rows > 0){ 
         
  while($row22 = $result22->fetch_assoc()){
    echo "
        
    <div class='container'>
    <ul style='background-color:#000;border-radius:5px;padding:5px;' >
    <li style='display:inline-block;' ><img style='border:solid 2px #fff;border-radius:50%;' width='50px' height='50px' src='".$row22['profil_image']."' alt=''></li>
    <li style='display:inline-block;' ><a style='margin-left:15px;font-size:23px;' href='profil.php?name=".$_SESSION['username']."&profil=".$_SESSION['profil']."'>".$row['name']."</a> </li>
    </ul>
    </div>
            ";
  }
        }
       }else{
        $usr = $row['name'];
        $sql2 = "SELECT * FROM users WHERE name = '$usr'";
        $result2 = $mysqli->query($sql2);
        if($result2->num_rows > 0){ 
            
  while($row2 = $result2->fetch_assoc()){
    echo "
        
    <div class='container'>
    <ul>
    <li style='display:inline-block;' ><img style='border-radius:50%;' width='50px' height='50px' src='".$row2['profil_image']."' alt=''></li>
    <li style='display:inline-block;' ><a style='margin-left:15px;font-size:23px;' href='user_profil.php?username=".$row2['username']."'>".$row['name']."</a> </li>
    </ul>
    </div>
            ";
  }
        }
       }
    }




}else{
    echo "The post don't has likes!";
}

