<?php


  $urlConnexionBd="../../includes/connexionBd.php";
  include_once($urlConnexionBd);
  
  session_start();

  function connect($mail,$password,$bdd){
    $requette=$bdd->query("select * from internaute where email like '$mail' and password  like '$password'");
    $tetsPres=0;
    while($resultat=$requette->fetch(PDO::FETCH_OBJ)){
      $tetsPres=1;
      if($resultat->etatU==1){
        $_SESSION['id']=$resultat->idu;
        $_SESSION['id']=trim($resultat->idu);
        $_SESSION['nom']=trim($resultat->nom);
        $_SESSION['prenom']=trim($resultat->prenom);
        $_SESSION['token']=trim($resultat->token);
        $_SESSION['email']=trim($resultat->email);
        $_SESSION['etat']=trim($resultat->etatU);
        $_SESSION['sexe']=trim($resultat->sexe);
        $_SESSION['password']=trim($resultat->password);
        $_SESSION['description']=trim($resultat->description);

        $_SESSION['notification']=true;
        $_SESSION['notification_text']="Vous etes connectes au nom de ".$_SESSION['nom'];
        $_SESSION['notification_status']="positive";
      }else{
        
        $_SESSION['notification_text']=$concText=($resultat->sexe=="feminin")?" Cette utilisatrice a ete desactivee. Veillez contacter les administrateurs.":" Cet utilisateur a ete desactivee. Veillez contacter les administrateurs.";
        $_SESSION['notification']=true;
        $_SESSION['notification_status']="error";
      }
    }

    if($tetsPres==0){
      $_SESSION['notification_text']="Il semble que vous ne soyez pas inscrit. Veillez le faire gratuitement pour profiter de tous les services offerts par votre plateforme.";
      $_SESSION['notification']=true;
      $_SESSION['notification_status']="error";
    }     
  }


  if(isset($_POST['emailI'])){
    $email=$_SESSION['email']=trim(utf8_encode($_POST['emailI']));
    $password=$_SESSION['password']=trim(utf8_encode($_POST['passwordI']));
    $nom=$_SESSION['nom']=trim(utf8_encode($_POST['nomI']));
    $prenom=$_SESSION['prenom']=trim(utf8_encode($_POST['prenomI']));
    $sexe=$_SESSION['sexe']=trim(utf8_encode($_POST['sexeI']));
    $description=$_SESSION['description']=isset($_POST['descriptionI'])?trim(utf8_encode($_POST['descriptionI'])):"";
    if(isset($_POST["captcha"])){
      if($_POST['captcha']==$_SESSION["captcha"]){
        if (isset($_POST['emailI'],$_POST['passwordI'])){
      
          $emailSh=explode('.',$emailSh);
          $emailSh=trim(utf8_encode($emailSh[0]));
          $emailSh=explode('@',$emailSh);
          $emailSh=trim(utf8_encode($emailSh[0]));
          $image=$token=trim(utf8_encode(str_shuffle($emailSh.''.$nom.''.$prenom.'PusSiuAShhAjWQUXSJK84758szsdg44sddgaf00495zsrefkk')));
          $testT=0;
      
          if(!empty($_POST['emailI']) and !empty($_POST['passwordI'])){
              
            $requette=$bdd->query("select * from internaute where email like '$email'");
            while($resultat=$requette->fetch(PDO::FETCH_OBJ)){
                  $_SESSION['notification_status']="error";
                  $_SESSION['notification']=true;
                  $testT=1;
              if($resultat->etatU!=1){
                  
                  $concText=($resultat->sexe=="feminin")?" Cette utilisatrice ":" Cet utilisateur";
                  $_SESSION['notification_text']="Il existe deja ".$concText;
                  $_SESSION['notification_text']=$_SESSION['notification_text']." a ete desactive. Veillez contatcter les administrateurs.";
              }else{
                  $concText=($resultat->sexe=="feminin")?" une utilisatrice inscrite cet adresse email.":" un utilisateur cet adresse email.";
                  $_SESSION['notification_text']="Il existe deja ".$concText;
              }
              header("Location: ../fr");
            }

            if($testT!=1){
              $date=date('o-m-d');
              
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
                    $_SESSION['notification_text']="Il y a eu une erreur qui a interrompu votre inscription.";
                    $_SESSION['notification_status']="error";
                    header("location: ../fr");
                }
              }

              $requette=$bdd->query("INSERT INTO `internaute` (`idu`, `email`, `nom`, `prenom`, `password`, `sexe`, `token`, `etatU`,`date`,description) VALUES (NULL, '$email','$nom','$prenom','$password','$sexe','$token', '1','$date','$description')");
      
              connect($email,$password,$bdd);
              
              isset($_SESSION['submint_project'])?header("Location: ../fr/projet.php"):header("Location: ../fr/");
            }
          }else{
      //      exit();
      
          }
        }else{
      
        }
      }else{
        $_SESSION['notification']=true;
        $_SESSION['notification_text']="<i class='ui wrench icon' style='font-size:35px'></i>&nbsp;&nbsp;Reessayez le captcha.";
        $_SESSION['notification_status']="error";
        header("location: ../fr/inscription.php");
      }
      
    }
  }else{
      //Connexion
    if (isset($_POST['emailC'],$_POST['passwordC'])){
      if(!empty($_POST['emailC']) and !empty($_POST['passwordC'])){
        $mail=trim($_POST['emailC']);
        $password=trim($_POST['passwordC']);

        connect($mail,$password,$bdd);
        
        //isset($_SESSION['submint_project'])?header("Location: ../fr/projet.php"):header("Location: ./");
        header("Location: ../fr");
      }
    }else{
    //deconnexion 

      if(isset($_GET['out'])){
        if($_GET['out']==true){
          session_destroy();
          session_unset();
        }
        header("Location: ../fr/index.php");
      }
    }
  }
  
?>