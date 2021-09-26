<?php

include "../actions/connection.php";

$username = $_SESSION['username'];


$sql = "SELECT * FROM friends WHERE friend_1 = '$username' OR friend_2 = '$username'";

$result = $mysqli->query($sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <?php
    if($result->num_rows > 0 ){

    ?>
    <br>
    <center>
        <h1 class="fr_naslov" >My Friends</h1>
    </center>
<br>
<br>
<br>

<center>
<div class="container">
<table style="width: 350px;" class="table table-dark">

<tbody>
 
   
   
    <?php
    $user_fr = '';
    while($row = $result->fetch_assoc()){
        
        if($row['friend_1'] == $_SESSION['username']){
            $user_fr = $row['friend_2'];


        }else if($row['friend_2'] == $_SESSION['username']){
            $user_fr = $row['friend_1'];

        }

        $sql2 = "SELECT * FROM users WHERE username = '$user_fr'";
        $result2 = $mysqli->query($sql2);
        while($row2 = $result2->fetch_assoc()){
            ?>

<tr>
                <td><img width="50px" height="50px" src="<?php echo $row2['profil_image'] ?>" alt=""></td>
                <td><a style="font-size: 22px;" href=""><?php echo $row2['username'] ?></a></td>
                </tr>

            <?php
        }
    }

    ?>




</tbody>
</table>
</div>
</center>

<?php
}else{
    echo "<script>alert('There is not friends')  </script> ";
    echo "<script>window.location.replace('index.php')</script> ";
    
}
?>

<script>


</script>
</body>
</html>