<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Digitāla kapsēta</title>
    <style>
        .child{
            max-width: 150px;
            width: 150px;
            min-height: 25px;
    border: 1px solid;
    display: flex;
    align-items: center;
    padding: 0 0 0 5px;
        }
        .list-cell {
            padding: 5px;
            font-size: 15px;
            line-height: 16px;
            border: 1px solid;
            width: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
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
    $months = array('Janvāris','Februāris','Marts','Aprīlis','Maijs','Jūnijs','Jūlījs','Augusts','Septembris','Oktobris','Novmebris','Decembris');
    $years = array();
    $skills = array('Saprot, ka ar vārdiem precīzāk var paust savas domas, vajadzības.','Atbild uz jautājumu ar darbību vai vārdiem.','Vārdiski vai ar darbību vēršas pie citiem, lai izteiktu savu vajadzību.','Vārdos vai neverbāli pauž emocijas.','Klausās latviešu valodas
    vārdu skanējumā un reaģē
    uz atsevišķiem izteikumiem.', '*Sarunā pasaka un atkārto
    dažus biežāk dzirdētus
    vārdus.', 'Ieklausās tekstā, reaģē uz
    to ar emocijām, darbību
    un valodu', 'Nosauc pazīstamus
    priekšmetus, dzīvas būtnes
    un darbības, ko veic pats
    un citi.', 'Klausās un atkārto dzirdētās
    skaņas.', 'Pievērš uzmanību rakstiskai
    informācijai.','Saista sevi ar savu vārdu un ķermeni.','Piedalās pieaugušā organizētās aktivitātēs','Izrāda vēlmi veikt kādu darbību kopā ar citiem.','Izrāda līdzjūtību, kad cits ir sāpināts.','Vēršas pēc palīdzības pie pieaugušā ikdienas
    situācijās; pieņem palīdzību.','Nosauc valsti, kurā dzīvo.','Atpazīst Latvijas karogu.','Mācās ievērot vienotus, vienkāršus kārtības
    un drošības noteikumus.','Novelk apģērbu un apavus ar pieaugušā
    palīdzību.','Mācās pareizi turēt un lietot karoti.');
    for($i = 21;$i < 71;$i++) {
        $years[] = $i;
    }   
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

    //$current_month = date('m')-1;
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
    ?>
    <?php
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
    <div class="skills_link"><?php echo '<a href="grupa.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up">Apmeklējuma tabula</a>'?></div>
    <div class="title">
    <div class="group_name_block">
        <div><h1 class="about group_name"><?php echo $group_name; ?></h1></div>
    </div>
        <div id="myModalEdit" class="modal-edit">    
        <!-- Modal content -->
        <div class="modal-content-edit">
         <span class="close-edit">&times;</span>
        <form action="edit_group.php" method="POST" enctype="multipart/form-data">
        <div class="item_reg"><input type="text" class="form-control" name="name" id="name" value="<?php echo $group_name;?>" placeholder="Nosaukums"></div>
        <div class="item_reg hidden"><input type="text" class="form-control" name="group_id" id="group_id" value="<?php echo $id;?>"></div>
        <div class="item_reg"><input class="btn" type="submit" name="submit" value="Rediģēt nosaukumu" /> </div>
    </form>
    </div>
    </div>
        
    <div  class="year_block">
         <div class="back"> <?php echo "<a class='link_month' href='skills.php?id=$id&month=$page_month&year=$prev_year&sort=Surname&order=up'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo '20'.$years[$page_year-21]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='skills.php?id=$id&month=$page_month&year=$next_year&sort=Surname&order=up'> &rarr; </a>"?></div>      
        </div>
        <div  class="month_block">
         <div class="back"> <?php echo "<a class='link_month' href='skills.php?id=$id&month=$prev_month&year=$page_year&sort=Surname&order=up'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo $months[$page_month-1]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='skills.php?id=$id&month=$next_month&year=$page_year&sort=Surname&order=up'> &rarr; </a>"?></div>      
        </div>
    </div>
    </div>
    <div class="skills_category">
        <div class="first-row">
            <div > <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=0"';?>>Valodu mācību joma</a></div> 
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=1"';?>>Sociālā un pilsoniskā mācību joma</a></div>
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=2"';?>>Kultūras izpratnes un pašizpausmes mākslā mācību joma</a></div>
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=3"';?>>Dabaszinātņu mācību joma</a></div>
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=4"';?>>Matemātikas mācību joma</a></div>
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=5"';?>>Tehnoloģiju mācību joma</a></div>
            <div> <a class="theme_link" <?php echo 'href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=6"';?>>Veselības un fiziskās aktivitātes mācību joma</a></div>
        </div>
        <div class="second-row"></div>
    </div>
    <div class="cilveki-box">
    
    <?php
    function isWeekend($date) {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    } 
    $sort_name = $_GET['sort'];
    //$sort_order = $_GET['order'];
    if($_GET['order'] == "up"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name ASC";
    }
    else if ($_GET['order'] == "down"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name DESC";
    }
        $group_results = mysqli_query($conn, $query);
        $child_count = 0;
        $i=0;
        $length=10;
        if($_GET['theme']==1){
            $i=10;
            $j=10;
            $length=20;
        }
        echo '<div class="list-flex">';
              echo '<div class="child">Vārds, Uzvārds <a class="asc" href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up"></a> <a class="desc" href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=down"></a></div>';
              $days_in_month = cal_days_in_month(CAL_GREGORIAN,$page_month,2000+$page_year);
              for($i; $i<$length; $i++){
                  echo '<div class="list-cell">'.$skills[$i].'</div>';
              }
              echo '</div>';
              echo '<form action="insert_skills.php" method="POST" enctype="multipart/form-data">'; 
              
        if (mysqli_num_rows($group_results) > 0) {
            //output data of each row
            while($row = mysqli_fetch_assoc($group_results)) {
              $name = $row['Name'];  
              $surname = $row['Surname'];
              $child_id = $row['ID'];
              $child_count++;
              //$query_attendance = "SELECT * FROM `attendance` where Child_id = $child_id AND Date = '20$page_year-$page_month-1'";
              $i--;
              $query_skills = "SELECT * FROM `skills` where Child_id = $child_id AND Date = '20$page_year-$page_month-1' AND Skill_name='$skills[$i]'";
              $skills_results = mysqli_query($conn, $query_skills);
              echo '<div class="list-flex">';
              echo '<div class="child"><p>'.$name.' '.$surname.'</p></div>';
              echo '<div class="item_reg hidden"><input type="text" class="form-control" name="child_id[]" value="'.$child_id.'"></div>';
              $j=0;
              if($_GET['theme']==1){
                $j=10;
            }
              for($j; $j<$length; $j++){
                  //$query_entry = "SELECT Entry FROM `attendance` where Child_id = $child_id AND Date = '20$page_year-$page_month-$i'";
                  $query_entry = "SELECT Mark FROM `skills` where Child_id = $child_id AND Skill_name = '$skills[$j]' AND Date = '20$page_year-$page_month-1'";
                  $entry_result = mysqli_query($conn, $query_entry);
                  $row = mysqli_fetch_assoc($entry_result);
                  //$row['Entry']
                  echo '<div class="item_reg hidden"><input type="text" class="form-control" name="date[]" value="20'.$page_year.'-'.$page_month.'-1"></div>';
                  echo '<div class="item_reg hidden"><input type="text" class="form-control" name="skill_name[]" value="'.$skills[$j].'"></div>';
                  echo '<select id="attendance" name="mark[]" class="list-cell">';
                    if ($row['Mark']=='empty') {
                       echo '<option selected value="empty">-</option>';
                    } 
                       else {
                       echo '<option value="empty">-</option>';
                    }
                    if ($row['Mark']=='Sācis apgūt') {
                        echo '<option selected value="Sācis apgūt">Sācis apgūt</option>';
                     } 
                        else {
                        echo '<option value="Sācis apgūt">Sācis apgūt</option>';
                     }    if ($row['Mark']=='Turpina apgūt') {
                        echo '<option selected value="Turpina apgūt">Turpina apgūt</option>';
                     } 
                        else {
                        echo '<option value="Turpina apgūt">Turpina apgūt</option>';
                     }    if ($row['Mark']=='Apguvis') {
                        echo '<option selected value="Apguvis">Apguvis</option>';
                     } 
                        else {
                        echo '<option value="Apguvis">Apguvis</option>';
                     }    if ($row['Mark']=='Padziļināti apguvis') {
                        echo '<option selected value="Padziļināti apguvis">Padziļināti apguvis</option>';
                     } 
                        else {
                        echo '<option value="Padziļināti apguvis">Padziļināti apguvis</option>';
                     }
                       echo '</select>';
                        if (mysqli_num_rows($skills_results) ==0){
                        $date = '20'.$page_year.'-'.$page_month.'-1';
                        $sql = "INSERT INTO skills (Child_id, Skill_name, Mark, Date)
                        VALUES ('$child_id','$skills[$j]','empty', '$date')";
                        mysqli_query($conn, $sql);
                        }
              }
             echo '</div>';
            }
        }
        echo '<div class="item_reg hidden"><input type="text" class="form-control" name="child_count" value="'.$child_count.'"></div>';
        echo '<div class="item_reg"><input class="btn" type="submit" name="submit" value="Pievienot" /> </div>';
        echo '</form>';      
     
     /*
      $conn->close();*/
    ?>
    </div>
</body>
 <script type="text/javascript" src="js/activelink.js">
 </script> 
</html>