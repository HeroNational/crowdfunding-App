<?php 
    require("connexionBdApi.php");
    $num='';
    $nomU="plateformeAbodah";
  
    $sql="SELECT phone,solde,nom,id FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.nom LIKE '$nomU' and u.phone LIKE '699277263'";
    $stmt=$api->query($sql);
    $existA=false;

    while($res=$stmt->fetch()){
        $existA=true;
        $esxSomA=$res['solde'];
        $idA=$res['id'];
        $phoneA=$res['phone'];
    }

  if(isset($_GET['number']) and isset($_GET['somme'])){
    if(!empty($_GET['number'])){

      $num=isset($_GET['number'])?$_GET['number']:'';
      $som=isset($_GET['somme'])?$_GET['somme']:'';

      if($som>0){

    $sql="SELECT phone,solde,nom,id FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.phone LIKE '$num'";
        $stmt=$api->query($sql);
        $existU=false;

        while($res=$stmt->fetch()){
         $existU=true;
          $esxSom=$res['solde'];
          $nom=$res['nom'];
          $id=$res['id'];
          $phone=$res['phone'];
        }
        
        if($existU){
          settype($esxSom,"double");
          settype($esxSomA,"double");
          $som1=$som+$esxSom;
          $sql="UPDATE compte set solde='$som1' WHERE id='$id'";
          $api->query($sql);
          
        }
      }
    }
  }

  $sql="SELECT phone,solde,nom FROM utilisateur u, compte c WHERE u.phone=c.numeroClient and u.phone LIKE '$num'";
  $stmt=$api->query($sql);
  $exist=false;
  while($res=$stmt->fetch()){
    $exist=true;
    $esxSom=$res['solde'];
    $nom=$res['nom'];
    $phone=$res['phone'];
  }
  if(isset($som)){
      $som>0?header("Location: ?number=$num&somme=0"):"";
    }

?>
<!DOCTYPE html>
<html>

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title></title>
    <link rel="stylesheet" type="text/css" href="../style/suiM/semantic.css">
    <link rel="stylesheet" type="text/css" href="../style/suiM/components/dist/components/site.css">
    <link rel="stylesheet" type="text/css" href="../style/suiM/components/reset.css">
    <!-- <link rel="shortcut icon" href="./img/clin-oeil.png" type="image/x-icon"> -->

    <script src="../style/suiM/components/form.js"></script>
    <script src="../style/suiM/components/transition.js"></script>
    <title>Bank Interface</title>
    <style type="text/css">
    body {
        background-color: rgba(218, 218, 218, 0.445);
        padding-top: 70px;
    }

    body>.grid {
        height: 100%;
    }

    .imaged {
        margin-top: 10px !important;
        position: relative;
        top: 0px;
    }

    .column {
        max-width: 450px;
    }
    </style>
</head>

<body style="overflow:scroll">

    <div class="ui middle aligned center aligned grid">
        <div class="four wide column imaged">
            <h2 class="ui orange image header">
                <div class="content">
                    Versement bancaire
                </div>
            </h2>
            <form class="ui large form" method="get" action="./interface.php">
                <div class="ui piled segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="call icon"></i>
                            <input required="required" type="text" name="number" placeholder="Numero de telephone">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="money icon"></i>
                            <input required="required" type="number" name="somme" placeholder="Montant du versement">
                        </div>
                    </div>
                    <button class="ui fluid large orange submit button">Valider</button>
                </div>
            </form>
        </div>
        <div class="ui ten wide column">

        </div>
        <?php if(isset($nom)){?>

        <div class="ui nine wide column left aligned">
            <div class="ui stacked segment">
                <h1 class="ui header teal"> Caisse</h1>
                <div class="ui message positive">
                    <div class="label">Nom: <?php echo (isset($nom))?$nom:''; ?></div>
                    <div class="ui divider"></div>
                    <div class="label">Numero de telephone: <?php echo (isset($phone))?$phone:''; ?></div>
                    <div class="ui divider"></div>
                    <div class="label">Montant en caisse: <?php echo number_format($esxSom,0,"."," "); ?> XAF</div>
                </div>
            </div>
        </div>

        <?php }?>
        <div class="ui nine wide column left aligned" style="float:right; margin-right:135px;top:0px">
            <div class="ui stacked segment">
                <h1 class="ui header teal"> Plateforme</h1>
                <div class="ui message positive">
                    <div class="label">Numero de telephone: <?php echo (isset($phoneA))?$phoneA:''; ?></div>
                    <div class="ui divider"></div>
                    <div class="label">Montant en caisse:
                        <?php settype($esxSomA,"double"); echo number_format((isset($esxSomA))?$esxSomA:0,0,"."," "); ?>
                        XAF</div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>