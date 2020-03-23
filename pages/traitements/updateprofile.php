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

    $emailSh=explode('.',$email);
    $emailSh=trim(utf8_encode($emailSh[0]));
    $emailSh=explode('@',$emailSh);
    $emailSh=trim(utf8_encode($emailSh[0]));
    $image=$token=trim(utf8_encode(str_shuffle($emailSh.''.$nom.''.$prenom.'PusSiuAShhAjWQUXSJK84758szsdg44sddgaf00495zsrefkk')));

    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
        if ($_FILES['image']['size'] <= 20000000) {
            $infosfichier = pathinfo($_FILES['image']['name']);
            $infosfichier['extension']="jpg";
            $extension_image = $infosfichier['extension'];
            $extensions_permises = array('jpg', 'jpeg', 'gif', 'png');
            if (in_array($extension_image, $extensions_permises)){
                move_uploaded_file($_FILES['image']['tmp_name'], '../../img/imguser/'.$image.'.'.$extension_image );
            }
        }else{
            $_SESSION['notification']=true;
            $_SESSION['notification_text']="Il y a eu unee erreur qui a interrompu votre inscription.";
            $_SESSION['notification_status']="error";
            header("location: ../fr");
        }
    }
    if(isset($_FILES['image'])){
        $submitProject=$bdd->query("UPDATE internaute set nom='$nom', prenom='$prenom',email='$email',password='$password',sexe='$sexe',token='$token' where idU=$id");
    }else{
        $submitProject=$bdd->query("UPDATE internaute set nom='$nom', prenom='$prenom',email='$email',password='$password',sexe='$sexe' where idU=$id");
    }
    if($submitProject){
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Vos informations sont desormais a jour.";
        $_SESSION['notification_status']="positive";

        $_SESSION['id']=trim($id);
        $_SESSION['nom']=trim($nom);
        $_SESSION['prenom']=trim($prenom);
        $_SESSION['token']=trim($token);
        $_SESSION['email']=trim($email);
        $_SESSION['etat']=trim($etat);
        $_SESSION['sexe']=trim($sexe);
        $_SESSION['description']=trim($description);
        //unset($GLOBALS);
        header("location: ../fr");
    }else{
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Une erreur s'est produite.";
        $_SESSION['notification_status']="error";
    }

?>