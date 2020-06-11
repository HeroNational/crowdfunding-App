<li class="menu-has-children menuMargin" >
    <a href="#" style="position:absolute; top:50px;left:-80px;">
        <a href="profil.php?state=1" style="position:relative; top:-45px; font-weight:bold " class="item"><?php echo $_SESSION['prenom'].'&nbsp;&nbsp;'.$_SESSION['nom']; ?></a>
        
        &nbsp;&nbsp;
        <?php $tok=isset($_SESSION['token'])?$_SESSION['token']:''; $backg=(file_exists("../../img/imguser/".$tok.".jpg"))?$tok.".jpg":"default.png";?>
        <img src="../../img/imguser/<?php echo $backg ?>" style="border:1px solid orange; padding:1px 1px;width:80px; margin-bottom:-7px; height:80px; border-radius:50%; position:relative; top:7px;background:white; background-size:cover;background-position:top" alt="">
    </a>
    <ul>
        <li><a href="../traitements/authentification.php?out=true"><span class="lnr lnr-enter"></span> Deconnexion</a></li>
        <?php
            if($index!="profil"){ 
        ?>
            <li><a href="profil.php?<?php echo 'tokenTiph='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$_SESSION['token'].'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"><span class="lnr lnr-user"></span> Profil</a></li>
        <?php } ?>
    </ul>
</li>
<style>
    @media (max-width:550px) {
        li.menuMargin{
            margin-right:5px;
        }
    }
    .menuMargin{
        margin-right:-105px;
    }
</style>