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
    $id = $_POST['child_id'];
    $sql = " DELETE FROM `child` WHERE ID = '$id'";
     if (mysqli_query($conn, $sql)) {
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    $sql = " DELETE FROM `attendance` WHERE Child_id = '$id'";
     if (mysqli_query($conn, $sql)) {
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     echo "<div class='alert_text'><p>Bērns tika veiksmīgi izdzēsts no saraksta!<p></div>";  
    mysqli_close($conn);
  }

?>
   <div class="item back">
   <a id="link_back" href=""  >Atpakaļ</a> 
   </div>
</div>
</body>
<script type="text/javascript" src="js/link.js">   </script> 
<script>GoBackTwiceWithRefresh("delete_child", "link_back");</script>
</html>

