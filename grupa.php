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
    <?php
    $months = array('Janvāris','Februāris','Marts','Aprīlis','Maijs','Jūnijs',
    'Jūlījs','Augusts','Septembris','Oktobris','Novmebris','Decembris');
    $years = array(); //paredzēts, ka žurnāls spēj ierakstīt datus 50 gadus, līdz 2071g.
    for($i = 21;$i < 71;$i++) {
        $years[] = $i;
    }   
    //struktūra, lai iegūtu nākošo vai iepriekšējo gadu  
    $page_year = $_GET['year'];
    if ($_GET['year']==70){
        $next_year = 70;
    } else {
        $next_year = $_GET['year']+1;
    }
    if ($_GET['year']==21){
        $prev_year = 21;
    } else {
        $prev_year = $_GET['year']-1;
    }

    $page_month = $_GET['month'];
    if ($_GET['month']==12){
        $next_month = 1;
    } else {
    $next_month = $_GET['month']+1;
    }
    if ($_GET['month']==1){
        $prev_month = 12;
    } else {
    $prev_month = $_GET['month']-1;
    }
    //grupas nosaukuma izvade 
        include_once 'db.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM `group` where ID_group = $id";
        $group_results = mysqli_query($conn, $query);
        if (mysqli_num_rows($group_results) > 0) {
            //output data of each row
            while($row = mysqli_fetch_assoc($group_results)) {
              $group_name = $row['Group_name'];   
            }
          }
    ?>
    <div class="skills_link"><?php echo '<a href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=0">Prasmju tabula</a>'?></div>
    <div class="title">
    <div class="group_name_block">
        <div><h1 class="about group_name"><?php echo $group_name; ?></h1></div>
        <div ><button id="editBtn" class="edit-btn"></button></div>
    </div>
        <div id="myModalEdit" class="modal-edit">    
        <!-- Modal content -->
        <div class="modal-content-edit">
         <span class="close-edit">&times;</span>
        <form name="group_validation" action="edit_group.php" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
        <div class="item_reg"><input type="text" class="form-control" name="name" id="name" value="<?php echo $group_name;?>" placeholder="Nosaukums"></div>
        <div><p id="validation_message"></p></div>
        <div class="item_reg hidden"><input type="text" class="form-control" name="group_id" id="group_id" value="<?php echo $id;?>"></div>
        <div class="item_reg"><input class="btn" type="submit" name="submit" value="Rediģēt nosaukumu" /> </div>
    </form>
    </div>
    </div>
        
    <div  class="year_block">
         <div class="back"> <?php echo "<a class='link_month' href='grupa.php?id=$id&month=$page_month&year=$prev_year&sort=Surname&order=up'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo '20'.$years[$page_year-21]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='grupa.php?id=$id&month=$page_month&year=$next_year&sort=Surname&order=up'> &rarr; </a>"?></div>      
        </div>
        <div  class="month_block">
         <div class="back"> <?php echo "<a class='link_month' href='grupa.php?id=$id&month=$prev_month&year=$page_year&sort=Surname&order=up'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo $months[$page_month-1]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='grupa.php?id=$id&month=$next_month&year=$page_year&sort=Surname&order=up'> &rarr; </a>"?></div>      
        </div>
    </div>
    <div class="add_group"><button id="myBtn">Pievienot bērnu</button></div>
    <div id="myModal" class="modal">    
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <form name="child_validation" action="insert_child.php" onsubmit="return validateForm_child()" method="POST" enctype="multipart/form-data">
                <div class="item_reg"><input type="text" class="form-control" name="name" id="name" placeholder="Vārds"></div>
                <div><p id="validation_message_name" class="validation_message"></p></div>
                <div class="item_reg"><input type="text" class="form-control" name="surname" id="surname" placeholder="Uzvārds"></div>
                <div><p id="validation_message_surname" class="validation_message"></p></div>
                <div class="item_reg hidden"><input type="text" class="form-control" name="group_id" id="group_id" value="<?php echo $id;?>"></div>
                <div class="item_reg"><input class="btn" type="submit" name="submit" value="Pievienot bērnu" /> </div>
            </form>
</div>

</div>
    </div>
    <div class="cilveki-box">
    
    <?php
    //funkcija atgriež true, ja padotais datums ir sestdiena vai svētdiena
    function isWeekend($date) {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    } 
    $sort_name = $_GET['sort'];
    //tiek viekta bērnu saraksta kārtošana
    if($_GET['order'] == "up"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name ASC";
    }
    else if ($_GET['order'] == "down"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name DESC";
    }
        $group_results = mysqli_query($conn, $query);
        $child_count = 0;
        echo '<div class="list-flex">';
              echo '<div class="child">Vārds, Uzvārds <a class="asc" href="grupa.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up"></a> <a class="desc" href="grupa.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=down"></a></div>';
              //tiek iegūts dienu skaits konkrētajā mēnesī un gadā
              $days_in_month = cal_days_in_month(CAL_GREGORIAN,$page_month,2000+$page_year);
              for($i=1; $i<=$days_in_month; $i++){
                  echo '<div class="list-cell">'.$i.'</div>';
              }
              echo '<div class="list-cell attendance">Apmeklēts</div>';
              echo '<div class="list-cell attendance">Neapmeklēts</div>';
              echo '</div>';
              echo '<form action="insert_attendance.php" method="POST" enctype="multipart/form-data">'; 
              
        if (mysqli_num_rows($group_results) > 0) {
            //iegūstam nepieciešamos datus no datubāzes, lai tos attēlotu 
            while($row = mysqli_fetch_assoc($group_results)) {
              $name = $row['Name'];  
              $surname = $row['Surname'];
              $child_id = $row['ID'];
              $child_count++;
              $query_attendance = "SELECT * FROM `attendance` where Child_id = $child_id AND Date = '20$page_year-$page_month-1'";
              $attendance_results = mysqli_query($conn, $query_attendance);
              $attendance_count = 0;
              $notAttendance_count = 0;
              //tālāk ir bērnu saraksta un apmeklējuma tabulas izvade
              echo '<div class="list-flex">';
              echo '<div class="child"><p>'.$name.' '.$surname.'</p> <a class="edit" href="edit_child.php?child_id='.$child_id.'&id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up"></a><a class="delete" href="delete_child.php?child_id='.$child_id.'&id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up"></a></div>';
              echo '<div class="item_reg hidden"><input type="text" class="form-control" name="child_id[]" value="'.$child_id.'"></div>';
              for($i=1; $i<=$days_in_month; $i++){
                  $query_entry = "SELECT Entry FROM `attendance` where Child_id = $child_id AND Date = '20$page_year-$page_month-$i'";
                  $entry_result = mysqli_query($conn, $query_entry);
                  $row = mysqli_fetch_assoc($entry_result);
                  //$row['Entry']
                  echo '<div class="item_reg hidden"><input type="text" class="form-control" name="date[]" value="20'.$page_year.'-'.$page_month.'-'.$i.'"></div>';
                  echo '<select id="attendance" name="attendance[]" class="list-cell">';
                    if ($row['Entry']=='empty') {
                       echo '<option selected value="empty">-</option>';
                    } 
                       else {
                       echo '<option value="empty">-</option>';
                    }
                    if ($row['Entry']=='B' || isWeekend('20'.$page_year.'-'.$page_month.'-'.$i)) {
                        echo '<option selected value="B">B</option>';
                     } 
                        else {
                        echo '<option value="B">B</option>';
                     }  
                    if ($row['Entry']=='A') {
                        echo '<option selected value="A">A</option>';
                        $attendance_count++;
        
                     } 
                        else {
                        echo '<option value="A">A</option>';
                        
                     }
                     if ($row['Entry']=='S') {
                        echo '<option selected value="S">S</option>';
                        $notAttendance_count++;
                     } 
                        else {
                        echo '<option value="S">S</option>';
                     }
                     if ($row['Entry']=='V') {
                        echo '<option selected value="V">V</option>';
                        $notAttendance_count++;
                     } 
                        else {
                        echo '<option value="V">V</option>';
                     }
                     if ($row['Entry']=='Nn') {
                        echo '<option selected value="Nn">Nn</option>';
                        $notAttendance_count++;
                     } 
                        else {
                        echo '<option value="Nn">Nn</option>';
                     }
                     if ($row['Entry']=='Ng') {
                        echo '<option selected value="Ng">Ng</option>';
                        $notAttendance_count++;
                     } 
                        else {
                        echo '<option value="Ng">Ng</option>';
                     }
                          
                       echo '</select>';
                        if (mysqli_num_rows($attendance_results)==0){
                        $date = '20'.$page_year.'-'.$page_month.'-'.$i.'';
                        $sql = "INSERT INTO attendance (Child_id, Entry, Date)
                        VALUES ('$child_id','empty', '$date')";
                        mysqli_query($conn, $sql);
                        }
              }
              echo '<div class="list-cell attendance">'.$attendance_count.'</div>';
              echo '<div class="list-cell attendance">'.$notAttendance_count.'</div>';
             echo '</div>';
            }
        }
        echo '<div class="item_reg hidden"><input type="text" class="form-control" name="child_count" value="'.$child_count.'"></div>';
        echo '<div class="item_reg hidden"><input type="text" class="form-control" name="days_count" value="'.$days_in_month.'"></div>';
        echo '<div class="item_reg"><input class="btn" type="submit" name="submit" value="Pievienot" /> </div>';
        echo '</form>';      
     
     /*
      $conn->close();*/
    ?>
    </div>
    <img src="" alt="">
</body>
<script type="text/javascript" src="js/persona.js">
 </script> 
 <script type="text/javascript" src="js/grupa.js">
 </script> 
 <script type="text/javascript" src="js/validation.js"></script> 
</html>