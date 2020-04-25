<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">
<head>
    <title>Toutes les campagnes</title>
    
    <?php $index="financer"; include("../../includes/header.php"); ?>
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

      <div class="container">
        <div class="ui simple dropdown item">
          <span class="ui header">Trier par</span> <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="#">Type de projets</a>
            <a class="item" href="#">Entrepreneurs</a>
            <div class="divider"></div>
            <a class="item" href="#">Les plus recents</a>
            <a class="item" href="#">Les plus anciens</a>
          </div>
        </div>

        <div class="ui action left icon input" style="float:right">
          <i class="search icon"></i>
          <input type="text" placeholder="Search..." class="ui large">
          <span class="ui teal button">Rechercher</span>
        </div>
        
        <div class="section-title text-center">
          <h2>Toutes les campagnes</h2>
        </div>
      </div>
    <div style="width: 100%;position: relative; top: -70px;" class='ui container'>
    <div 
          style="padding:0px 10px;
                  margin-Top:100px"
              class="ui center aligned stackable grid"
      >
          <?php 
              $hover=array(
                1=>"imghvr-fade",
                2=>"imghvr-push-up",
                3=>"imghvr-push-down",
                4=>"imghvr-push-left",
                5=>"imghvr-push-right",
                6=>"imghvr-slide-up",
                7=>"imghvr-slide-down",
                8=>"imghvr-slide-left",
                9=>"imghvr-slide-right",
                10=>"imghvr-reveal-up",
                11=>"imghvr-reveal-right",
                12=>"imghvr-reveal-left",
                13=>"imghvr-hinge-up",
                14=>"imghvr-flip-horiz",
                15=>"imghvr-flip-vert",
                16=>"imghvr-flip-diag-1",
                17=>"imghvr-flip-diag-2",
                18=>"imghvr-shutter-out-horiz",
                19=>"imghvr-shutter-out-vert",
                20=>"imghvr-shutter-out-diag-1",
                21=>"imghvr-shutter-out-diag-2",
                22=>"imghvr-shutter-in-horiz",
                23=>"imghvr-shutter-in-vert",
                24=>"imghvr-shutter-in-out-horiz",
                25=>"imghvr-shutter-in-out-diag-1",
                26=>"imghvr-shutter-in-out-vert",
                27=>"imghvr-shutter-in-out-diag-2",
                28=>"imghvr-shutter-in-out-vert",
                29=>"imghvr-fold-up",
                30=>"imghvr-fold-down",
                31=>"imghvr-fold-left",
                32=>"imghvr-fold-right",
                33=>"imghvr-zoom-in",
                34=>"imghvr-zoom-out",
                35=>"imghvr-zoom-out-up",
                36=>"imghvr-zoom-out-down",
                37=>"imghvr-zoom-out-left",
                38=>"imghvr-zoom-out-right",
                39=>"imghvr-zoom-out-flip-vert",
                40=>"imghvr-blur"
              );
                $dateN=date("y-m-d");
                $requete="SELECT * FROM projet as p,financement as f where  f.projet=p.idpro and p.etat='1' and p.duree>='$dateN' group by idpro order by f.montant ASC";
                $execution=$bdd->query($requete);
                while($resultset=$execution->fetch(PDO::FETCH_OBJ)){
                  $posHover=mt_rand(1,39);
                  $sommeacquise=mt_rand(1,1000000);
                  $requeteS="SELECT sum(montant) as acquis FROM financement where projet='$resultset->idpro'";
                  $executionS=$bdd->query($requeteS);
                  $resultsetS=$executionS->fetch(PDO::FETCH_OBJ);
                  $sommeacquise=$resultsetS->acquis;
                  $executionS->closecursor();
            ?>
            <div class="five wide center aligned column">
                <div class="ui card">
                    <figure class=<?php echo $hover[$posHover]?> style="background: url(../../img/imgprojet/<?php echo utf8_decode($resultset->image) ?>.jpg);background-size:cover;">
                        <img src="../../img/imgprojet/<?php echo utf8_decode($resultset->image) ?>.jpg"/>
                        <figcaption>
                            <h3><?php echo '<u>'.$resultset->nomProjet.'</u>'?></h3>
                            <p style="color:white">
                              <?php echo utf8_decode($resultset->slogan); ?>
                            </p>
                        </figcaption>
                    </figure>
                    <h1 class="ui header" style="margin-top:-6px">
                      <?php echo utf8_decode($resultset->nomProjet) ?>
                    </h1>
                    <div class="meta">
                      <?php echo utf8_decode($resultset->slogan) ?>
                    </div>
                    <hr>
                    <span>
                        <span style="color:#ec4e43">
                            <?php     
                                $diff=date_diff(date_create(date("y-m-d")),date_create(utf8_decode($resultset->duree)));
                                echo $diff->format("%a"); 
                            ?>
                            &nbsp;
                        </span>
                        Jours restants
                    </span>
                    <br>
                    <?php 
                      $sommetotale=$resultset->objectif;
                      $per=($sommeacquise*100)/$sommetotale;
                      $sommetotale=number_format($sommetotale, 0,'.',' ');
                      $per=number_format($per, 0,'.', '');
                      
                    ?>
                    <br>
                    <div class=""><?php echo number_format($sommeacquise,0,"."," ").' ('.$per."%) sur <b>".$sommetotale."</b> XAF"; ?></div>
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
                    </span>
                    <a href="financement.php?<?php echo 'token='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&prodhgdthtrhydtrtrjutydrhrthwee='.$resultset->idpro.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"   class="ui button orange fluid" style="padding:-5px 3px!important">Financer</a>
                
                </div>
            </div>
          <?php 
            }
            $execution->closecursor();
          ?>
   
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
          
            include("../../includes/footer.php");
          
        ?>
    </body >
</html>