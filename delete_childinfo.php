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
   //tiek izdzēsts bērns, kā arī tiek izdzēsti visi apmeklējumi un prasmju vērtējumi, kas ir saistīti ar bērnu.
    $id = $_POST['child_id'];
    $sql = " DELETE FROM `child` WHERE ID = '$id'";
    mysqli_query($conn, $sql);
    $sql = " DELETE FROM `attendance` WHERE Child_id = '$id'";
    mysqli_query($conn, $sql);
    $sql = " DELETE FROM `skills` WHERE Child_id = '$id'";
    mysqli_query($conn, $sql);
   
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

