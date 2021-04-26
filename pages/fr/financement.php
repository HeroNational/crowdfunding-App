<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">

<head>

    <?php 
  
      $index="financer"; 
      include("../../includes/header.php"); 
              !isset($_SESSION)?session_start():'';
      !isset($_GET['prodhgdthtrhydtrtrjutydrhrthwee'])?header("location: campagne.php"):'';
      empty($_GET['prodhgdthtrhydtrtrjutydrhrthwee'])?header("location: campagne.php"):'';
      $idProjet=$_GET['prodhgdthtrhydtrtrjutydrhrthwee'];
      $executions=$bdd->query("SELECT * FROM projet p,financement f, internaute i WHERE f.projet=p.idpro and i.idU=p.internaute and p.idpro='$idProjet' GROUP BY idpro");
      while($resultate=$executions->fetch(PDO::FETCH_OBJ)){
        echo "<title>".$resultate->nomProjet."</title>";
        $vue=$resultate->vue;
      }
      isset($vue)?$vue+1:'';
      if(isset($_SESSION['projet'])){
        $_SESSION['projet']!=$idProjet?$bdd->query("UPDATE projet SET vue='$vue' WHERE idpro='$idProjet'"):'';
      }
      $_SESSION['projet']=$idProjet;

?>
    <section id="helm" class="wow fadeIn">

        <div class="helm-container">
            <?php include("../../includes/menu.php"); ?>
            <style type="text/css">
            body {
                background-color: #DADADA;
            }

            body>.grid {
                height: 100%;
            }

            .columnForm {
                max-width: 450px;
            }
            </style>
            <?php
      $execution=$bdd->query("SELECT * FROM projet p,financement f,categorie c, internaute i WHERE f.projet=p.idpro and c.idcat=p.categorieProjet and i.idU=p.internaute and p.idpro='$idProjet' GROUP BY idpro");
      while($resultat=$execution->fetch(PDO::FETCH_OBJ)){
    ?>
            <h1 class="ui header blue center aligned segment"><?php echo utf8_decode(ucfirst($resultat->nomProjet));?></h1>
            <div style="padding:9px">
                <div class="hidden divider horizontal"></div>
                <div class="ui stackable grid center aligned">
                    <div class="ui six wide column">

                        <?php
              $dateN=date("y-m-d");

              $sqlB="SELECT duree FROM projet WHERE idPro like '$idProjet' and duree>='$dateN'";
              $stmt=$bdd->query($sqlB);
              while($datert=$stmt->fetch(PDO::FETCH_OBJ)) $datery=$datert->duree;
              if(isset($datery)){
          ?>
                        <div class="ui header teal">Finacer ce projet </div>
                        <center>
                            <form class="ui large form" action="" method="POST" style="max-width:370px;">
                                <div class="ui piled segment">
                                    <div class="field">
                                        <label for="" style="float:left">Montant</label>
                                        <div class="ui left icon input">
                                            <i class="money icon"></i>
                                            <input type="number" id='montant' name="montant" required="required"
                                                placeholder="Montant">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <label for="" style="float:left">Numero de telephone</label>
                                        <div class="ui left icon input">
                                            <i class="call icon"></i>
                                            <input type="number" id='montant' name="number" required="required"
                                                placeholder="Numero de telephone">
                                        </div>
                                    </div>
                                    <?php if(!isset($_SESSION['nom'])){?>

                                    <div class="field">
                                        <label for="" style="float:left">Adresse email</label>
                                        <div class="ui left icon input">
                                            <i class="mail icon"></i>
                                            <input type="email" required id='montant' name="email"
                                                value="<?php echo isset($_SESSION['mail'])?$_SESSION['mail']:'54'?>"
                                                placeholder="Adresse email">
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="field">
                                        <label for="" style="float:left">Message</label>
                                        <div class="ui left icon input">
                                            <textarea name="message" placeholder="message"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" name="projet" value="<?php echo utf8_decode($idProjet);?>">
                                    <input type="hidden" name="financeur"
                                        value="<?php (isset($_SESSION['id']))?$_SESSION['id']:null ?>">
                                    <button class="ui fluid large teal submit button">Valider</button>

                                </div>
                            </form>
                        </center>


                        <?php
            }else{
          ?>
                        <script>
                        swal("Oups...!", "\nCe projet est en fin de campagne.\n\n", "warning");
                        </script>
                        <div class="ui message red">Ce projet est en fin de campagne.
                            <br><br>
                            <a href="campagne.php" class="ui label teal">Consultez plus de campagnes</a>
                        </div>
                        <?php
            }
          ?>
                    </div>

                    <div class="ui five wide column left aligned">
                        <div class="ui grid">
                            <div class="ui row">
                                <div class="ui sixteen wide column" style="text-align: justify;">
                                    <span>
                                        <img alt="<?php echo $resultat->description ?>"
                                            src="../../img/imgprojet/<?php echo file_exists('../../img/imgprojet/'.$resultat->image.'.jpg')?utf8_decode($resultat->image).'.jpg':'default.jpg';?>"
                                            alt="" class="ui rounded image">
                                        <?php 
                    $requeteS="SELECT sum(montant) as acquis FROM financement where projet='$resultat->idpro'";
                    $executionS=$bdd->query($requeteS);
                    $resultsetS=$executionS->fetch(PDO::FETCH_OBJ);
                    $sommeacquise=$resultsetS->acquis;
                    $executionS->closecursor();
                    $diff=date_diff(date_create(date("y-m-d")),date_create(utf8_decode($resultat->duree)));
                ?>

                                    </span>
                                    <br>
                                    <?php 
                                    $sommetotale=$resultat->objectif;
                                    $per=($sommeacquise*100)/$sommetotale;
                                    $sommetotale=number_format($sommetotaleUnformated=$sommetotale, 2,'.',' ');
                                    $per=number_format($per, 2,'.', '');
                                    
                                ?>
                                    <br>
                                    <div class="">
                                        <span style="color:#ec4e43">
                                            <?php 
                          echo $diff->format("%a"); 
                        ?>

                                        </span>
                                        Jours restants&nbsp;&nbsp;&nbsp;
                                        <?php echo number_format($sommeacquise,0,"."," ").' XAF ('.number_format($per,2,'.',' ')."%) sur <b>".$sommetotale."</b> XAF"; ?>
                                    </div>
                                    <span class="ui extra">
                                        <span class="ui purple progress active" style="height:13px!important">
                                            <span class="bar" style="width:
                                  <?php echo ($per=($per<=100)?$per:"100");?>%;background:<?php
                                      if($per<16.66){
                                          $theming="217, 92, 92";
                                      }elseif($per>16.65 and $per <33.33){
                                          $theming="217, 166, 92";
                                      }elseif($per>33.32 and $per<49.99){
                                        $theming="230, 187, 72";
                                      }elseif($per>49.98 and $per<66.66){
                                        $theming="221, 201, 40";
                                      }elseif($per>66.65 and $per<83.33){
                                        $theming="180, 217, 92";
                                      }elseif($per>83.32 and $per<95.33){
                                          $theming="91, 189, 114, 0.671";
                                      }else{
                                        $theming="91, 189, 114";
                                      }
                                      echo "rgba(".$theming.")";
                                  ?>!important;  height:6px">
                                                <span class="progress"></span>
                                            </span>
                                        </span>
                                </div>
                                <div class="ui sixteen wide column"><br>
                                    <h1><u>Description</u></h1>
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo nl2br(utf8_decode($resultat->descriptionProjet));?>
                                </div>
                            </div>

                            <div class="ui row">
                                <div class="ui column" style="display:inline-flex">
                                    <h1>Date de fin de la campagne </h1>: <span class="ui meta">
                                        <?php echo '&nbsp;&nbsp;'.nl2br(utf8_decode(utf8_decode(formatsimpledate($resultat->duree,"fr"," "))));?></span>
                                </div>
                            </div>

                            <div class="ui row">
                                <div class="ui column" style="display:inline-flex">
                                    <h1>Categorie </h1>: <span class="ui meta">
                                        <?php echo '&nbsp;&nbsp;'.$resultat->categorie?></span>
                                </div>
                            </div>
                            <div class="ui row">
                                <div class="ui column">
                                    <h1>Projet supporté majoritairement par:</h1><br>
                                    <div class="ui row">
                                        <?php 
                                            $executions=$bdd->query("SELECT token,idu,internaute,prenom,nom ,sum(montant) as montant FROM financement f, internaute i WHERE f.projet='$idProjet' and f.internaute=i.idU  GROUP by i.idu order by montant DESC");
                                            while($resultats=$executions->fetch(PDO::FETCH_OBJ)){
                                                $idut=$resultats->idu;
                                        ?>
                                        <a
                                            href="profil.php?gh=llbregejg47egrseger4gesr&ko=true&ustreetyauijdnnn8isk=<?php echo nl2br(utf8_decode($resultats->token));?>&ht=0">
                                            <div class="ui statistic">
                                                <div class="">
                                                    <center>
                                                        <img src="../../img/imguser/<?php echo file_exists('../../img/imguser/'.$resultats->token.'.jpg')?utf8_decode($resultats->token).'.jpg':'default.png';?>"
                                                            class="ui circular avatar image"
                                                            alt="<?php echo nl2br(utf8_decode($resultats->prenom." ".$resultats->nom))?>"
                                                            title="<?php echo nl2br(utf8_decode($resultats->prenom." ".$resultats->nom))?>"
                                                            srcset="" style="border:1px solid teal ;">
                                                    </center>
                                                </div>
                                                <div class="label cfr">
                                                    <style>
                                                    .cfr::first-letter {
                                                        text-transform: capitalize;
                                                    }
                                                    </style>
                                                    <strong>
                                                        <?php echo nl2br(utf8_decode($resultats->prenom." ".$resultats->nom))?>
                                                    </strong>
                                                    <br>
                                                    <?php 
                                                        $per=(trim($resultats->montant)*100)/$sommetotaleUnformated;
                                                        $per=number_format($per, 2,'.',' ');
                                                        echo "<br>".number_format($resultats->montant, 2,'.',' ').' XAF ('.$per.'%)';
                                                    ?>
                                                </div>
                                            </div>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <?php
                   }
                   $executions->closeCursor();
                  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="ui five wide column">
                        <center>
                            <div class="ui card">
                                <div class="image dimmable dimmed">
                                    <img alt="<?php echo $resultat->description ?>"
                                        src="../../img/imguser/<?php echo file_exists('../../img/imguser/'.$resultat->token.'.jpg')?utf8_decode($resultat->token).'.jpg':'default.png';?>">
                                </div>
                                <div class="content">
                                    <div class="header" style="display:inline-flex;">
                                        <div class="formatnom">
                                            <?php echo utf8_decode($resultat->prenom."&nbsp;")?>
                                        </div>
                                        <div class="formatnom">
                                            <?php echo utf8_decode($resultat->nom)?>
                                        </div>
                                    </div>
                                    <style>
                                    .formatnom::first-letter {
                                        text-transform: capitalize !important;

                                    }
                                    </style>
                                    <div class="meta">
                                        <a class="group"><?php echo utf8_decode($resultat->sexe)?></a>
                                    </div>
                                    <div class="description">
                                        <?php echo nl2br(utf8_decode($resultat->description))?>
                                    </div>
                                </div>
                                <div class="extra content">
                                    <a class="friends">
                                        <a class="ui teal button"
                                            href="profil.php?<?php echo 'tokenized='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$resultat->token.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"
                                            style="color:white;">Contacter</a>

                                        </form>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>

                </div>

            </div>
            <style>
            #helm {
                width: 100%;
                height: 60px;
                background-size: 100%;
                position: relative;
                margin-top: 40px;
            }
            </style>

            <?php 
            }
            include("../../includes/footer.php");
          
        ?>
            </body>

</html>