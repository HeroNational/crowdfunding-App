<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">
<head>
    <title>Connexion</title>
    
    <?php $index="connexion"; include("../../includes/header.php");include("../../includes/connexionBd.php"); ?>
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
    <body>
    <section>
          <div class="" style="z-index: 100;">
            <div class="row">
              <div class="col-ms-2 col-lg-2">
              </div>
              <div class="col-ms-8 col-md-12 col-lg-8" style=" padding-bottom:40px;">
                <div class="ui middle aligned center aligned grid" style="margin-top:25px;">
                  <div class="columnForm column">
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
                            <input type="text" name="emailC" placeholder="Adresse E-mail">
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
                      Vous êtes nouveau? <a href="inscription.php" style="letter-spacing:0px;"><span style="color:rgb(66, 146, 12); font-size:x-large">+</span> Inscription</a>
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