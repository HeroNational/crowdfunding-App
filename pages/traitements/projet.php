<?php
    session_start();
    include("../../includes/connexionBd.php");
    $image=mt_rand(1,10000001221);
    $nom=$_POST['nom'];
    $objectif=$_POST['objectif'];
    $categorie=$_POST['categorie'];
    $description=$_POST['description'];
    $duree=$_POST['duree'];
    $slogan=$_POST['slogan'];
    $date=date("o-d-m");
    
    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {
      if ($_FILES['image']['size'] <= 20000000) {
        $infosfichier = pathinfo($_FILES['image']['name']);
        $infosfichier['extension']="jpg";
        $extension_image = $infosfichier['extension'];
        $extensions_permises = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_image, $extensions_permises)){
          move_uploaded_file($_FILES['image']['tmp_name'], '../../img/imgprojet/'.$image.'.'.$extension_image );
        }
      }else{
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Ce projet n'a pas pu etre soumis.";
        $_SESSION['notification_status']="error";
        header("location: ../");
      }
    }
    if(!isset($_FILES['image'],$_SESSION['image'])){
        if($_FILES['image']['size']==0){
          $image="default";
        }
      }

      if(!isset($_SESSION['id'])){
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Veillez vous connecter pour soumettre vos projets.";
        $_SESSION['notification_status']="info";
        header("location: ../inscription");
      }else{
        $id=$_SESSION['id'];
      }
    $values=array(
        'nom'=>$nom,
        'categorie'=>utf8_encode($categorie),
        'objectif'=>utf8_encode($objectif),
        'slogan'=>utf8_encode($slogan),
        'description'=>utf8_encode($description),
        'duree'=>utf8_encode($duree),
        'image'=>utf8_encode($image),
        'id'=>utf8_encode($id),
        'date'=>utf8_encode($date)
    );

    $submitProject=$bdd->prepare("INSERT INTO projet (nomProjet, categorie,objectif,slogan, description,duree,image,etat,internaute,date) VALUES (:nom,:categorie,:objectif,:slogan,:description,:duree,:image,0,:id,:date)");
    $submitProject->execute($values);

    if($submitProject){
        $_SESSION['notification']=true;
        $_SESSION['projet']=true;
        $_SESSION['notification_text']="<i class='ui check green'></i>&nbsp;&nbsp;Le projet est bien soumis et en attente de validation. Vous allez recevoir d'ici peu un mail des administrateurs s'agissant de la reunion de validation du projet.";
        $_SESSION['notification_status']="positive";
        header("location: ../../");
    }else{
        
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Ce projet n'a pas pu etre soumis.";
        $_SESSION['notification_status']="error";
    }

?>
