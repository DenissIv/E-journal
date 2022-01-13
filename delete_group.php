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
    .question{
        margin: 0 auto;
    width: 300px;
    text-align: center;
    font-size: 18px;
    line-height: 24px;
    margin-top: 15px;
    }
</style>
<body>
<div id="myModal" class="modal show">    
<!-- Modal content -->
<div class="modal-content">
  <a href="javascript:history.back()"><span class="close">&times;</span></a>
  <?php
  include_once 'db.php';
  $group_id = $_GET['group_id'];
  $query = "SELECT * FROM `group` where ID_group = $group_id";
  $group_results = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($group_results );
  echo '<form action="delete_groupinfo.php" method="POST" enctype="multipart/form-data">';
  ?>
                <div><p class="question">Vai Jūs vēlaties izdzēst grupu <br> <b><?php echo $row['Group_name']?></b> no saraksta?</p><div>
                <div class="item_reg hidden"><input type="text" class="form-control" name="group_id" value="<?php echo $group_id;?>"></div>
                <div class="item_reg"><input class="btn" type="submit" name="submit" value="Jā" /> </div>
            </form>
</div>

</div>
</body>
 
 </script> 

</html>


