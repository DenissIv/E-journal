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
    //vaicājuma izvediošana, kas pievieno grupu datu bāzē
    $name= $_POST['name'];
    $sql = "INSERT INTO `group` (Group_name)
    VALUES ('$name')";
     if (mysqli_query($conn, $sql)) {
        echo "<div class='alert_text'><p>Grupa tika vieksmīgi izveidota!<p></div>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     } 
    
    mysqli_close($conn);
  }

  ?>
    <div class="item back">
   <a href="#" onclick="GoBackWithRefresh();return false;">Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
</html>