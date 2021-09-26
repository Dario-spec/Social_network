


<?php
include "../actions/connection.php";

$myname = $_SESSION['username'];


$sql = "SELECT * FROM notifications WHERE primil = '$myname'";
$result = $mysqli->query($sql);
if($result->num_rows > 0){
   
  while($row = $result->fetch_assoc()){
    $user = $row['pratil'];
    
    $sql2 = "SELECT * FROM users WHERE username = '$user'";
    $result2 = $mysqli->query($sql2);
     if($result2->num_rows > 0){
         while($row2 = $result2->fetch_assoc()){
             
            if($row['vid'] == "like"){
               ?>
                    <ul>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row2['username']?>"><img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt=""></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row2['username']?>"><?php echo $row2['username'] ?></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="post_see.php?id=<?php echo $row['post_id'] ?>">Liked your post!</a></li>
                    </ul>
               <?php
            }else if($row['vid'] == "comments"){
                ?>
                      <ul>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row2['username']?>"><img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt=""></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row2['username']?>"><?php echo $row2['username'] ?></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="post_see.php?id=<?php echo $row['post_id'] ?>">Comments on your post!</a></li>
                    </ul>
               <?php

            }else if($row['vid'] == "friend"){
                ?>
                    <ul>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row['pratil']; ?>"><img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt=""></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row['pratil']; ?>"><?php echo $row2['username'] ?></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row['pratil']; ?>">Send you a friend request!</a></li>
                        <li style="display: inline-block;list-style: none;" ><button onclick="deleteFriend(this)" class="btn btn-danger" data-id="<?php echo  $row['pratil']; ?>"  ><i class="fas fa-trash-alt"></i></button></li>
                    </ul>
               <?php

            }else{
                ?>
                    <ul>
                        <li style="display: inline-block;list-style: none;" ><a href="messenger.php?username=<?php echo  $row['pratil']; ?>"><img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt=""></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="user_profil.php?username=<?php echo  $row['pratil']; ?>"><?php echo $row2['username'] ?></a></li>
                        <li style="display: inline-block;list-style: none;" ><a href="messenger.php?username=<?php echo  $row['pratil']; ?>">Send you a message!</a></li>
                    </ul>
               <?php 
            }

     



         }
     }
  }
}else{
    echo "<h4>Empty</h4>";
}


