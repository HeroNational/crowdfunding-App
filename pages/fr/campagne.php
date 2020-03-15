<!DOCTYPE html>
<html lang="fr">
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
    <div style="width: 100%;position: relative; top: -70px;" >
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
              $sql=$bdd->query("select * from projet INNER JOIN internaute on internaute.idU=projet.internaute");
              $idProf=array();
              $wow=0;
              while($resultats=$sql->fetch(PDO::FETCH_OBJ)){
                $posHover=mt_rand(1,39);
          ?>
          <div class="three wide column">
              <div class="ui card">
                  <figure class=<?php echo $hover[$posHover]?> style="background:url(<?php echo $img='../../img/imgprojet/'.$resultats->image.'.jpg';?>); background-position-x:center; background-size:cover;">
                      <img src="<?php echo $img='../../img/imgprojet/'.$resultats->image.'.jpg';?>" alt="Montant visé <?php echo $resultats->objectif;?>" style='min-height:200px'/>
                      <figcaption>
                          <h3><?php echo $resultats->nomProjet ?></h3>
                          <p style="color:white">
                            la première plateforme camerounaise de covoiturage
                          </p>
                      </figcaption>
                  </figure>
                  <h1 class="ui header" style="margin-top:-6px"><?php echo $resultats->nomProjet ?></h1>
                  <div class="meta">
                  <?php echo $resultats->slogan ?>
                  </div>
                  <hr>
                  <span>
                      <span style="color:#ec4e43">
                          <?php echo mt_rand(10,365) ; ?>&nbsp;
                      </span>Jours restants
                  </span>
                  <br>
                  <?php 
                    $sommetotale=$resultats->objectif;;
                    $sommeacquise=mt_rand(0,400);
                    $per=($sommeacquise*100)/$sommetotale;
                    $sommetotale=number_format($sommetotale, 0,'.',' ');
                    $per=number_format($per, 0,'.', '');
                    
                  ?>
                  <br>
                  <div class=""><?php echo $per=($per<=100)?$per:"100"; echo " %". " de <b>".$sommetotale."</b> XAF"; ?></div>
                  <span class="ui extra">
                      <span class="ui purple progress active" style="height:13px!important">
                          <span class="bar" style="width:
                                <?php echo ($per);?>%;background:<?php
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
                  <form action="financement.php?id"><input type="hidden" name="projet" value="<?php echo ""; ?>"><button type="submit"  class="ui button orange fluid" style="padding:-5px 3px!important"><span class="lnr lnr-plus-circle"></span> Financer</button></form>
              
              </div>
          </div>
        <?php 
        }
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