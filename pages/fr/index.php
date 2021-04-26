<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">

<head>
    <title>Abodah Funding</title>
    <?php ?>
    <?php  
      $index="index";
      include("../../includes/header.php");
            !isset($_SESSION)?session_start():'';
    ?>
    <section id="helm" class="wow fadeIn">

        <div class="helm-container">
            <?php
          include("../../includes/menu.php"); ?>
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

            <section class="text-center wow fadeInUp" style="position:relative; top:-160px;">
                <div class="container">
                    <div class="section-title text-center">
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-lg-3" style="background:white;">
                            <div class="ui horizontal statistics">
                                <div class="statistic">
                                    <div class="value">
                                        <i class="users icon"></i>
                                        <?php 
                      $requete=$bdd->query('select count(*) as nbre from internaute');
                      while ($res=$requete->fetch(PDO::FETCH_OBJ)) echo $res->nbre;
                    ?>
                                    </div>
                                    <div class="label">
                                        membres
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-4 col-lg-3" style="background:white;">
                            <div class="ui horizontal statistics">
                                <div class="statistic">
                                    <div class="value">
                                        <i class="credit card icon"></i>
                                        <?php 
                      $requete=$bdd->query('select count(*) as nbre from projet where etat=1');
                      while ($res=$requete->fetch(PDO::FETCH_OBJ)) echo $res->nbre;
                    ?>
                                    </div>
                                    <div class="label">
                                        projets financés
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-4 col-lg-3" style="background:white;">
                            <div class="ui horizontal statistics">
                                <div class="statistic">
                                    <div class="value">
                                        <i class="lnr lnr-apartment"></i>
                                        46
                                    </div>
                                    <div class="label">
                                        Entreprises nées
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <br>
            <hr>
            <div class="ui container text-center">
                <br>
                <div class="card" style="background-color:light-red; border-color:red;">
                    <div class="card-body">
                        <h4 class="card-title">La COVID-19 est est une realite.</h4>
                        <p class="card-text">
                            <?php
                include("../../includes/localcovid.php");
                if(isset($_SESSION['infocovid']['covid'])){
                  if($_SESSION['infocovid']['covid']==true){
                    $datecovid=explode(' ',$_SESSION['infocovid']['covid']['date']);
              ?>
                        <h2>Les statistiques pour le <span
                                class="ui header small orange"><?php echo $_SESSION['infocovid']['covid']['pays'].' le '.formatsimpledate($datecovid[0], 'fr', ' '); ?></span>
                        </h2>
                        Nombre de cas confirmes: <span
                            class="ui header red"><?php echo $_SESSION['infocovid']['covid']['confirmed']; ?></span><br>
                        Nombre de cas actifs: <span
                            class="ui header red"><?php echo $_SESSION['infocovid']['covid']['active']; ?></span><br>
                        Nombre de cas guerisons: <span
                            class="ui header green"><?php echo $_SESSION['infocovid']['covid']['recovered']; ?></span><br>
                        Nombre de morts de COVID-19: <span
                            class="ui header red"><?php echo $_SESSION['infocovid']['covid']['deaths']; ?></span><br><br>
                        <?php 
                  }
                }
              ?>
                        <div class="ui positive message">
                            Respectons les consignes gouvernementales
                        </div>. <br><br>

                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/coronavirus_wear_a_mask_icon_141048.png" alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/remove_behind_coronavirus_measures_mask_icon_133605.png" alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/closed_bin_mask_coronavirus_measures_icon_133590.png" alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/coronavirus_dont_touch_eyes_and_nose_icon_141054.png" alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/covid_corona_hygiene_health_protect_soap_coronavirus_icon_140798.png"
                            alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/covid_corona_hygiene_health_protect_clean_hand_coronavirus_icon_140801.png"
                            alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/self_protection_hand_wash_cleaning_healthcare_hygiene_medical_covid_coronavirus_icon_140736.png"
                            alt="">
                        <img class="card-img-top" style="max-width:6%"
                            src="../../img/covid-19/spreading_keep_distance_coronavirus_virus_pandemia_icon_134810.png"
                            alt="">

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <section id="features" class=" container text-center wow fadeInUp">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Quelques campagnes</h2>
                </div>
            </div>
            <div style="padding:0px 10px;
                  margin-Top:100px" class="ui center aligned stackable grid">
                <?php
            $conditionA=array("idpro","etat","nomProjet","objectif","slogan"); 
            $ordreA=array("DESC","ASC");
            $ioA=mt_rand(0,1);
            $icA=mt_rand(0,4);
            $conditionA=$conditionA[$icA]." ".$ordreA[$ioA];
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
            $requete="SELECT * FROM projet as p,financement as f where  f.projet=p.idpro and p.etat='1' and p.duree>='$dateN' group by idpro order by $conditionA  limit 3";
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
                        <figure class=<?php echo $hover[$posHover]?>
                            style="background: url(../../img/imgprojet/<?php echo utf8_decode($resultset->image) ?>.jpg);background-size:cover;">
                            <img src="../../img/imgprojet/<?php echo utf8_decode($resultset->image) ?>.jpg" />
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
                                <span style="color:#ec4e43">
                                    <?php     
                                $diff=date_diff(date_create(date("y-m-d")),date_create(utf8_decode($resultset->duree)));
                                echo $diff->format("%a"); 
                            ?>
                                    &nbsp;
                                </span>
                            </span>Jours restants
                        </span>
                        <br>
                        <?php 
                    $sommetotale=$resultset->objectif;
                    $per=($sommeacquise*100)/$sommetotale;
                    $sommetotale=number_format($sommetotale, 0,'.',' ');
                    $per=number_format($per, 0,'.', '');
                    
                  ?>
                        <br>
                        <div class="">
                            <?php echo number_format($sommeacquise,0,"."," ").' ('.$per."%) sur <b>".$sommetotale."</b> XAF"; ?>
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
                        </span>
                        <a href="financement.php?<?php echo 'token='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&prodhgdthtrhydtrtrjutydrhrthwee='.$resultset->idpro.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"
                            class="ui button orange fluid" style="padding:-5px 3px!important">Financer</a>

                    </div>
                </div>
                <?php 
          }
          $execution->closecursor();
        ?>
                <style>
                .explainProj::first-letter {
                    text-transform: capitalize;
                }

                .projetPre:hover {
                    box-shadow: black 0px 0px 17px;
                    transition: 200ms linear;
                }

                .extra a {
                    color: white !important;
                    transition: 300ms linear;
                    text-decoration: none !important;
                    background: rgba(224, 114, 11, 0.965) !important;
                }
                </style>

                <div class="ui horizontal divider">
                    <i class="heart icon"></i>
                </div>
                <br><br><br>
                <div class="ui grid">
                    <a href="campagne.php" class="ui message column center aligned allC"
                        style="background:<?php echo "rgba(".$theming.",0.4)";  ?>"><br> Cliquez ici pour voir toutes
                        les campagnes en cours<br><br></a>
                </div>
        </section>

        <style>
        .allC:hover {
            text-decoration: none;
        }

        .allC {
            letter-spacing: 0px;
            color: #999;
        }
        </style>

        <div class="ui horizontal divider">
            <i class="smile icon"></i>
        </div>
        <section class="text-center wow fadeInUp">

            <div class="ui container">
                <div class="section-title text-center">

                    <h2>Nos atouts </h2>
                    <p class="separator">Ce qui nous caractérise.</p>

                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-lg-4">
                        <div class="feature-block">
                            <img src="../../img/loader.gif" alt="img" class="img-fluid">
                            <h4>Simplicité et flexibilité</h4>
                            <p>La plateforme Abodah Funding s’est dotée de fonctionnalités et d’interfaces simples et
                                intuitives permettant ainsi à toutes personnes d’effectuer des opérations productives de
                                manière simple.</p>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 ui container ">
                        <div class="feature-block">
                            <img src="../../img/community.svg" class="img-fluid">
                            <h4>Notre communauté</h4>
                            <p>La communauté active et grandissante qui nous fait confiance chaque jour fait de plus en
                                plus preuve de dynamisme et de productivité. </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="feature-block">

                            <img src="../../img/partner.svg" alt="img" class="img-fluid">
                            <h4>Nos partenaires</h4>
                            <p>Du fait de notre compréhension, nous ne cessons de multiplier nos relations, permettant
                                ainsi de favoriser l’accompagnement des startups et PME dont nous facilitons le
                                financement de projets.</p>
                        </div>
                    </div>
                    <style>
                    .feature-block:hover img {
                        transform: scale(1.3);
                        cursor: pointer;
                        transition: 200ms linear;
                    }

                    .feature-block img {
                        transition: 200ms linear;
                    }
                    </style>
                </div>

            </div>
            <br>

            <div class="ui horizontal divider">
                <i class="empty star icon"></i>
            </div>
            <div class="section-title text-center">

                <h2>Nos objectifs</h2>

            </div>

        </section>
        <section id="about-us" class="about-us wow fadeInUp">
            <div class="container">
                <div class="row justify-content-center">
                    <span class="col-md-2 col-lg-8"><br><br>
                        <img src="../../img/f.png" alt="About">
                    </span>

                    <span class="col-md-7 col-lg-4">
                        <span class="about-content">

                            <h2><span>Abodah Corporation</span> une idéologie entrepreneuriale</h2>
                            <p>Le secteur de l’entreprise est bien pour certains encore mythisé. Nous vous offrons la
                                possibilité de vous faire connaitre, par vos produits.</p>

                            <ol>
                                <li><i class="lnr lnr-chevron-right fa"></i> Faciliter l'entrepreneuriat</li>
                                <li><i class="lnr lnr-chevron-right fa"></i> Modérer le chômage</li>
                                <li><i class="lnr lnr-chevron-right fa"></i> Susciter en chaque jeune l'esprit
                                    d'entreprise.</li>
                            </ol>

                        </span>
                    </span>

                </div>
            </div>
        </section>
        <div class="ui horizontal divider">
            <i class="notched circle loading icon"></i>
        </div>

        <section id="features" class="text-center wow fadeInUp">

            <div class="container">
                <div class="section-title text-center">
                    <h2>Nos services</h2>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 serv">
                        <div class="feature-block">
                            <i class=" lnr-gift  lnr img-fluid" style="font-size: xx-large;"></i>
                            <h4>La Collecte de fonds</h4>
                            <p>Nous collectons les fonds nécessaires à la réalisation de votre projet et nous les
                                mettons légalement à votre disposition. </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 serv">
                        <div class="feature-block">
                            <i class=" lnr-calendar-full  lnr img-fluid" style="font-size: xx-large;"></i>
                            <h4>Le suivi</h4>
                            <p>Nous vous tenons informé du moindre centime qui est collecté et nous vous faisons un
                                bilan de l’état de votre campagne.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 serv">
                        <div class="feature-block">
                            <i class=" lnr-users  lnr img-fluid" style="font-size: xx-large;"></i>
                            <h4>L'accompagnement</h4>
                            <p>Nous vous accompagnons dès lors que vous faites appel à nos services jusqu'à la
                                réalisation de votre projet.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 serv">
                        <div class="feature-block">
                            <i class=" lnr-code  lnr img-fluid" style="font-size: xx-large;"></i>
                            <h4>Le génie logiciel</h4>
                            <div>Abodah Corporation est une entreprise dotée d'une section informatique performante
                                prête à servir. </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="feature-block text-center col-md-6 col-lg-6 serv">
                        <i class=" lnr-earth  lnr img-fluid" style="font-size: xx-large;"></i>
                        <h4>La géomatique </h4>
                        <div class="col-md-12 col-lg-12">Abodah Corporation est une entreprise offre aux désireux des
                            solutions innovantes et performantes de géomatique. </div>
                    </div>
                    <div class="feature-block text-center col-md-6 col-lg-6 serv">
                        <i class=" lnr-flag  lnr img-fluid" style="font-size: xx-large;"></i>
                        <h4>Le service civique</h4>
                        <div class="col-md-12 col-lg-12">Dans un partenariat solide avec la DMJ, Abodah Corporation
                            poursuit une ideologie civique. </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <div class="section-title text-center">
                <h2>Les derniers articles du blog</h2>
            </div>
        </div>



        <section class="ui container wow slideInLeft">
            <div class="ui relaxed divided items">
                <div class="item">
                    <div class="ui small image">
                        <img src="../../img/logo.jpg">
                    </div>
                    <div class="content">
                        <a class="header" style="letter-spacing: 0px!important;">La DMJ, moteur de notre
                            accompagnement.</a>
                        <div class="meta">
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Date:</span> <?php echo (date("d")+6)."-".date("m-y") ?></a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Categorie:</span> Etreprenariat</a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Auteur:</span>Hamed Abou</a>
                        </div>
                        <div class="description">
                            Dans le plan de mise en place d'une entreprise, il se pose toujours....
                        </div>
                        <div class="extra">
                            <a href='vewarticle.php?test=1' class="ui right floated orange button">
                                Lire
                                <i class="right chevron icon"></i>
                            </a>
                            <div class="ui label" id="thumbLiker" style="cursor:pointer" onclick="liker()"><i
                                    class="lnr lnr-thumbs-up"></i>26</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui small image">
                        <img src="../../img/partner.svg">
                    </div>
                    <div class="content">
                        <a class="header" style="letter-spacing: 0px!important;">La DMJ, moteur de notre
                            accompagnement.</a>
                        <div class="meta">
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Date:</span> <?php echo (date("d")+1)."-".date("m-y") ?></a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Categorie:</span> Etreprenariat</a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Auteur:</span>Hamed Abou</a>
                        </div>
                        <div class="description">
                            Dans le plan de mise en place d'une entreprise, il se pose toujours....
                        </div>
                        <div class="extra">
                            <a href='vewarticle.php?test=1' class="ui right floated orange button">
                                Lire
                                <i class="right chevron icon"></i>
                            </a>
                            <div class="ui label" id="thumbLikero" style="cursor:pointer" onclick="likero()"><i
                                    class="lnr lnr-thumbs-up"></i>57</div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ui small image">
                        <img src="../../img/parallax2.jpg">
                    </div>
                    <div class="content">
                        <a class="header" style="letter-spacing: 0px!important;">La DMJ, moteur de notre
                            accompagnement.</a>
                        <div class="meta">
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Date:</span> <?php echo date("d-m-y") ?></a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Categorie:</span> Etreprenariat</a>
                            <a style="letter-spacing: 0px!important;"><span style="color:rgb(221, 138, 14)">
                                    Auteur:</span>Hamed Abou</a>
                        </div>
                        <div class="description">
                            Dans le plan de mise en place d'une entreprise, il se pose toujours....
                        </div>
                        <div class="extra">
                            <a href='vewarticle.php?test=1' class="ui right floated orange button">
                                Lire
                                <i class="right chevron icon"></i>
                            </a>
                            <div class="ui label" id="thumbLikerd" style="cursor:pointer" onclick="likerd()"><i
                                    class="lnr lnr-thumbs-up"></i> 89</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
        .serv {
            transition: 500ms linear;
            border: 1px solid transparent;
            padding: 8px 9px;
            margin-bottom: 20px;
        }

        .serv:hover {
            transition: 500ms linear;
            box-shadow: 0px 0px 5px 3px rgba(255, 140, 0, 0.562);
        }

        .serv i.lnr {
            transition: 200ms linear;
            position: relative;
            border-radius: 50%;
            top: 0px;
        }

        .serv:hover i.lnr {
            color: darkorange;
            background: transparent;
            position: relative;
            top: -24px;
            transition: 200ms linear;
            background: white;
            width: 30px;
            height: 30px;
        }
        </style>

        <?php 
          
            include("../../includes/footer.php");
          
        ?>
        <style>
        #helm {
            width: 100%;
            height: calc(100vh - 150px);
            background-size: 100%;
            position: relative;
            margin-top: 40px;
        }
        </style>
        </body>

</html>