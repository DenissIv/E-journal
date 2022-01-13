<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>E-žurnāls</title>
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
        $theme = $_GET['theme'];
        $query = "SELECT * FROM `group` where ID_group = $id";
        $group_results = mysqli_query($conn, $query);
        if (mysqli_num_rows($group_results) > 0) {
            while($row = mysqli_fetch_assoc($group_results)) {
              $group_name = $row['Group_name'];   
            }
          }
  ?>
     <!-- Saite uz apmeklējuma tabulu-->
    <div class="skills_link"><?php echo '<a href="grupa.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up">Apmeklējuma tabula</a>'?></div>
    <div class="title">
    <div class="group_name_block">
        <div><h1 class="about group_name"><?php echo $group_name; ?></h1></div>
    </div>
     <!-- Grupas nosaukuma rediģēšanas forma-->
        <div id="myModalEdit" class="modal-edit">    
        <div class="modal-content-edit">
         <span class="close-edit">&times;</span>
        <form action="edit_group.php" method="POST" enctype="multipart/form-data">
        <div class="item_reg"><input type="text" class="form-control" name="name" id="name" value="<?php echo $group_name;?>" placeholder="Nosaukums"></div>
        <div class="item_reg hidden"><input type="text" class="form-control" name="group_id" id="group_id" value="<?php echo $id;?>"></div>
        <div class="item_reg"><input class="btn" type="submit" name="submit" value="Rediģēt nosaukumu" /> </div>
    </form>
    </div>
    </div>
     <!-- Gadu un mēnešu pārslēgšanas bloks-->    
    <div  class="year_block">
         <div class="back"> <?php echo "<a class='link_month' href='skills.php?id=$id&month=$page_month&year=$prev_year&sort=Surname&order=up&theme=$theme'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo '20'.$years[$page_year-21]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='skills.php?id=$id&month=$page_month&year=$next_year&sort=Surname&order=up&theme=$theme'> &rarr; </a>"?></div>      
        </div>
        <div  class="month_block">
         <div class="back"> <?php echo "<a class='link_month' href='skills.php?id=$id&month=$prev_month&year=$page_year&sort=Surname&order=up&theme=$theme'> &larr; </a>"?></div>    
        <h1 class="about"><?php echo $months[$page_month-1]; ?></h1>
        <div class="forward"><?php echo "<a class='link_month' href='skills.php?id=$id&month=$next_month&year=$page_year&sort=Surname&order=up&theme=$theme'> &rarr; </a>"?></div>      
        </div>
    </div>
    </div>
    <!-- Jomu saraksta bloks-->
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
    //saraksta kārtošana
    if($_GET['order'] == "up"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name ASC";
    }
    else if ($_GET['order'] == "down"){
    $query = "SELECT * FROM `child` where ID_group = $id  ORDER BY $sort_name DESC";
    }
        $group_results = mysqli_query($conn, $query);
        $child_count = 0;
        $i=0;
        //atkarībā no izvēlētās jomas tiek izveidots attiecīgs masīvs ar prasmēm.
        if($_GET['theme']==0){
            $skills = array('Saprot, ka ar vārdiem precīzāk var paust savas domas, vajadzības.','Atbild uz jautājumu ar darbību vai vārdiem.','Vārdiski vai ar darbību vēršas pie citiem, lai izteiktu savu vajadzību.'
            ,'Vārdos vai neverbāli pauž emocijas.','Klausās latviešu valodas vārdu skanējumā un reaģē uz atsevišķiem izteikumiem.', '*Sarunā pasaka un atkārto dažus biežāk dzirdētus vārdus.', 'Ieklausās tekstā, reaģē uz to ar emocijām, darbību un valodu'
            ,'Nosauc pazīstamus priekšmetus, dzīvas būtnes un darbības, ko veic pats un citi.', 'Klausās un atkārto dzirdētās skaņas.', 'Pievērš uzmanību rakstiskai informācijai.');
        }
        if($_GET['theme']==1){
            $skills = array('Saista sevi ar savu vārdu un ķermeni.','Piedalās pieaugušā organizētās aktivitātēs','Izrāda vēlmi veikt kādu darbību kopā ar citiem.','Izrāda līdzjūtību, kad cits ir sāpināts.','Vēršas pēc palīdzības pie pieaugušā ikdienas situācijās; pieņem palīdzību.'
            ,'Nosauc valsti, kurā dzīvo.','Atpazīst Latvijas karogu.','Mācās ievērot vienotus, vienkāršus kārtības un drošības noteikumus.','Novelk apģērbu un apavus ar pieaugušā palīdzību.','Mācās pareizi turēt un lietot karoti.');
        }
        if($_GET['theme']==2){
            $skills = array('Izmanto dažādas līnijas, laukumus, formas un krāsas radošajā darbā.','Piebalso pieaugušā dziedājumam.','Brīvi kustas mūzikas pavadījumā.',
            'Spēlējas ar rotaļlietām, sarunājas ar tām, runā to balsīs.','Runā skaitāmpantus.','Spontāni iesaistās mākslinieciskā darbībā.'
            ,'Izmanto mākslinieciskajā darbībā dažādus materiālus un tehniskos paņēmienus.','Rada skaņas ar dažādiem skaņu rīkiem.','Emocionāli atsaucas daudzveidīgām mākslas izpausmēm.','Piedalās gadskārtu svētku svinēšanā.');
        }
        if($_GET['theme']==3){
            $skills = array('Praktiskā darbībā iepazīst no plastmasas, papīra, akmens, koka izgatavotus priekšmetus.','Izmantojot maņas, novēro un iepazīst iežus un ūdeni.'
            ,'Nosauc novērotās dabas parādības, piemēram, lietus, sniegs, varavīksne, vējš.','Novēro un iepazīst tuvākajā apkārtnē sastopamos augus un dzīvniekus.');
        }
        if($_GET['theme']==4){
            $skills = array('Praktiskā darbībā atšķir jēdzienus viens, daudz.','Praktiskā darbībā nosauc priekšmetu skaitu trīs apjomā.','Praktiskā darbībā atlasa priekšmetus pēc kopīgām un atšķirīgām pazīmēm.'
            ,'Savieto priekšmetus attiecībā viens pret vienu.','Praktiskā darbībā atšķir jēdzienus īss, garš, plats, šaurs.','Veido taisnas rindas no priekšmetiem, ievēro atstarpes.','Atšķir priekšmetu apaļas un stūrainas formas apkārtējā vidē.','Praktiskā darbībā atšķir jēdzienus uz, zem, pie, aiz.');
        }
        if($_GET['theme']==5){
            $skills = array('Apgūst dažādus darba paņēmienus un drošības noteikumus savas ieceres īstenošanai no papīra un tekstilmateriāliem.','Rada konstrukciju, savietojot vienkāršus telpiskus objektus.'
            ,'Veido dažādas formas no piedāvātajiem plastiskajiem materiāliem – mīca, veltnē starp plaukstām, noapaļo, savieno detaļas.','Satver sīkus priekšmetus un veic darbības ar tiem.');
        }
        if($_GET['theme']==6){
            $skills = array('Pārvietojas vidē sev pieņemamā veidā, izmantojot vides un pieaugušā piedāvātās iespējas: soļo, skrien, rāpo, lien, veļas, lec, mācās noturēt līdzsvaru'
            ,'Pārvar šķēršļus sev pieņemamā veidā: kāpj, rāpjas, izlien, karājas rokās.','Pārvieto dažādus priekšmetus sev pieņemamā veidā: tver, padod, ripina, velk, stumj, met.'
            ,'Ar prieku iesaistās fiziskajās aktivitātēs telpās un ārā, ievēro dienas režīmu.','Veic ar personīgo higiēnu saistītas darbības pieaugušo uzraudzībā.');
        }
        echo '<div class="list-flex">';
              echo '<div class="child">Vārds, Uzvārds <a class="asc" href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=up&theme=$theme"></a> <a class="desc" href="skills.php?id='.$id.'&month='.$page_month.'&year='.$page_year.'&sort=Surname&order=down&theme=$theme"></a></div>';
              $days_in_month = cal_days_in_month(CAL_GREGORIAN,$page_month,2000+$page_year);
              for($i; $i<count($skills); $i++){
                  echo '<div class="list-cell">'.$skills[$i].'</div>';
              }
              echo '</div>';
              echo '<form action="insert_skills.php" method="POST" enctype="multipart/form-data">'; 
              
        if (mysqli_num_rows($group_results) > 0) {
            while($row = mysqli_fetch_assoc($group_results)) {
              $name = $row['Name'];  
              $surname = $row['Surname'];
              $child_id = $row['ID'];
              $child_count++;
              $i--; //samazina vērtību, jo uz šo brīdi tas ir lielāks nekā masīva garums.
              $query_skills = "SELECT * FROM `skills` where Child_id = $child_id AND Date = '20$page_year-$page_month-1' AND Skill_name='$skills[$i]'";
              $skills_results = mysqli_query($conn, $query_skills);
              echo '<div class="list-flex">';
              echo '<div class="child"><p>'.$name.' '.$surname.'</p></div>';
              echo '<div class="item_reg hidden"><input type="text" class="form-control" name="child_id[]" value="'.$child_id.'"></div>';
              $j=0;
            //cikls, kurš attēlo prasmju tabulu
              for($j; $j<count($skills); $j++){
                  //vaicājums, kurš atlasa bērnu, datumu un prasmes nosaukumu
                  $query_entry = "SELECT Mark FROM `skills` where Child_id = $child_id AND Skill_name = '$skills[$j]'
                AND Date = '20$page_year-$page_month-1'";
                  $entry_result = mysqli_query($conn, $query_entry);
                  $row = mysqli_fetch_assoc($entry_result);
                  echo '<div class="item_reg hidden"><input type="text" class="form-control" name="date[]" value="20'
                        .$page_year.'-'.$page_month.'-1"></div>';
                  echo '<div class="item_reg hidden"><input type="text" class="form-control" name="skill_name[]" 
                        value="'.$skills[$j].'"></div>';
                  echo '<select id="attendance" name="mark[]" class="list-cell">';
                  //sazarojumi, kuri atlas un izvada tabulā atbilstošu vērtējumu 
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
                       //Ja netika atrasts neviens ieraksts, tad tiek izveidots tukšs ieraksts tabulā
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
        echo '<div class="item_reg hidden"><input type="text" class="form-control" name="skills_count" value="'.count($skills).'"></div>';
        echo '<div class="item_reg"><input class="btn" type="submit" name="submit" value="Pievienot" /> </div>';
        echo '</form>';      
        $conn->close();
    ?>
    </div>
</body>
 <script type="text/javascript" src="js/activelink.js">
 </script> 
</html>