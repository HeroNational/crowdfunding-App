<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">
<head>
    <title>Finance d'un projet</title>
    
    <?php 
      $index="projet"; 
      session_start(); 
      include("../../includes/header.php"); 
    ?>
    
    <section id="helm" class="wow fadeIn">

    <div class="helm-container">
    <?php include("../../includes/menu.php"); ?>
    <style type="text/css">
      body {
        background-color: #DADADA;
      }
      body > .grid {
        height: 100%;
      }
      .columnForm {
        max-width: 450px;
      }
    </style>
    <?php
      !isset($_GET['prodhgdthtrhydtrtrjutydrhrthwee'])?header("location: campagne.php"):'';
      empty($_GET['prodhgdthtrhydtrtrjutydrhrthwee'])?header("location: campagne.php"):'';
      $idProjet=$_GET['prodhgdthtrhydtrtrjutydrhrthwee'];
      $execution=$bdd->query("SELECT * FROM projet p,financement f, internaute i WHERE f.projet=p.idpro and i.idU=p.internaute and p.idpro='$idProjet' GROUP BY idpro");
      while($resultat=$execution->fetch(PDO::FETCH_OBJ)){
    ?>
    <h1 class="ui header blue center aligned segment"><?php echo utf8_decode($resultat->nomProjet);?></h1>
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
                    <input type="number" id='montant' name="montant" required="required" placeholder="Montant">
                  </div>
                </div>
                
                <div class="field">
                  <label for="" style="float:left">Numero de telephone</label>
                  <div class="ui left icon input">
                    <i class="call icon"></i>
                    <input type="number" id='montant' name="number" required="required" placeholder="Numero de telephone">
                  </div>
                </div>
                <?php if(!isset($_SESSION['nom'])){?>
                
                  <div class="field">
                    <label for="" style="float:left">Adresse email</label>
                    <div class="ui left icon input">
                      <i class="mail icon"></i>
                      <input type="email" id='montant' name="email" placeholder="Adresse email">
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
                <input type="hidden" name="financeur" value="<?php (isset($_SESSION['id']))?$_SESSION['id']:null ?>">
                <button class="ui fluid large teal submit button">Valider</button>
              
              </div>
            </form>
          </center>


          <?php
            }else{
          ?>
            <script>
              swal("Oups...!","\nCe projet est en fin de campagne.\n\n","warning");
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
                <a target="_blank" href="../../img/imgprojet/<?php echo file_exists('../../img/imgprojet/'.$resultat->image.'.jpg')?utf8_decode($resultat->image).'.jpg':'default.jpg';?>" alt="" class="ui rounded image">
                  <img alt="<?php echo $resultat->description ?>" src="../../img/imgprojet/<?php echo file_exists('../../img/imgprojet/'.$resultat->image.'.jpg')?utf8_decode($resultat->image).'.jpg':'default.jpg';?>" alt="" class="ui rounded image">
                </a>
              </div>
              <div class="ui sixteen wide column" ><br>
                <h1><u>Description</u></h1>
                 <br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo nl2br(utf8_decode($resultat->descriptionProjet));?>
              </div>
            </div>
            <div class="ui row">
              <div class="ui column" style="display:inline-flex">
                <h1>Date de fin de la campagne </h1>: <span class="ui meta"> <?php echo '&nbsp;&nbsp;'.nl2br(utf8_decode(utf8_decode(formatsimpledate($resultat->duree,"fr"," "))));?></span>
              </div>
            </div>
            <div class="ui row">
              <div class="ui column">
                <h1>Projet supporté majoritairement par:</h1><br>
                <div class="ui row">
                  <?php 
                    $executions=$bdd->query("SELECT token,idu,internaute,prenom,nom FROM financement f, internaute i WHERE f.projet='$idProjet' and f.internaute=i.idU  GROUP by i.idu order by f.montant DESC");
                    while($resultats=$executions->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <a href="profil.php?gh=llbregejg47egrseger4gesr&ko=true&ustreetyauijdnnn8isk=<?php echo nl2br(utf8_decode($resultats->token));?>&ht=0">
                    <div class="ui statistic">
                      <div class="">
                        <center>
                          <img src="../../img/imguser/<?php echo file_exists('../../img/imguser/'.$resultats->token.'.jpg')?utf8_decode($resultats->token).'.jpg':'default.png';?>" class="ui circular avatar image" alt="<?php echo nl2br(utf8_decode($resultats->prenom." ".$resultats->nom))?>" srcset="" style="border:1px solid teal ;">
                        </center>
                      </div>
                      <div class="label cfr">
                      <style>
                        .cfr::first-letter{
                          text-transform:capitalize;
                        }
                      </style>
                        <?php echo nl2br(utf8_decode($resultats->prenom." ".$resultats->nom))?>
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
                <img alt="<?php echo $resultat->description ?>" src="../../img/imguser/<?php echo file_exists('../../img/imguser/'.$resultat->token.'.jpg')?utf8_decode($resultat->token).'.jpg':'default.png';?>">
              </div>
              <div class="content">
                <div class="header" style="display:inline-flex;">
                  <div  class="formatnom">
                    <?php echo utf8_decode($resultat->prenom."&nbsp;")?>
                  </div>
                  <div  class="formatnom">
                    <?php echo utf8_decode($resultat->nom)?>
                  </div>
                </div>
                <style>
                  .formatnom::first-letter{
                    text-transform: capitalize!important;
                    
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
                  <a class="ui teal button" href="profil.php?<?php echo 'tokenized='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$resultat->token.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>" style="color:white;">Contacter</a>
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
                  height:60px;
                  background-size: 100%;
                  position: relative;
                  margin-top: 40px;
                }
              </style>

        <?php 
            }
            include("../../includes/footer.php");
          
        ?>
    </body >
</html>