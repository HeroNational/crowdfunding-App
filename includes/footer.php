</div>
</section>
<div class=" wow slideInUp /zoomIn">

  <div style="
                    margin-Top:100px;
                    margin-Bottom:100px;
                    background:url(../../img/22717_une.jpg);
                    background-Size:cover;
                    background-Position-Y:-85px; 
                    display:
                    <?php
                      if(isset($_SESSION['mail']) and isset($_SESSION['nom'])){
                        if(!empty($_SESSION['mail']) && !empty($_SESSION['nom'])){
                          echo "none;";
                        }
                      }
                    ?>;
            " class="ui center aligned stackable grid disap">
    <?php $a=0; if(!isset($_SESSION['nom'])){ ?>
    <div class="ui four wide column" style='color:white'>
      <h1>
        Soyez des notre<br /><br />
        <!-- bouton-->
      </h1>
      <a href="connexion.php" class="ui animated horizontal circular orange button boutonLogin" id="#button"
        tabindex="0" style="
                          font-Weight:'100';
                          border:1px solid transparent;
                          position:relative;
                          top:-5px;
                          transition:200ms linear;
                        " href="#">
        <center style="position:relative;top:-4px">
          <span class="visible content">
            <span class='lnr lnr-user'
              style="font-Weight:bold;font-Size:19px; position:relative; top:4px;position:relative; left:0px!important"></span>&nbsp;Inscription
          </span>
          <span class="hidden content">
            <span class='lnr lnr-users' style="font-Weight:bold;font-Size:19px; position:relative; top:4px"></span>
          </span>
        </center>
      </a>
    </div>
    <?php }
          (!isset($_SESSION['mail']))?$_SESSION['mail']=false:"";
          if(isset($_SESSION['email'])){
          $email=$_SESSION['email'];
          $sql="SELECT email FROM newsletter WHERE email='$email'";
          $execution=$bdd->query($sql);
          while($execution->fetch()){
              $_SESSION['mail']=true;
          }
        }
        if($_SESSION['mail']==false){
        ?>
    <div class="ui eight wide column  center aligned">
      <div class="ui wide column middle aligned" style='margin-Top:10px'>
        <div class="ui container message" style="background:rgba(95, 94, 94, 0.9)">
          <div class="ui meta">
            <h2 class="ui header" style="color:white">
              Souscrire a notre lettre d'informations
            </h2>
            <br />
            <span class="ui meta" style="color: beige;">
              Nous vous envoyons un bref mail mensuel pour vous informer sur la plateforme. <br />
            </span>
            <br />

          </div>
          <center>
            <form action="../traitements/newsletter.php" class="" method="post">
              <div class="ui action left icon input">
                <i class="mail icon"></i>
                <input type="email" name="emailn" required="requierd" placeholder="Votre email" id="" />
                <i class="mail icon"></i>
              </div>
              <input type="submit" class="ui orange button" id="nlettSend" value="envoyer" />
            </form>
          </center>
        </div>
      </div>
    </div>
    <?php
         }else{
          $a=$a+1;
          if($a==2)
          echo "
              <style>
                display:none;
              </style>
          ";
        }
        ?>
    <div class="ui four wide column">
    </div>
  </div>
  <?php
     if(isset($index)){ 
      if($index=="index"){ 
    ?>
  <div class="ui stackable center aligned page grid">
    <div class="row">
      <div class="column">
        <h1 class="ui header">
          Nos partenaires
        </h1>
        <h3>Ceux qui ont mis en nous leur confiance</h3>
        <div class="ui horizontal divider"><i class="heart icon "></i></div>
      </div>
    </div>
    <div class="four column logo row">
      <div class="column">
        <div class="ui shape">
          <div class="sides">
            <div class="active side">
              <i class="huge github icon"></i>
            </div>
            <div class="side">
              <i class="huge facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui shape">
          <div class="sides">
            <div class="side">
              <i class="huge github icon"></i>
            </div>
            <div class="side">
              <i class="huge facebook icon"></i>
            </div>
            <div class="active side">
              <i class="huge maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui shape">
          <div class="sides">
            <div class="side">
              <i class="huge github icon"></i>
            </div>
            <div class="side">
              <i class="huge facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge pinterest icon"></i>
            </div>
            <div class="active side">
              <i class="huge weibo icon"></i>
            </div>
            <div class="side">
              <i class="huge flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="column">
        <div class="ui shape">
          <div class="sides">
            <div class="side">
              <i class="huge github icon"></i>
            </div>
            <div class="side">
              <i class="huge facebook icon"></i>
            </div>
            <div class="side">
              <i class="huge maxcdn icon"></i>
            </div>
            <div class="side">
              <i class="huge pinterest icon"></i>
            </div>
            <div class="side">
              <i class="huge weibo icon"></i>
            </div>
            <div class="active side">
              <i class="huge flickr icon"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
      }
    }
     ?>
  <section>

    <div style="padding: 40px 0px;
                  background:url(../../img/den-1c.jpg);
                  background-size:cover;
                  background-attachment:center;
                  position:relative;
                  height:200px;
                  margin-top:40px
            " class="ui center aligned stackable grid">
      <div class="nine wide middle aligned right aligned column">
        <span class="ui header"
          style="color:white"><?php echo !isset($_SESSION['projet'])?"Etes vous pret?":"Merci d'avoir entrepris"; ?>
        </span>&nbsp;&nbsp;&nbsp;
        <a href="projet.php"
          class="ui button black huge circular green"><?php echo !isset($_SESSION['projet'])?"Creer un projet":"Creer un nouveau projet !"; ?></a>
      </div>
    </div>

    <div class="ui vertical footer segment" style="background:rgba(240,240,240,0.1)!important;">
      <div style="padding-left:10px;padding-Right:10px">
        <div class="ui stackable divided equal height stackable grid">
          <div class="three wide column">
            <h3 class="item"><span style="color:teal;font-size:20px">Abodah</span>&nbsp; <span
                style="color:#d08421;font-size:25px;font-weight:bold">Funding</span></h3>
            <div class="ui link list">
              <h5 class="ui item">Langues</h5>
              <a href="#" class="item"><i class="ui flag france"></i> Francais</a>
              <a href="#" class="item"><i class="ui england flag"></i>English</a>
              <a href="#" class="item"><i class="ui spain flag"></i> Espanol</a>
              <a href="#" class="item"><i class="ui morocco flag"></i> Arabe</a>
            </div>
          </div>
          <div class="three wide column">
            <div class="ui link list">
              <h4 class="ui item">Plateforme</h4>
              <a href="campagne.php" class="item">Decouvrir</a>
              <a href="#" class="item">Comment ca marche?</a>
              <a href="#" class="item">Tarifs</a>
              <a href="blog.php" class="item">Blog</a>
              <?php 
                            if(!isset($_SESSION['nom'])){
                            ?>
              <a href="inscription.php" class="item">Inscrivez-vous gratuitement</a>
              <a href="connexion.php" class="item">Connexion</a>
              <?php
                            }
                          ?>
              <hr>
              <a href="#" class="item">Clause de services</a>
              <a href="#" class="item">Politique de confidencialite</a>
            </div>
          </div>
          <div class="four wide column">
            <div class="ui link list">
              <h4 class="ui item">Rejoignez le mouvement</h4>
              <a href="projet.php" class="item">Creer un projet</a>
              <a href="campagne.php" class="item">Financer un projet</a>
              <a href="#" class="item">Aider la plateforme</a>
            </div>
          </div>
          <div class="three wide column">
            <div class="ui link list">
              <h4 class="item">Contactez nous</h4>
              <a href="#" class="item"><span class="lnr lnr-phone-handset"></span>&nbsp;&nbsp;Telephone:+237
                657675216</a>
              <a href="#" class="item"><span class="socicon-whatsapp"></span>&nbsp;&nbsp;+237 657675216</a>
              <a href="contactus.php" class="item"><span class="socicon-internet"></span>&nbsp;&nbsp;Via le site web</a>

              <a href="#" class="item"><span class="socicon-mailru"></span>&nbsp;&nbsp;Email: funding@abodah.com</a>
              <a href="#" class="item"><span class="lnr lnr-inbox"></span>&nbsp;&nbsp;Boite postale: 2345 Yde</a>
              <a href="#" class="item">Support</a>
            </div>
          </div>
          <div class="two wide column">
            <div class="ui link list">
              <h4 class="ui item">Communite</h4>
              <a href="#" class="item">Repporter un bogue</a>
              <a href="#" class="item">Doucmentaion et aide</a>
              <a href="#" class="item">Support</a>
            </div>
          </div>
        </div>
        <div class="ui stackable grid center aligned">
          <div class="sixteen column wide">
            <h4 class="ui item">Suivez nous sur</h4>
            <br />
            <a href="#" class="follow"
              style="border-radius:50%;border: 1px solid lightgray ;color:rgba(5, 115, 199, 0.863)"><span
                class="socicon-facebook"></span></a>&nbsp;
            <a href="#" class="follow"
              style="border-radius:50%;border: 1px solid lightgray ;color:rgba(21,142,235,0.663)"><span
                class="socicon-twitter"></span></a>&nbsp;
            <a href="#" class="follow" style="border-radius:50%;border: 1px solid lightgray"> <span
                class="socicon-linkedin"></span></a>&nbsp;
            <a href="#" class="follow"
              style="border-radius:50%;border: 1px solid lightgray ;color:rgba(0,82,136,0.7)"><span
                class="socicon-telegram"></span></a>&nbsp;
            <a href="#" class="follow" style="border-radius:50%;border: 1px solid lightgray ;color:rgb(196,7,7)"><span
                class="socicon-googleplus"></span></a>&nbsp;
            <a href="#" class="follow" style="border-radius:50%;border: 1px solid lightgray ;color:rgb(196,7,7)"><span
                class="socicon-youtube"></span></a>&nbsp;

          </div>
        </div>
        <br /><br /><br />
        <div class="ui stackable grid center aligned" style="background:rgba(71,83,92,0.1)">
          <div class="sixteen column wide">
            &copy; Abodah Corporation 2016 -
            <script>document.write(new Date().getFullYear());</script>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<style>
  a.follow:active {
    background-color: rgb(218, 216, 216);
  }

  a.follow:hover {
    background-color: rgba(4, 41, 66, 0.096);
    text-decoration: none;
  }

  a {
    letter-spacing: normal;
  }

  @media (max-width:1127px) {
    a.follow {
      padding: 10px 10px;
      font-size: 15px;
    }
  }

  @media (min-width:1127px) {
    a.follow {
      padding: 15px 15px;
      font-size: 20px;
    }
  }
</style>


<script src="../../js/bootstrap/bootstrap.js"></script>
<script src="../../js/jquery/jquery.js"></script>
<script src="../../js/main.js"></script>
<script src="../../js/typerJs/typerjs.js"></script>
<script src="../../js/wow/wow.min.js"></script>
<script src="../../js/particlesjs/particles.min.js"></script>
<script src="../../js/particlesjs/demo/js/app.js"></script>
<script type="text/javascript" src="../../js/returnOnTop.js"></script>