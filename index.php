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
    <header>
        <nav>
            <ul class="menu">
                <div class="item">
                    <li> <a class="link" href="index.php">Sākumlapa</a> </li>
                </div>
   
            </ul>
        </nav>
    </header>
    <div class="about_box">
        <div class="title">
            <h1 class="about">Grupas</h1>
        </div>
        <div class="add_group"><button id="myBtn">Pievienot grupu</button></div>
        <?php 
        include_once 'db.php';
        $query = "SELECT * FROM `group`";
        $results = mysqli_query($conn, $query);
        if (!$results) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        echo "<table class='table'>";
        while ($row_users = mysqli_fetch_array($results)) {
        //output a row here
        $id = $row_users['ID_group'];
        $current_month = date('m');
        $current_year = date('y');
        echo "<tr><td><a class='link black' href='grupa.php?id=$id&month=$current_month&year=$current_year&sort=Surname&order=up'>".($row_users['Group_name'])."</a> <a class='delete_group' href='delete_group.php?group_id=$id'></a></td></tr>";
        }
        echo "</table>";
        ?>
        <div id="myModal" class="modal">    
<!-- Modal content -->
    
<div class="modal-content">
  <span class="close">&times;</span>
  
  <form name="group_validation" action="insert_group.php" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
  
                <div class="item_reg"><input type="text" class="form-control" name="name" id="name" placeholder="Nosaukums"></div>
                <div><p id="validation_message"></p></div>
                <div class="item_reg"><input class="btn" type="submit" name="submit" value="Pievienot grupu" /> </div>
            </form>
</div>

</div>
    </div>

</body>
<script type="text/javascript" src="js/persona.js"></script> 
<script type="text/javascript" src="js/validation.js"></script> 
 

</html>