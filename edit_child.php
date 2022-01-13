<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>E-žurnāls</title>
</head>
<style>
    .show{
        display: block;
    }
    .hidden{
        display: none;
    }
</style>
<body>
<div id="myModal" class="modal show">    
<!-- Modal content -->
<div class="modal-content">
  <a href="javascript:history.back()"><span class="close">&times;</span></a>
  <?php
  include_once 'db.php';
  $child_id = $_GET['child_id'];
  $query = "SELECT * FROM `child` where ID = $child_id";
  $group_results = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($group_results );
  echo '<form name="child_validation" action="edit_childinfo.php" onsubmit="return validateForm_child()" method="POST" enctype="multipart/form-data">';
  ?>
                <div class="item_reg"><input type="text" class="form-control" name="name"  value="<?php echo $row['Name'];?>" placeholder="Vārds"></div>
                <div><p id="validation_message_name" class="validation_message"></p></div>
                <div class="item_reg"><input type="text" class="form-control" name="surname"  value="<?php echo $row['Surname'];?>" placeholder="Uzvārds"></div>
                <div><p id="validation_message_surname" class="validation_message"></p></div>
                <div class="item_reg hidden"><input type="text" class="form-control" name="child_id" value="<?php echo $child_id;?>"></div>
                <div class="item_reg"><input class="btn" type="submit" name="submit" value="Rediģēt datus" /> </div>
            </form>
</div>

</div>
</body>
 
<script type="text/javascript" src="js/validation.js"></script> 

</html>


