<?php 
    include("../../includes/connexionBd.php");
    $email=$_POST['emailn'];

    $sql="SELECT email FROM newsletter WHERE email='$email'";
    $execution=$bdd->query($sql);
    while($execution->fetch()){
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Vous avez deja une inscription valide.";
        $_SESSION['notification_status']="positive";
        $_SESSION['mail']=true;
        header("location: ../fr");
    }
    if(isset($_SESSION['mail'])){
        $values=array(
            'email'=>utf8_encode($email),
        );
        $submitProject=$bdd->prepare("INSERT INTO newsletter (email) VALUES (:email)");
        $submitProject->execute($values);
        if($submitProject){
            $_SESSION['notification']=true;
            $_SESSION['notification_text']="Vous recevrez desormais des mails mensuels vous informant sur la plateforme.";
            $_SESSION['notification_status']="info";
            //unset($GLOBALS);
            header("location: ../fr");
        }else{
            
            $_SESSION['notification']=true;
            $_SESSION['notification_text']="Votre inscription a echoue.";
            $_SESSION['notification_status']="error";
        }
    }

?>