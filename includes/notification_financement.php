<?php 
    include("../../includes/connexionbd.php"); 
    
    function financer($number,$token,$montant){
      $url="http://localhost/Crowdfunding/api/api_rest.php?number=$number&token=$token&somme=$montant";
      //if(file_exists($url)){
       
        $api = @json_decode(file_get_contents($url));
        $value=array();
        if(isset($api->status)){
            if($api->status=="success"){
                $value=array("status"=>$api->status,"message"=>$api->message,"nom"=>$api->nom);
            }else{
                $value=array("status"=>$api->status,"message"=>$api->message);
            }
        }   
      //}else{
        //$value=array("status"=>"error","message"=>"API Location not found");
      //}
      
        return $value;
        
    }
    
    if(isset($_GET['prodhgdthtrhydtrtrjutydrhrthwee']) and isset($_POST['montant']) and isset($_POST['number'])){
        $idProjet=$_GET['prodhgdthtrhydtrtrjutydrhrthwee'];
        if(!empty($_POST['montant']) and !empty($_POST['number'])){
            if($_POST['montant']>0){
                $date=date("o-m-d");
                $token='iwerwefojwdfvwaefiufdvsdfgsergweagfgfrnherg5454y5f45y54ttg54y54erw45ye4tg5yvgy5serergresag34t3445tt5454erst5ty5rtgrtg54g63rtg4rg56erg56hgytet4h5rthy6rthrtgb65rth';
                $value=financer($_POST['number'],$token,$montant=$_POST['montant']);
                $valueStatus=isset($value['status'])?$value['status']:'';
                if($valueStatus=="success"){
                    if(isset($_SESSION['nom'])){
                        $montant=$_POST['montant'];
                        $idutio=$_SESSION['id'];
                        $sql="INSERT INTO `financement` (`idFin`, `internaute`, `projet`, `montant`, `date`) VALUES (NULL, '$idutio', '$idProjet', '$montant', '$date');";
                    }else{
                        if(isset($_POST['email'])){
                            if($_POST['email']){
                                $email=$_POST['email'];
                                $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `email`, `date`) VALUES (NULL,'$idProjet', '$montant','$email', '$date');";
                            }else{
                                $number=$_POST['number'];
                                $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `date`,`tel`) VALUES (NULL,'$idProjet', '$montant', '$date','$number');";
                            }
                        }
                    }
                        
                    if($bdd->query($sql)){
                        $val=(isset($value['nom']))?$value['nom']:'';
                        $_SESSION['notification_text']="😋🤩 Merci bien ".$val." d'avoir participé a ce projet.";
                        $_SESSION['notification']=true;
                        $_SESSION['notification_status']="positive";
                    }else{
                        $messager=isset($value['message'])?$value['message']:' ';
                        $_SESSION['notification_text']="😱😒 Nous n'avons pas pu terminer l'action a cause d'un problème interne à notre serveur: Nous trqvqillons pour y remédier.";
                        $_SESSION['notification']=true;
                        $_SESSION['notification_status']="error";
                    }
                    header("location: ./financement.php?token=gkearwfg4wfe2s4egwrge3GahhrgeF4wagaehggef2febEa4w5g5ef5ww3fwej4we&prodhgdthtrhydtrtrjutydrhrthwee=".$_GET['prodhgdthtrhydtrtrjutydrhrthwee']."&kind=gggr4eEg4aGrwe5eFegg42w43a45efr2a53");
                }else{
                    $messager=isset($value['message'])?$value['message']:'Fail Payement service';
                    $_SESSION['notification_text']="😱😒 Nous n'avons pas pu terminer l'action a cause de l'erreur <b> "./*$messager*/ print_r($value)." ' </b>. Consulter votre banquier ou reessayez.";
                    $_SESSION['notification']=true;
                    $_SESSION['notification_status']="error";
                }
            }else{
                $_SESSION['notification_text']="Votre solde est de 0.";
                $_SESSION['notification']=true;
                $_SESSION['notification_status']="error";
            }
        }
    }
?>