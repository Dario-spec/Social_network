<?php

include "../actions/connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM comments WHERE post_id = '$id'";

$result = $mysqli->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
       if($row['username'] == $_SESSION['username']){
        $usr = $row['username'];
        $sql22 = "SELECT * FROM users WHERE username = '$usr'";
        $result22 = $mysqli->query($sql22);
        if($result22->num_rows > 0){ 
         
  while($row22 = $result22->fetch_assoc()){
    echo "
        
    <div class='container'>
    <ul>
    <li style='display:inline-block;' ><a href='profil.php?name=".$_SESSION['username']."&profil=".$row22['profil_image']."' ><img style='border:solid 3px #222;border-radius:50%;' width='50px' src='".$row22['profil_image']."' alt=''></a></li>
    <li style='display:inline-block;' > <p>".$row['comment']."</p> </li>
    </ul>
    </div>
            ";
  }
        }
       }else{
        $usr = $row['username'];
        $sql2 = "SELECT * FROM users WHERE username = '$usr'";
        $result2 = $mysqli->query($sql2);
        if($result2->num_rows > 0){ 
            
  while($row2 = $result2->fetch_assoc()){
    echo "
        
    <div class='container'>
    <ul>
    <li style='display:inline-block;' ><a href='user_profil.php?username=".$row['username']."' ><img style='border:solid 3px #222;border-radius:50%;' width='50px' src='".$row2['profil_image']."' alt=''></a></li>
    <li style='display:inline-block;' > <p>".$row['comment']."</p> </li>
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

