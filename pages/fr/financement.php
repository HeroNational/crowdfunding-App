<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Finance d'un projet</title>
    
    <?php $index="projet"; include("../../includes/header.php"); ?>
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
      
    ?>
    <h1 class="ui header blue center aligned segment">Ici titre du projet.</h1>
    <div style="padding:9px">
      <div class="hidden divider horizontal"></div>

      <div class="ui stackable grid center aligned">
        <div class="ui five wide column">
          <center>
            <div class="ui card">
              <div class="image dimmable dimmed">
                <img src="../../img/1.jpg">
              </div>
              <div class="content">
                <div class="header">Jacobin Daniel</div>
                <div class="meta">
                  <a class="group">Meta</a>
                </div>
                <div class="description">One or two sentence description that may go to several lines</div>
              </div>
              <div class="extra content">
                <a class="right floated created button">
                  <a href="#" for="" class="ui red label">
                    Faire un don
                  </a>
                </a>
                <a class="friends">
                  <a href="profil.php" for="" class="ui teal label">
                    Contacter
                  </a>
                </a>
              </div>
            </div>
          </center>
        </div>


        <div class="ui five wide column left aligned">
          <div class="ui grid">
            <div class="ui row">
              <div class="ui sixteen wide column">
                <img src="../../img/3.jpg" alt="" class="ui image">
              </div>
            </div>
            <div class="ui row">
              <div class="ui column" style="text-align: justify;">
                <h1>Description</h1><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ardeo, mihi credite, Patres conscripti (id quod vosmet de me existimatis et facitis ipsi) incredibili quodam amore patriae, qui me amor et subvenire olim impendentibus periculis maximis cum dimicatione capitis, et rursum, cum omnia tela undique esse intenta in patriam viderem, subire coegit atque excipere unum pro universis. Hic me meus in rem publicam animus pristinus ac perennis cum C. Caesare reducit, reconciliat, restituit in gratiam.
Iam in altera philosophiae parte.
              </div>
            </div>
            <div class="ui row">
              <div class="ui column">
                <h1>Date de début de la campagne <span class="ui meta">: 25/02/2019</span></h1>
              </div>
            </div>
            <div class="ui row">
              <div class="ui column">
                <h1>Projet supporté par:</h1><br>
                <div class="ui row">
                  <a href="#"><img src="../../img/1.jpg" class="ui circular avatar image" alt="" srcset="" style="border:1px solid teal ;"></a>
                  <a href="#"><img src="../../img/2.jpg" class="ui circular avatar image" alt="" srcset="" style="border:1px solid teal ;"></a>
                  <a href="#"><img src="../../img/3.jpg" class="ui circular avatar image" alt="" srcset="" style="border:1px solid teal ;"></a>
                  <a href="#"><img src="../../img/4.jpg" class="ui circular avatar image" alt="" srcset="" style="border:1px solid teal ;"></a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="ui six wide column">
          <div class="ui header teal">Finacer ce projet</div>
          <center>
            <form class="ui large form" style="max-width:370px;">
              <div class="ui piled segment">
                <div class="field">
                  <label for="" style="float:left">Montant</label>
                  <div class="ui left icon input">
                    <i class="money icon"></i>
                    <input type="number" id='montant' name="number" onchange="textMonter() placeholder="Montant">
                  </div>
                </div>
                <div class="field">
                  <label for="" style="float:left">Message</label>
                  <div class="ui left icon input">
                    <textarea name="password" placeholder="message"></textarea>
                  </div>
                </div>
                <div class="ui fluid large teal submit button">Valider</div>
              </div>
            </form>
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
          
            include("../../includes/footer.php");
          
        ?>
    </body >
</html>