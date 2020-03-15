<?php 
    session_start();
    echo"<meta charset='utf-8'>";
    $server = 'localhost';
    $login = 'root';
    $pass = '';
    $db='abodah';

    try
    {
            $bdd = new PDO("mysql:host=$server;dbname=$db", $login, $pass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        $a=$e->getMessage();
        $a=explode("SQLSTATE[HY000] [1049] Unknown database",$e);
        if($a[0]="SQLSTATE[HY000] [1049] Unknown database'"){
            echo "<br><br><br><center style='position:relative; top:150px; font-size:25px;' ><i class='lnr lnr-cog' style='font-size:70px; color:red'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Base de donnees inconnue. ";
            echo "</center>";
        }
        die;
    }
?>