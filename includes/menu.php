<?php
  $urlConnexionBd="../../includes/connexionBd.php";
  include_once($urlConnexionBd);
  $_SESSION['page']=$index;
  if (isset($_POST['emailC'],$_POST['passwordC'])){
    if(!empty($_POST['emailC']) and !empty($_POST['passwordC'])){
      $mail=trim($_POST['emailC']);
      $password=trim($_POST['passwordC']);
      $sql="select * from internaute where email like '$mail' and password  like '$password'";
      $requette=$bdd->query("select * from internaute where email like '$mail' and password  like '$password'");
      $tetsPres=0;
      while($resultat=$requette->fetch(PDO::FETCH_OBJ)){
        $tetsPres=1;
        if($resultat->etat!=0){
          $_SESSION['id']=$resultat->idu;
          $_SESSION['nom']=$resultat->nom;
          $_SESSION['prenom']=$resultat->prenom;
          $_SESSION['token']=$resultat->token;
          $_SESSION['email']=$resultat->email;
          $_SESSION['etat']=$resultat->etat;

          $_SESSION['notification']=true;
          $_SESSION['notification_text']="Vous etes connectes au nom de ".$_SESSION['nom'];
          $_SESSION['notification_status']="positive";
        }else{
          
          $_SESSION['notification_text']=$concText=($resultat->sexe=="feminin")?" Cette utilisatrice a ete desactivee. Veillez contacter les administrateurs.":" Cette utilisateur a ete desactivee. Veillez contacter les administrateurs.";
          $_SESSION['notification']=true;
          $_SESSION['notification_status']="error";
        }
      }

      if($tetsPres==0){
        $_SESSION['notification_text']="Il semble que vous ne soyez pas inscrit. Veillez le faire gratuitement pour profiter de tous les services offerts par votre plateforme.";
        $_SESSION['notification']=true;
        $_SESSION['notification_status']="error";
       }     
      isset($_SESSION['submint_project'])?header("Location: ../fr/projet.php"):header("Location: ./");
    }else{
//      exit();

    }
  }else{

  }
  if(isset($_GET['out'])){
    if($_GET['out']==true){
      session_destroy();
      session_unset();
    }
    header("Location: index.php");
  }
?>


            <div id="backBlackScroll" >
                <header id="header" class="header-lg header-mob header-hideEs">
                    <div class="container menu-container">
                        <span id="logo" class="pull-left" style="position: absolute; left:25px; top:0px;">
                            <h1>
                                <a href="#body"><img src="../../img/logo.jpg" width="135"  style="position: relative; top:-3px; border-radius: 4px;" alt="" title="The one you are, be you, be active" /></a>
                            </h1>
                        </span>

                        <nav id="nav-menu-container">
                            <ul class="nav-menu">
                            <li class="<?php if($index=="index") echo "menu-active"; ?>"><a href="index.php"><span class="lnr lnr-home"></span>&nbsp;&nbsp;Accueil</a></li>
                            <li class="menu-has-children <?php if($index=="financer") echo "menu-active"; ?>"><a href="#"><span class="lnr lnr-rocket"></span class="lnr lnr-rocket">&nbsp;&nbsp;Financer</a>
                                <ul>
                                  <li><a href="#">Guide de financement</a></li>
                                  <li><a href="campagne.php">Toutes les campagnes</a></li>
                                </ul>
                            </li>
                            <li class="menu-has-children <?php if($index=="entreprendre") echo "menu-active"; ?>"><a href="#"><span class="lnr lnr-briefcase"></span class="lnr lnr-briefcase">&nbsp;&nbsp;Entreprendre</a>
                                <ul>
                                  <li><a href="entreprise.php">Guide entreprise</a></li>
                                  <li><a href="projet.php">Soumettre un projet</a></li>
                                </ul>
                            </li>
                            <li  class="<?php if($index=="blog") echo "menu-active"; ?>"><a href="blog.php"><span class="lnr lnr-link"></span class="lnr lnr-link">&nbsp;&nbsp;Blog</a></li>
                            <li class="<?php if($index=="contact") echo "menu-active"; ?>"><a href="contactus.php"><span class="lnr lnr-phone-handset"></span class="lnr lnr-phone-handset">&nbsp;&nbsp;Contact</a></li>
                            
                            <li class="item"></li>
                            <?php
                              if(isset($_SESSION['token'])){
                                if(!empty($_SESSION['token'])){
                            ?>      
                              <li class="item">
                                <?php include("menuConnected.php"); ?>
                              </li>
                            <?php
                                }
                              }else{
                            ?>
                              
                                <li ><a href="inscription.php" class=" myButton ui button" style="margin-top: 5px;background:rgba(224, 114, 11)!important;font-weight:250;color:white;margin-right:-10px;"  href="#"><i class="lnr lnr-enter"></i>&nbsp;Inscription</a></li>
                                <li onclick="modalcon()" id="conbtn"><a  id="modalCon" class=" myButton ui button" style="margin-top: 5px; background:rgb(4, 166, 180)!important; font-weight:250;color: rgb(255, 255, 255);margin-right:-160px;"><i class="lnr  lnr-enter-down"></i>&nbsp;Connexion</a></li onclick="modalcon()">
                            <?php
                              }
                            ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>

            
      <section id="connectm">
          <div class="ui active dimmer padd-section" style="z-index: 100; position:fixed;" id="connectcon">
            <div class="row">
              <div class="col-ms-2 col-lg-2">
              </div>
              <div class="col-ms-8 col-md-12 col-lg-8" style=" padding-bottom:40px;">
                <div class="ui middle aligned center aligned grid" style="margin-top:25px;">
                  <div class="columnForm column">
                    <a class="lnr lnr-cross" onclick="closemodalcon()" id="closebtn" style="background:transparent; border: 0px; cursor: pointer; color:white; font-size:30px; position:fixed; right:160px;top:50px;"></a>
                    <form class="ui large form" action="" method="POST">
                      <div class="ui stacked segment">
                        <h2 class="ui orange header left aligned">
                          <div class="header">
                            Connexion
                          </div>  
                        </h2>
                        <div class="field">
                          <div class="ui left icon input">
                            <i class="user icon pink"></i>
                            <input type="email" name="emailC" placeholder="Adresse E-mail">
                          </div>
                        </div>
                        <div class="field">
                          <div class="ui left icon input">
                            <i class="lock icon blue"></i>
                            <input type="password" name="passwordC" placeholder="Mot de passe">
                          </div>
                        </div>
                        <button class="ui fluid large orange submit button" id="subconbtn">Connexion</button>
                        <style>
                          .ui.stacked.segment::after, .ui.stacked.segment::before{
                            display: none!important;
                          }
                        </style>
                      </div>
                    </form>
                    <div class="ui message">
                      Vous êtes nouveau? <a href="#" onclick="closemodalcon(); modallog();" style="letter-spacing:0px;"><span style="color:rgb(66, 146, 12); font-size:x-large">+</span> Inscription</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-ms-2 col-lg-2">
              </div>
            </div>
          </div>
        </section>


          <?php if($index=="index"){?>
            
            <div  id="particles-js">
              <div style="position:relative; top:400px;">
                <h1>Abodah Funding</h1>
                <h3 class="light white"></h3>
                <h2 class="">Le financement meilleur de vos projets.</h2>
                <a href="projet.php" class="btn-get-started scrollto">Nouveau projet</a>
                <div class="btns">
                  <!--
                    <a href="#">Toutes les campagnes</a>
                    <a href="#">Financer un projet</a>
                    <a href="#"></i> </a>
                  -->
                </div>
              </div>
              
            </div>
            <?php }?>
        </div>
    </section>

    <script>
      function textMonter(){
        var valeurActuelle=$('#montant').val();
        valeurVraie=0;
        if (is_int(valeurActuelle)){
          valeurVraie=valeurActuelle;
        }
        $('#montant').append(valeurActuelle);
      }
    </script>
    <?php 
    if (isset($_SESSION['notification'])){
      if ($_SESSION['notification']==true){
    ?>
      <div onclick="$(this).slideToggle(100)"  class="ui  messageNotification <?php echo $_SESSION['notification_status'] ?> message"  style="position:fixed;max-width:400px; z-index:100000000000; bottom:20px; right:9px; "><?php echo $_SESSION['notification_text']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ui close icon"></i></div>
    <?php
       $_SESSION['notification']=false;
      }
    }
    
    ?>
