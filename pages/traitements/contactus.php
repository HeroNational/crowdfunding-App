<?php 
    include("../../includes/connexionBd.php");
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $texte=$_POST['texte'];
    $date=date("r");

    $values=array(
        'nom'=>utf8_encode($nom),
        'email'=>utf8_encode($email),
        'texte'=>utf8_encode($texte),
        'date'=>utf8_encode($date)
    );
    $submitProject=$bdd->prepare("INSERT INTO message (nom, email,texte,etat,date) VALUES (:nom,:email,:texte,0,:date)");
    $submitProject->execute($values);
    if($submitProject){
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Vous recevrez un mail des administrateurs aussi vite qu'ils liront votre message";
        $_SESSION['notification_status']="info";
        //unset($GLOBALS);
        header("location: ../../");
    }else{
        
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Votre message n'est pas parvenu aux administrateurs.";
        $_SESSION['notification_status']="warning";
    }

?>