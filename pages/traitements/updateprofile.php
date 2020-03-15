<?php 
    include("../../includes/connexionBd.php");
    $email=$_POST['email'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $sexe=empty($_POST['sexe'])?$_SESSION['sexe']:$_POST['sexe'];
    $password=$_POST['pass'];

    $email=trim($email);
    $nom=trim($nom);
    $prenom=trim($prenom);
    $sexe=trim($sexe);
    $password=trim($password);
    
    $sql="SELECT nom FROM internaute WHERE email='$email'";
    $execution=$bdd->query($sql);
    while($resultat=$execution->fetch(PDO::FETCH_OBJ)){
        if($resultat->nom!=$_SESSION['nom']){
         
            $_SESSION['notification']=true;
            $_SESSION['notification_text']="Cette adresse email est utilisee par un autre utilisateur.";
            $_SESSION['notification_status']="error";
            $_SESSION['mail']=true;
            header("location: ../fr/profil.php?state=2");
            $execution->closecursor();
            exit();
        }
    }

    $id=$_SESSION['id'];
    $submitProject=$bdd->query("UPDATE internaute set nom='$nom', prenom='$prenom',email='$email',password='$password',sexe='$sexe' where idU=$id");
    if($submitProject){
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Vos informations sont desormais a jour.";
        $_SESSION['notification_status']="positive";

        echo $_SESSION['nom']=$nom;
        echo $_SESSION['prenom']=$prenom;
        echo $_SESSION['email']=$email;
        //unset($GLOBALS);
        header("location: ../fr");
    }else{
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Une erreur s'est produite.";
        $_SESSION['notification_status']="error";
    }

?>