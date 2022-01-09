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
    $child_count= $_POST['child_count'];
    $days_in_month= $_POST['days_count'];
    $days_fixed = $days_in_month;
    $j = 0;
    for($i=0; $i<$child_count; $i++){
      $child_id= $_POST['child_id'][$i];
      $day = 1;
      for($j; $j<$days_in_month; $j++){
         $attendance= $_POST['attendance'][$j];
         $date = $_POST['date'][$j];
         $sql = "UPDATE `attendance` SET Entry = '$attendance' WHERE Child_id = $child_id AND Date = '$date'" ;
         mysqli_query($conn, $sql);
      } 
      if($days_in_month+$days_fixed<=$days_in_month*$child_count){
      $days_in_month+=$days_fixed;
      }
    }
    echo "<div class='alert_text'><p>Apmeklējuma ieraksts tika veiksmīgi pievienots datubāzē!<p></div>";
  }
  ?>
    <div class="item back">
   <a href="#" onclick="GoBackWithRefresh();return false;" >Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
 
</html>

