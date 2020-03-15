<!DOCTYPE html>
<html lang="fr">
<head>
    
    <?php $index="profil"; include("../../includes/header.php"); ?>
    <section id="helm" class="wow fadeIn">

        <div class="helm-container">
          <?php include("../../includes/menu.php"); ?>
          <title><?php echo isset($_SESSION['nom'])?$_SESSION['prenom'].' '.$_SESSION['nom']:"Profil"; ?></title>
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

      <body class=''>

        <div class="ui container">
            <div class="ui divider"></div>
                <?php 
                $show="jkewsrfresfgregesid";
                    if(isset($_SESSION['nom'])){
                ?>
                <div class="ui two item menu">
                    <a href="?state=1" class="item <?php if(isset($_GET['state'])){if($_GET['state']==1){echo "active";} $show=1;}else{ echo "active";  $show=1;} ?> " >
                        Consulter
                    </a>
                    <a href="?state=jkewsrfresfgregesi" class="item <?php if(isset($_GET['state'])){if($_GET['state']=='jkewsrfresfgregesi'){echo "active";  $show='jkewsrfresfgregesi';}} ?>">
                        Modifier
                    </a>
                </div>
                <?php
                    } 
                    if($show=='jkewsrfresfgregesi' && isset($_SESSION['nom'])){ 
                ?>
                <div class="ui grid stackable">
                    <div class="five wide column">
                        <div class="ui info message infoForm" style="text-align:justify";>
                            <i class="icon info"></i>
                            <div class="ui divider invisible"></div>
                            Remplissez le formulaire de modification puis validez. Les valeurs ont etes pre-remplies pour reduire l'effort mais neanmoins elles sont modifiables.
                            <i class="icon close" onclick="$('.infoForm').slideToggle(100)"></i>
                        </div>
                    </div>
                    <div class="ui ten wide column">
                        <center>    
                            <div class="ui form piled segment" style="max-width:400px">
                                <form action="../traitements/updateprofile.php" method="POST">
                                    <div class="ui divider invisible"></div>
                                    <div class="ui divider invisible"></div>
                                    <div class="ui divider invisible"></div>
                                    <div class="ui field">
                                        <div class="ui left action right icon input">
                                            <div class="ui button blue">Nom</div>
                                            <i class="ui icon user"></i>
                                            <input type="text" name="nom" value="<?php echo isset($_SESSION['nom'])? $_SESSION['nom']:''; ?>" placeholder="Nom" id=''>
                                        </div>
                                    </div>
                                    <div class="ui field">
                                        <div class="ui left action right icon input">
                                            <div class="ui button blue">Prenom</div>
                                            <i class="ui icon user"></i>
                                            <input type="text" name="prenom" value="<?php echo isset($_SESSION['prenom'])? $_SESSION['prenom']:''; ?>" placeholder="Prenom" id=''>
                                        </div>
                                    </div>
                                    <div class="ui field">
                                        <div class="ui left action right icon input">
                                            <div class="ui button blue">Sexe</div>
                                            <select name="sexe" id=''>
                                                <option value="masculin">Homme</option>
                                                <option value="feminin">Femme</option>
                                                <option value="Transgene">Transgene</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ui divider"></div>
                                    
                                    <div class="ui field">
                                        <div class="ui left action right icon input">
                                            <div class="ui button blue">Email</div>
                                            <i class="ui mail icon"></i>
                                            <input type="mail" name="email" placeholder="Email" id='' value="<?php echo isset($_SESSION['email'])? $_SESSION['email']:''; ?>">
                                        </div>
                                    </div>
                                    <div class="ui field">
                                        <div class="ui left action right icon input">
                                            <div class="ui button blue">Mot de passe</div>
                                            <i class="ui key icon"></i>
                                            <input type="password" name="pass" placeholder="Mot de passe" id='' value="<?php echo isset($_SESSION['password'])? $_SESSION['password']:''; ?>">
                                        </div>
                                    </div>
                                    <div class="ui divider invisible"></div>
                                    <div class="ui divider invisible"></div>

                                    <button type="submit" class="ui button blue" >Valider</button>
                                </form>
                            </div>
                        </center>
                    </div>
                </div>
                <?php }else{
                ?>
        
                <div class="ui divider invisible"></div>
                <div class="ui divider invisible"></div>
                <div class="ui grid">
                    <div class="ui three wide column">
                        <?php $backg=(file_exists("../../img/imguser/".$_SESSION['token'].".jpg"))?$_SESSION['token'].".jpg":"default.png";?>
                        <img src="../../img/imguser/<?php echo $backg ?>" class="ui small circular image"  style="border:1px solid white;  width:150px;height:150px;margin-bottom:-7px;top:7px;background:url(../../img/imguser/<?php echo $backg ?>); background-size:cover;background-position:top"/>
                    </div>
                    <div class="ui ten wide column">
                        
                    </div>
                </div>
                <div class="ui divider invisible"></div>
                <div class="ui divider invisible"></div>
                <div class='piled segment'>
                    <table class="ui celled striped table">
                        <thead>
                            <tr><th colspan="3">
                            Files
                            </th>
                        </tr></thead><tbody>
                            <tr>
                            <td class="disabled">
                                <i class="folder icon"></i> folder
                            </td>
                            <td>Comment</td>
                            <td class="right aligned collapsing">10 hours ago</td>
                            </tr>
                            <tr>
                            <td>
                                <i class="folder icon"></i> folder2
                            </td>
                            <td>Comment</td>
                            <td class="right aligned">10 hours ago</td>
                            </tr>
                            <tr>
                            <td>
                                <i class="folder icon"></i> folder3
                            </td>
                            <td>Comment</td>
                            <td class="right aligned">10 hours ago</td>
                            </tr>
                            <tr>
                            <td class="collapsing">
                                <i class="file outline icon"></i> package.json
                            </td>
                            <td>Comment</td>
                            <td class="right aligned">10 hours ago</td>
                            </tr>
                            <tr>
                            <td>
                                <i class="file outline icon"></i> Gruntfile.js
                            </td>
                            <td>Comment</td>
                            <td class="right aligned">10 hours ago</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <?php
             } ?>
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