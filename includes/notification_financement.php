<?php 
    if(isset($_GET['prodhgdthtrhydtrtrjutydrhrthwee']) and isset($_POST['montant']) and isset($_POST['number'])){
        $idProjet=$_GET['prodhgdthtrhydtrtrjutydrhrthwee'];
        if(!empty($_POST['montant']) and !empty($_POST['number'])){
            if($_POST['montant']>0){
            $date=date("o-m-d");
            $token='iwerwefojwdfvwaefiufdvsdfgsergweagfgfrnherg5454y5f45y54ttg54y54erw45ye4tg5yvgy5serergresag34t3445tt5454erst5ty5rtgrtg54g63rtg4rg56erg56hgytet4h5rthy6rthrtgb65rth';
            $value=financer($_POST['number'],$token,$_POST['montant']);
            $montant=$_POST['montant'];
            if($value['status']=="success"){
                if(isset($_SESSION['nom'])){
                $montant=$_POST['montant'];
                $idutio=$_SESSION['id'];
                $sql="INSERT INTO `financement` (`idFin`, `internaute`, `projet`, `montant`, `date`) VALUES (NULL, '$idutio', '$idProjet', '$montant', '$date');";
                }else{
                $number=$_POST['number'];
                $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `date`,`tel`) VALUES (NULL,'$idProjet', '$montant', '$date','$number);";
                
                if(isset($_POST['email'])){
                    if($_POST['email']){
                    $email=$_POST['email'];
                    $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `email`, `date`) VALUES (NULL,'$idProjet', '$montant','$email', '$date');";
                    }else{
                    $number=$_POST['number'];
                    $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `date`,`tel`) VALUES (NULL,'$idProjet', '$montant', '$date','$number');";
                    }
                }else{
                    $number=$_POST['number'];
                    $sql = "INSERT INTO `anonyme` (`id`, `idprojet`, `montant`, `date`,`tel`) VALUES (NULL,'$idProjet', '$montant', '$date','$number');";
                }
                }
                if($bdd->query($sql)){
                $val=(isset($value['nom']))?$value['nom']:'';
                $_SESSION['notification_text']="😋🤩 Merci bien ".$val." d'avoir participe a ce projet.";
                $_SESSION['notification']=true;
                $_SESSION['notification_status']="positive";
                }
            }else{
                
                $_SESSION['notification_text']="😱😒 Nous n'avons pas pu terminer l'action a cause de l'erreur '".$value['message']."'. Consulter votre banquier ou reessayez.";
                $_SESSION['notification']=true;
                $_SESSION['notification_status']="error";
            }
            }else{
            $_SESSION['notification_text']="Votre montant est de 0.";
            $_SESSION['notification']=true;
            $_SESSION['notification_status']="error";
            }
        }
    }
?>