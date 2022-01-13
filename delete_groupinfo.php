<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>E-žurnāls</title>

</head>
<body>
  

<div class="alert">
<?php
  include_once 'db.php';

  if(isset($_POST['submit'])){
    $id = $_POST['group_id'];
    $query = "SELECT * FROM `child` where ID_group = $id";
    $group_results = mysqli_query($conn, $query);
    //dzēšot grupu no sakuma tiek izdzēsti visi bērni, un to saistības ar citām tabulām
    if (mysqli_num_rows($group_results) > 0) {
        while($row = mysqli_fetch_assoc($group_results)) {
        $child_id = $row['ID'];
        $sql = " DELETE FROM `attendance` WHERE Child_id = '$child_id'";
        mysqli_query($conn, $sql);
        $sql = " DELETE FROM `skills` WHERE Child_id = '$child_id'";
        mysqli_query($conn, $sql);
        $sql = " DELETE FROM `child` WHERE ID_group = '$id'";
        mysqli_query($conn, $sql);
        }
    }
    //tiek izdēsta pati grupa
    $sql = " DELETE FROM `group` WHERE ID_group = '$id'";
     if (mysqli_query($conn, $sql)) {
      echo "<div class='alert_text'><p>Grupa tika vieksmīgi izdzēsta!<p></div>";
     } else {
        echo "Kļūda: " . $sql . ":-" . mysqli_error($conn);
     }
    mysqli_close($conn);
  }
  ?>
   <div class="item back">
   <a href="index.php" >Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
 
</html>

