<?php
    session_start(); 
    try{
        $api=new PDO("mysql:host=localhost;dbname=api",'root','');
        $api->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e;
    }
?>