<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Abodah Funding</title>
    
    <?php $index="contact"; include("../../includes/header.php"); ?>
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

<div style="width: 100%;position: relative; top: -70px" >
            
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content"  style="margin-top:40px; margin-bottom:20px; ">
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="infos-demandeur" role="tabpanel" aria-labelledby="nav-home-tab" style="background:rgba(192, 246, 248, 0);">
                        <div class="modal-header ui fields" style="padding-top:-5px!important; padding-bottom:-5px!important;
                                                          font-family: 'Roboto', sans-serif!important;font-weight: 300!important;line-height: 1.625em!important;background-color: rgba(226, 226, 225, 0.142);">
                            <h5 class="modal-title" id="ModalLongTitle" data-backdrop="false" style="font-size:24px!important;color:darkorange!important;margin-top:0px!important;margin-bottom:0px!important;">
                              Nous contacter
                            </h5>
                        </div>
                        <form action="../traitements/contactus.php" method="post" id="formA" class="text-center border border-light p-5 ui large form"> 

                          <div class="field">
                            <div class="ui left icon input">
                                <i class="user green icon"></i>
                                <input type="text" name="nom" placeholder="Vorte nom" value="<?php
                                    if(isset($_SESSION['nom'])){
                                      if(!empty($_SESSION['nom'])){
                                        echo $_SESSION['nom']." ";
                                       }
                                     } 
                                     if(isset($_SESSION['prenom'])){
                                      if(!empty($_SESSION['prenom'])){
                                        echo $_SESSION['prenom'];
                                       }
                                     } ?>" required="required">
                            </div>
                          </div> 
      
                          <div class="field">
                            <div class="ui left icon input">
                                <i class=" orange mail icon"></i>
                                <input type="email" name="email" placeholder="Votre email" value="<?php
                                    if(isset($_SESSION['email'])){
                                     if(!empty($_SESSION['email'])){
                                       echo $_SESSION['email'];
                                      }
                                    } ?>" required="required">
                            </div>
                          </div>

                          <div class="field">
                            <div class="ui left icon input">
                              <label for="" style="float: left; color:rgba(0,0,0,0.5)">Votre message</label><br><br>
                                <textarea name="texte" required="required" placeholder="Votre message" value=''></textarea>
                            </div>
                          </div>
                          <div class="field">        
                            <span class="field"><button type="submit" class="ui fluid large teal submit button" >Envoyer</button></span>
                          </div>
                        </form>
                  </div>
                </div>
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
          
            include("../../includes/footer.php");
          
        ?>
    </body >
</html>