<?php 
   $sLangueNavigateur= substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if($sLangueNavigateur=="fr"){
        header("Location:pages/fr/");
    }elseif($sLangueNavigateur="es"){
        header("Location:pages/es/");
    }else{
        header("Location:pages/en/");
    }
 ?>