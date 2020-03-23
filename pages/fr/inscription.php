<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Inscription</title>
    
    <?php $index="inscription"; include("../../includes/connexionBd.php"); include("../../includes/header.php"); ?>
    <section id="helm" >

        <div class="helm-container">
          <?php include("../../includes/menu.php"); ?>
 
    <style type="text/css">
      body > .grid {
        height: 100%;
      }
      .columnForm {
        max-width: 1050px;
      }
    </style>
    <body>
        <section class="wow <?php $animationCon=array("slideInLeft","slideInRight","zoomIn","slideInDown","slideInUp"); $animationConN=mt_rand(0,4); echo $animationCon[$animationConN]; ?>"> 
            <div class="">
              <div class="row">
                <div class="col-ms-2 col-lg-2 inscriptionUn">
                </div>
                <div class="col-ms-8 col-md-12 col-lg-8" style=" padding-bottom:40px;">
                  <div class="ui middle aligned center aligned grid" style="margin-top:25px;">
                    <div class="columnForm column">
                      <div class="ui stacked segment">
                        <h2 class="ui green header left aligned">
                          <div class="header">
                            Inscription
                          </div>  
                        </h2>
                          <form action="../traitements/authentification.php" enctype="multipart/form-data" method="post" class="ui large form" >
                            <div class="field">
                              <label for="imager" style="cursor:pointer">
                                <center style="position:relative">
                                  <span style="position:relative; top:20px; background:white; border-radius:50%; z-index:120; left:-30px; border:1px solid teal; padding:8px 8px;">
                                    <span class="lnr lnr-picture" style="background:white; border-radius:50%;"></span>
                                  </span>
                                  <img src="../../img/imguser/default.png" alt="Votre photo de profil" class="ui image circular" style="height:100px; width:100px;border:2px solid teal; padding:0px 1px;">
                                  <span class="ui top pointing label disabled green">Choisissez une photo de profil</span>
                                </center>
                              </label>
                              <input type="file" name="image" accept="image/*" style="display:none" id="imager">
                            </div>
                            <div class="two fields">
                              

                              <div class="field">
                                <div style="float: left; margin-bottom:5px;">
                                  <i class="ui user icon red"></i>
                                  <span class="ui">
                                    Prenom
                                  </span>
                                </div>
                                <div class="ui left icon input">
                                  <input type="url" name="prenomI" value="<?php echo isset($_SESSION['prenom'])?$_SESSION['prenom']:""; ?>" required="required" placeholder="Prenom">
                                </div>
                              </div>

                              <div class="field">
                                <div style="float: left; margin-bottom:5px;">
                                  <i class="ui user icon purple"></i>
                                  <span class="ui">
                                    Nom
                                  </span>
                                </div>
                                <div class="ui left icon input">
                                  <input type="text" name="nomI" required="required" value="<?php echo isset($_SESSION['nom'])?$_SESSION['nom']:""; ?>" placeholder="Nom">
                                </div>
                              </div>

                            </div>
                            
                            <div class="two fields">

                              <div class="field">
                                <div style="float: left; margin-bottom:5px;">
                                  <i class="ui lock icon red"></i>
                                  <span class="ui">
                                    Mot de passe
                                  </span>
                                </div>
                                <div class="ui left icon input">
                                  <input type="password" name="passwordI" value=""  required="required" placeholder="Mot de passe">
                                </div>
                              </div>
                              <div class="field">
                                <div style="float: left; margin-bottom:5px;">
                                  <i class="ui mail icon blue"></i>
                                  <span class="ui">
                                    Email
                                  </span>
                                </div>
                                <div class="ui left icon input">
                                  <input type="email" name="emailI" required="required" placeholder="E-mail" value="<?php echo isset($_SESSION['email'])?$_SESSION['email']:""; ?>">
                                </div>
                              </div>
 
                            </div>
                            <div class="field">
                              <div style="float: left; margin-bottom:5px;">
                                <i class="ui icon group  green"></i>
                                <span class="ui">
                                  Sexe
                                </span>
                              </div>
                              <div class="ui left icon input labeled">
                                <select name="sexeI"  required="required" id="">
                                  <option value="masculin">Masculin</option>
                                  <option value="feminin">Feminin</option>
                                </select>
                              </div>
                            </div>

                            <div class="field">
                              <div style="float: left; margin-bottom:5px;">
                                <i class="ui icon book purple"></i>
                                <span class="ui">
                                  Biographie
                                </span>
                              </div>
                              <div class="ui left icon input labeled">
                                <textarea name="descriptionI" placeholder="En quelques mots pqrlez de vous." id=""></textarea>
                              </div>
                            </div>

                            <div class="ui horizontal divider"></div>
                            <div class="field">
                              <div style="float: left; margin-bottom:5px;">
                                <i class="ui cogs icon blue"></i>
                                <span class="ui">
                                  Repondez pour continuer
                                </span>
                              </div>
                              <div class="ui left icon input">
                                <?php 
                                  $captcha1=mt_rand(1,6);
                                  $captcha2=mt_rand(1,6);
                                  $captcha3=mt_rand(1,6); 
                                  $sign=array("+","-","*");
                                  $op1=mt_rand(0,2);
                                  $sign1=$sign[$op1];
                                  $op2=mt_rand(0,2);
                                  $sign2=$sign[$op2];

                                  $op3=mt_rand(1,3);
                                  
                                  if($sign1=="*" && $sign2!="*"){
                                    $operation="(".$captcha1."".$sign1."".$captcha2.")".$sign2."".$captcha3;
                                  }elseif($sign1!="*" && $sign2=="*"){
                                    $operation=$captcha1."".$sign1."(".$captcha2."".$sign2."".$captcha3.")";
                                  }elseif($sign1=="*" && $sign2=="*"){
                                    $operation="(".$captcha1."".$sign1."".$captcha2."".$sign2."".$captcha3.")";
                                  }else{
                                    $operation=$captcha1."".$sign1."".$captcha2."".$sign2."".$captcha3;
                                  }

                                  if($sign1=="*" && $sign2="-"){
                                    $resultat=$captcha1*$captcha2-$captcha3;
                                  }elseif($sign1=="*" && $sign2=="+"){
                                    $resultat=$captcha1*$captcha2+$captcha3;
                                  }elseif($sign1=="*" && $sign2=="*"){
                                    $resultat=$captcha1*$captcha2*$captcha3;
                                  }elseif($sign1=="-" && $sign2=="*"){
                                    $resultat=$captcha1-$captcha2*$captcha3;
                                  }elseif($sign1=="-" && $sign2=="+"){
                                    $resultat=$captcha1-$captcha2+$captcha3;
                                  }elseif($sign1=="-" && $sign2=="-"){
                                    $resultat=$captcha1-$captcha2-$captcha3;
                                  }elseif($sign1=="+" && $sign2=="-"){
                                    $resultat=$captcha1+$captcha2-$captcha3;
                                  }elseif($sign1=="+" && $sign2=="+"){
                                    $resultat=$captcha1+$captcha2+$captcha3;
                                  }elseif($sign1=="+" && $sign2=="*"){
                                    $resultat=$captcha1+$captcha2*$captcha3;
                                  }
                                  $_SESSION["captcha"]=$resultat;
                                ?>
                                <input type="number" name="captcha" required="required" placeholder="<?php echo $operation ?>">
                              </div>
                            </div>
                            <button type="submit" class="ui fluid large green submit button">Inscription </button>
                            <style>
                              .ui.stacked.segment::after, .ui.stacked.segment::before{
                                display: none!important;
                              }
                            </style>
                          </div>
                        </form>
                      <div class="ui message">
                        Déjà un compte? <a href="connexion.php" onclick="closemodallog();modalcon(); " style="letter-spacing:0px;"><span style="color:rgb(66, 146, 12); font-size:x-large">+</span> Connexion</a>
                      </div>
                    </div>
                  </div>
                  </div>
                <div class="col-ms-2 col-lg-2">
                </div>
              </div>
            </div>
        </section>


        <?php 
          
            include("../../includes/footer.php");
          
        ?>