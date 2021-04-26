
<?php 
    // Daniel Uokof

    //Adresse de l'api https://extreme-ip-lookup.com/

    //04 fevrier 2020, Yaounde

    function get_ip()
    {

      //-- Fonction de récupération de l'adresse IP du visiteur
        if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
        {
            $ip  = $_SERVER['HTTP_CLIENT_IP'];
        }
        else
        {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
      isset($_GET['ip'])?$ip=$_GET['ip']:$ip;
      //Testeur d'adresse ip.

      $tabIp=explode(".",$ip);
      for($i=0;$i<4;$i++){
        isset($tabIp[$i])?$ipTrue=true:$ipTrue=false;
      }


      //Generateur d'adresse ip si la votre est incorrecte, si vous testez en local par exemple.

      $ipDefault='41.202.207.10';
      if($ipTrue==false){
            
        return array("ip"=>$ipDefault,"state"=>$ipTrue);
      }else{
        if($ip!="127.0.0.1"){
                return array("ip"=>$ip,"state"=>$ipTrue);
            }else{
                return array("ip"=>$ipDefault,"state"=>$ipTrue);
            }
      }
      
    }

    function apiGeoLocalisation()
    {
      $ipResponse=get_ip();
      $geo = @json_decode(file_get_contents("http://extreme-ip-lookup.com/json/".$ipResponse['ip']/*?callback=getIP*/));
      if(isset($geo->status)){
        if($geo->status=="success"){
          $_SESSION['pays']=$geo->country;
          $_SESSION['ville']=$geo->city;
          $_SESSION['ipType']=$geo->ipType;
          $_SESSION['countrycode']=$geo->countryCode;
          if($ipResponse["state"]==false){
                return false;	
                }
            return true;	
            }else{
            return false;	
          }
      }else{
            return false;	
        }
      
    }

    function iso3($pays){
        $iso=@json_decode(file_get_contents("https://restcountries.eu/rest/v2/alpha/$pays"), true);
        return array($iso['alpha3Code'], $iso['translations']['fr']);
    }

    function infocovid($pays){
        $pays=iso3($pays);
        $covid=json_decode(file_get_contents("https://covid-api.com/api/reports?iso=$pays[0]"), true);
        if(isset($covid['data'])){
            return array(true,$covid,$pays[1]);
        }else{
            return array(false);
        }
    }

    //Appel de la fonction 
    if(!isset($_SESSION['countrycode'])){
        apiGeoLocalisation();
        if(isset($_SESSION['countrycode'])){
            $informations=infocovid($_SESSION['countrycode']);
            if($informations[0]==false){
                $_SESSION['covid']=false;
            }else{
                $info['covid']=true;
                $info=array();
                $info['covid']['pays']=$informations[2];
                $info['covid']['date']=$informations[1]['data']['0']['last_update'];
                $info['covid']['recovered']=$informations[1]['data']['0']['recovered'];
                $info['covid']['deaths']=$informations[1]['data']['0']['deaths'];
                $info['covid']['active']=$informations[1]['data']['0']['active'];
                $info['covid']['confirmed']=$informations[1]['data']['0']['confirmed'];
                $_SESSION['infocovid']=$info;
            }
        }
    }
?>