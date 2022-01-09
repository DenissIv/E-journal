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
    $id = $_POST['child_id'];
    $sql = "UPDATE `child` SET Name='$name', Surname='$surname' WHERE ID = '$id'";
     if (mysqli_query($conn, $sql)) {
      echo "<div class='alert_text'><p>Dati tika veiksmīgi rediģēti!<p></div>";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     } 
    mysqli_close($conn);
  }

  ?>
    <div class="item back">
   <a id="link_back_edit" href="" >Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
<script>GoBackTwiceWithRefresh("edit_child", "link_back_edit");</script>
</html>

 