<li class="menu-has-children" style="margin-right:-105px;">
    <a href="#" style="position:absolute; top:0px;left:-80px;">
        <a href="profil.php?state=1" style="position:relative; top:-45px; font-weight:bold " class="item"><?php echo $_SESSION['prenom'].'&nbsp;&nbsp;'.$_SESSION['nom']; ?></a>
        
        &nbsp;&nbsp;
        <?php $backg=(file_exists("../../img/imguser/".$_SESSION['token'].".jpg"))?$_SESSION['token'].".jpg":"default.png";?>
        <img src="../../img/imguser/<?php echo $backg ?>" style="border:1px solid orange; padding:1px 1px;width:80px; margin-bottom:-7px; height:80px; border-radius:50%; position:relative; top:7px;background:white; background-size:cover;background-position:top" alt="">
    </a>
    <ul>
        <li><a href="?out=true"><span class="lnr lnr-enter"></span> Deconnexion</a></li>
        <li><a href="profil.php?<?php echo 'tokenTiph='.str_shuffle("erfwfkfewhfewafwegswefhbewgjhwageg24354geGFE4w2ga4aew54erg3gaerg5").'&ustreetyauijdnnn8isk='.$_SESSION['token'].'&kind='.str_shuffle("erfg24354geGFE4w2ga4aew54erg3gaerg5") ?>"><span class="lnr lnr-user"></span> Profil</a></li>
        
    </ul>
</li>