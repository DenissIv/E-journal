<?php
    // savienojuma ar datu bāzi izveidošana
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "pii_zurnals";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>