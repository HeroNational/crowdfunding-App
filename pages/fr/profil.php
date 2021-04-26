<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">

<head>

    <?php 
    $index="profil"; 
        !isset($_SESSION)?session_start():'';
        include("../../includes/header.php"); ?>
    <section id="helm" class="wow fadeIn">

        <div class="helm-container">
            <?php
           include("../../includes/menu.php");

            $userprop=true;
            if(isset($_GET['ustreetyauijdnnn8isk'])){
                if($_GET['ustreetyauijdnnn8isk']){
                    if(isset($_SESSION['token'])){
                        if($_SESSION['token']!=$_GET['ustreetyauijdnnn8isk']){
                            $userprop=false;
                        }
                    }else{
                        $userprop=false;
                    }
                }
                
                if($userprop==false){
                    $value=$_GET['ustreetyauijdnnn8isk'];
                }else{
                    $value=$_SESSION['token'];
                }
                $sql="SELECT * FROM internaute WHERE token like '$value'";
                $stmt=$bdd->query($sql);
                while($resultat=$stmt->fetch(PDO::FETCH_OBJ)){
                    $idut=$resultat->idu;
                    $nom=$resultat->nom;
                    $prenom=$resultat->prenom;
                    $token=$resultat->token;
                    $email=$resultat->email;
                    $description=$resultat->description;
                    $sexe=$resultat->sexe;
                    $date=$resultat->date;
                }
            }
          ?>
            <title><?php echo isset($nom)?$prenom.' '.$nom:"Profil"; ?></title>
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

<body class=''>

    <div class="ui container">
        <div class="ui divider"></div>
        <?php 
                $userprop=true;
                if(isset($_GET['ustreetyauijdnnn8isk'])){
                    if($_GET['ustreetyauijdnnn8isk']){
                        if(isset($_SESSION['token'])){
                            if($_SESSION['token']!=$_GET['ustreetyauijdnnn8isk']){
                                $userprop=false;
                            }
                        }else{
                            $userprop=false;
                        }
                    }
                }

                $show="jkewsrfresfgregesid";
                    if($userprop==true){
                        isset($_SESSION['token'])?$token=$_SESSION['token']:'';
                ?>
        <div class="ui two item menu">
            <a href="?<?php echo 'tokenized='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$token.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>&state=1"
                class="item <?php if(isset($_GET['state'])){if($_GET['state']==1){echo "active";} $show=1;}else{ echo "active";  $show=1;} ?> ">
                <i class="ui icon list"></i>&nbsp;&nbsp;Consulter
            </a>
            <a href="?<?php echo 'tokenized='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$token.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>&state=jkewsrfresfgregesi"
                class="item <?php if(isset($_GET['state'])){if($_GET['state']=='jkewsrfresfgregesi'){echo "active";  $show='jkewsrfresfgregesi';}} ?>">
                <i class="ui icon pencil"></i>&nbsp;&nbsp;Modifier
            </a>
        </div>
        <?php
                    } 
                    if($show=='jkewsrfresfgregesi' && $userprop==true){ 
                ?>
        <div class="ui grid stackable">
            <div class="five wide column">
                <div class="ui info message infoForm" style="text-align:justify" ;>
                    <i class="icon info"></i>
                    <div class="ui divider invisible"></div>
                    Remplissez le formulaire de modification puis validez. Les valeurs ont etes pre-remplies pour
                    reduire l'effort mais neanmoins elles sont modifiables.
                    <i class="icon close" onclick="$('.infoForm').slideToggle(100)"></i>
                </div>
            </div>
            <div class="ui ten wide column">
                <center>
                    <div class="ui form piled segment" style="max-width:400px">
                        <form action="../traitements/updateprofile.php" method="POST" enctype="multipart/form-data">

                            <div class="field">
                                <label for="imager" style="cursor:pointer">
                                    <center style="position:relative">
                                        <span
                                            style="position:relative; top:20px; background:white; border-radius:50%; z-index:120; left:-30px; border:1px solid teal; padding:8px 8px;">
                                            <span class="lnr lnr-picture"
                                                style="background:white; border-radius:50%;"></span>
                                        </span>
                                        <img src="../../img/imguser/<?php echo isset($_SESSION['token'])? $_SESSION['token'].".jpg":'default.png'; ?>"
                                            alt="Photo de profil de <?php echo isset($_SESSION['nom'])? $_SESSION['nom']:'Votre photo de profil'; ?>"
                                            class="ui image circular"
                                            style="height:100px; width:100px;border:2px solid teal; padding:0px 1px;">
                                        <span class="ui top pointing label disabled blue">Modifiez votre photo de
                                            profil</span>
                                    </center>
                                </label>
                                <input type="file" required="required" name="image" accept="image/*" style="opacity:0;"
                                    id="imager">
                            </div>

                            <div class="ui field">
                                <div class="ui left action right icon input">
                                    <div class="ui button blue">Nom</div>
                                    <i class="ui icon user"></i>
                                    <input type="text" name="nom" required="required"
                                        value="<?php echo isset($_SESSION['nom'])? $_SESSION['nom']:''; ?>"
                                        placeholder="Nom" id=''>
                                </div>
                            </div>
                            <div class="ui field">
                                <div class="ui left action right icon input">
                                    <div class="ui button blue">Prenom</div>
                                    <i class="ui icon user"></i>
                                    <input type="text" name="prenom" required="required"
                                        value="<?php echo isset($_SESSION['prenom'])? $_SESSION['prenom']:''; ?>"
                                        placeholder="Prenom" id=''>
                                </div>
                            </div>
                            <div class="ui field">
                                <div class="ui left action right icon input">
                                    <div class="ui button blue">Sexe</div>
                                    <select name="sexe" id='' required="required">
                                        <option value="masculin"
                                            <?php  if(isset($_SESSION['sexe'])){ if($_SESSION['sexe']=='masculin'){echo 'selected';}} ?>>
                                            Homme</option>
                                        <option value="feminin"
                                            <?php  if(isset($_SESSION['sexe'])){ if($_SESSION['sexe']=='feminin'){echo 'selected';}} ?>>
                                            Femme</option>
                                        <option value="Transgene"
                                            <?php  if(isset($_SESSION['sexe'])){ if($_SESSION['sexe']=='transgene'){echo 'selected';}} ?>>
                                            Transgene</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ui divider"></div>

                            <div class="ui field">
                                <div class="ui left action right icon input">
                                    <div class="ui button blue">Email</div>
                                    <i class="ui mail icon"></i>
                                    <input type="mail" name="email" required="required" placeholder="Email" id=''
                                        value="<?php echo isset($_SESSION['email'])? $_SESSION['email']:''; ?>">
                                </div>
                            </div>
                            <div class="ui field">
                                <div class="ui left action right icon input">
                                    <div class="ui button blue">Mot de passe</div>
                                    <i class="ui key icon"></i>
                                    <input type="password" name="pass" required="required" placeholder="Mot de passe"
                                        id=''
                                        value="<?php echo isset($_SESSION['password'])? $_SESSION['password']:''; ?>">
                                </div>
                            </div>
                            <div class="ui divider invisible"></div>
                            <div class="ui divider invisible"></div>

                            <button type="submit" required="required" class="ui button blue">Valider</button>
                        </form>
                    </div>
                </center>
            </div>
        </div>
        <?php }else{
                
                    if($userprop==false){
                        $value=$_GET['ustreetyauijdnnn8isk'];
                    }else{
                        $value=$_SESSION['token'];
                    }
                    $sql="SELECT * FROM internaute WHERE token like '$value'";
                    $stmt=$bdd->query($sql);
                    while($resultat=$stmt->fetch(PDO::FETCH_OBJ)){
                        $idut=$resultat->idu;
                        $nom=$resultat->nom;
                        $prenom=$resultat->prenom;
                        $token=$resultat->token;
                        $email=$resultat->email;
                        $description=$resultat->description;
                        $sexe=$resultat->sexe;
                        $date=$resultat->date;
                        }
                ?>



        <div class="ui divider invisible"></div>
        <div class="ui divider invisible"></div>
        <div class="ui grid">
            <div class="ui six widecenter aligned column">
                <?php $backg=(file_exists("../../img/imguser/".utf8_decode($token).".jpg"))?utf8_decode($token).".jpg":"default.png";?>
                <img src="../../img/imguser/<?php echo $backg ?>" class="ui small  image"
                    style="border:2px solid orange;  width:150px;height:150px;margin-bottom:-7px;top:7px; padding:2px 2px;background:white/*url(../../img/imguser/<?php echo $backg ?>)*/; background-size:cover;background-position:top;border-radius:50%" />
            </div>
            <div class="ui ten wide column">
                <div class="column">
                    <div class="ui feed">
                        <div class="event">
                            <div class="label">
                                <i class="user icon"></i>
                            </div>
                            <div class="content">
                                <div class="summary">
                                    Prenom:
                                    <div class="date">
                                        <?php echo utf8_decode($prenom) ?>
                                    </div>
                                </div>
                                <div class="summary">
                                    Nom:
                                    <div class="date">
                                        <?php echo utf8_decode($nom) ?>
                                    </div>
                                </div>
                                <div class="summary">
                                    Email:
                                    <div class="date">
                                        <a href="mailto:wootarkovski25032019@gmail.com"
                                            target="_blank"><?php echo !empty($email)?utf8_decode($email):'Indefinie' ?></a>
                                    </div>
                                </div>
                                <div class="extra text">
                                    <?php echo !empty($description)?utf8_decode($description):'' ?>
                                </div>
                                <div class="meta">
                                    <a><?php echo ($sexe=='masculin')?'Inscrit':'Inscrite' ?> depuis le </a>
                                    <a><?php echo !empty($date)?utf8_decode(formatsimpledate("$date","fr"," ")):'' ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="event">
                            <div class="label">
                                <i class="trophy icon"></i>
                            </div>
                            <div class="content">
                                <div class="summary">
                                    Profil
                                </div>
                                <?php 
                                        $profile['1']=false;  
                                        $profile['2']=false;  
                                        $reqProfileE="SELECT * FROM projet where internaute like '$idut'";
                                        $stmtP=$bdd->query($reqProfileE);
                                        while($stmtP->fetch()){
                                            $profile['1']=true;  
                                            $stmtP->closecursor();
                                        } 
                                        $reqProfileF="SELECT * FROM financement where internaute like '$idut'";
                                        $stmtP=$bdd->query($reqProfileF);
                                        while($stmtP->fetch()){
                                            $profile['2']=true;  
                                            $stmtP->closecursor();
                                        }
                                    ?>
                                <div class="meta">
                                    <a><?php echo ($profile['1']==true)?'Entrepreneur':'' ?></a>
                                    <?php 
                                                if($profile['2']==true){
                                                    echo "
                                                        <a>&amp;</a>
                                                        <a>";
                                                    if($sexe=='masculin'){
                                                        echo 'Financeur';
                                                    }else{
                                                        echo 'Financeuse';
                                                    }
                                                }
                                            ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui divider invisible"></div>
        <div class="ui divider invisible"></div>
        <div class='piled segment'>

            <?php 
                                
                $reqnbrProj="SELECT count(*) as nbrpro FROM projet where internaute like '$idut'";

                $stmtPer=$bdd->query($reqnbrProj);
                while($res=$stmtPer->fetch(PDO::FETCH_OBJ)){
                    $nbrpo=$res->nbrpro;
                    $stmtPer->closecursor();
                }
                if($nbrpo!=0){ 
            ?>
            <table class="ui celled striped table">
                <thead id="thead">
                    <style>
                    @media screen and (min-width:400px) {
                        #thead {
                            position: sticky;
                            top: 50px;
                            z-index: 2000;
                        }
                    }
                    </style>
                    <tr>
                        <th colspan="2">
                            Les projets de <?php echo utf8_decode($prenom.' '.$nom); ?>
                        </th>
                        <th>Fin de campagne</th>
                        <th>Financer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                $reqProj="SELECT * FROM projet where internaute like '$idut' and etat like '1'";
                                $stmtPe=$bdd->query($reqProj);
                                while($res=$stmtPe->fetch(PDO::FETCH_OBJ)){
                                /* 
                                    //$requete="SELECT * FROM projet as p,financement as f where  f.projet=p.idpro and p.etat='1'  group by idpro order by p.date ASC";
                                    $requete="SELECT * FROM projet as p,financement as f where  f.projet=p.idpro and p.etat='1' and f.internaute like '$idut' group by idpro ASC";
                                    $execution=$bdd->query($requete);
                                    while($resultset=$execution->fetch(PDO::FETCH_OBJ)){
                                        $posHover=mt_rand(1,39);
                                        $sommeacquise=mt_rand(1,1000000);
                                        $requeteS="SELECT sum(montant) as acquis FROM financement where projet='1'";
                                        $executionS=$bdd->query($requeteS);
                                        $resultsetS=$executionS->fetch(PDO::FETCH_OBJ);
                                        echo $sommeacquise=$resultsetS->acquis."\\\n";
                                        echo $sommetotale=$res->objectif;
                                        echo $per=($sommeacquise*100)/$sommetotale;
                                        echo $sommetotale=number_format($sommetotale, 0,'.',' ');
                                        echo $per="<br/>".number_format($per, 0,'.', '');
                                        $executionS->closecursor();
                                    } 
                                    */
                                    
                            ?>
                    <tr>
                        <td>
                            <strong>
                                <img class="ui avatar image"
                                    src="<?php echo '../../img/imgprojet/'.utf8_decode($res->image).'.jpg'; ?>" alt="">
                                &nbsp;&nbsp;&nbsp;
                                <?php echo utf8_decode($res->nomProjet)?>
                            </strong>
                        </td>
                        <td> <?php echo utf8_decode($res->descriptionProjet); ?></td>
                        <td class="right aligned collapsing">
                            <?php echo utf8_decode(formatsimpledate($res->duree,"fr"," ")); ?></td>
                        <td class="right aligned collapsing">
                            <a href="financement.php?<?php echo 'token='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&prodhgdthtrhydtrtrjutydrhrthwee='.$res->idpro.'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"
                                class="ui button green tiny">
                                <i class="check icon"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                } 
                                $stmtPe->closecursor();
                            ?>
                </tbody>
            </table>
        </div>

        <?php
                    }else{
            ?>
        <h4 class="ui center aligned header "><span class="ui center aligned label header teal cfre"
                style="letter-spacing:0px;background:transparent!important;color:orange!important"><?php echo utf8_decode($prenom.' '.$nom); ?></span>n'a
            encore soumis aucun projet</h4>
    </div>
    <style>
    span.cfre::first-letter {
        text-transform: capitalize !important;
    }
    </style>
    <?php
                    }
                }
            ?>
    </div>
    </div>
    <style>
    #helm {
        width: 100%;
        height: 60px;
        background-size: 100%;
        position: relative;
        margin-top: 40px;
    }
    </style>

    <?php 
          
          include("../../includes/footer.php");
        
      ?>
</body>

</html>