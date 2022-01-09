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
    $skills_count= 10;
    $j = 0;
    for($i=0; $i<$child_count; $i++){
      $child_id= $_POST['child_id'][$i];
      $day = 1;
      for($j; $j<$skills_count; $j++){
         $mark= $_POST['mark'][$j];
         $skill_name = $_POST['skill_name'][$j];
         $date = $_POST['date'][$j];
         $sql = "UPDATE `skills` SET Mark = '$mark' WHERE Child_id = $child_id AND Date = '$date' AND Skill_name = '$skill_name'" ;
         mysqli_query($conn, $sql);
      } 
      if($skills_count+10<=$skills_count*$child_count){
      $skills_count+=10;
      }
    }
    echo "<div class='alert_text'><p>Vērtējums tika veiksmīgi pievienots datubāzē!<p></div>";
  }

  ?>
    <div class="item back">
   <a href="#" onclick="GoBackWithRefresh();return false;" >Atpakaļ</a> 
</div>
</div>
</body>
<script type="text/javascript" src="js/link.js"></script> 
 
</html>

