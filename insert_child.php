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

    $name= $_POST['name'];
    $surname= $_POST['surname'];
    $id = $_POST['group_id'];
    $sql = "INSERT INTO child (name, surname, ID_group)
    VALUES ('$name','$surname','$id')";
     if (mysqli_query($conn, $sql)) {
      echo "<div class='alert_text'><p>Bērns tika veiksmīgi pievienots datubāzē!<p></div>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     } 
    mysqli_close($conn);
  }

  ?>
    <div class="item back">
   <a href="#" onclick="GoBackWithRefresh();return false;" >Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
 
</html>