    <style>
      
      #helm{
        <?php if(isset($index)){
            if($index=="index"){?>
          background: url(../../img/4.jpg) center bottom no-repeat;
          height: calc(100vh + 40px);
          background-size: cover!important;
          top: -40px!important;
        <?php }else{ ?>
            
          background: rgba(0, 0, 0, 0.9)!important;
          height: 47px!important;
          top: -40px!important;
          <?php
        }
            }?>
      }
      .helm-container{
          position: absolute!important;
      }
  
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google" content="notranslate">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="Abodah develepment service">
    <meta name="description" content="La solution au problème de financement de vos projets.">
    <meta name="og:description" content="La solution au problème de financement de vos projets.">

    <meta name="keywords" content="crowdfunding, financement participatif,  financement, participatif, projet, guanxi, investissement, invest, money, argent, web payment, payement en ligne, payement, payment, abodah, crowndlending" />
    <meta name="og:url" content="http://localhost/serve/Crowdfunding/">
    <meta name="og:title" content="Abodah Funding">
    <meta name="og:image" content="http://localhost/serve/Crowdfunding/img/f.png">
    <link id="favicon" rel="shortcut icon" href="../../img/contactUs.png">
    <link rel="apple-touch-icon" sizes="194x194" href="../../img/contactUs.png">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../style/eStartup/eStartup.css">
    <link rel="stylesheet" href="../../style/suiM/semantic.css">
    <link rel="stylesheet" href="../../style/suiM/components/transition.css">
    <link rel="stylesheet" href="../../style/returnOnTop.css">
    <link rel="stylesheet" href="../../style/animate/animate.css">
    <link rel="stylesheet" href="../../style/imgHover/imagehover.css">
    <link rel="stylesheet" href="../../style/swal/swal.css">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrapswal.css">
    <link rel="stylesheet" href="../../style/socicon/style.css">
    <link rel="stylesheet" href="../../js/particlesjs/demo/css/style.css">
    <link rel="stylesheet" href="../../style/Linearicons/Linearicons/Web Font/style.css">
    <script src="../../js/wow/wow.js"></script>
    <link rel="stylesheet" href="../../style/maine.css"> 

    <script>
        $(document)
          .ready(function() {
            $('.ui.selection.dropdown').dropdown();
            $('.ui.menu .ui.dropdown').dropdown({
              on: 'hover'
            });
          })
        ;
        function contextmenu(){
          swal(
            "",
            "Action non permise.\n\n",
            "error"
            );
        }
    </script>
    <script src="../../js/swal/swalmin.js"></script>

</head>
<?php 

    function formatsimpledate($string, $language,$seprator){
      $stringEx=explode('-',$string);
      if($language=='fr'){
        $year=array('01'=>"Janvier",'02'=>'fevrier','03'=>'mars','04'=>'avril','05'=>'mai','06'=>'juin','07'=>'juillet','08'=>'aout','09'=>'septembre','10'=>'octobre','11'=>'novembre','12'=>'decembre');
      }elseif($language=='es'){
        $year=array('01'=>"enero",'02'=>'febrero','03'=>'marso','04'=>'april','05'=>'mayo','06'=>'juno','07'=>'julio','08'=>'augosto','09'=>'septiembre','10'=>'octubre','11'=>'noviembre','12'=>'deciembre');
      }else{
        $year=array('01'=>"Janary",'02'=>'febuary','03'=>'march','04'=>'april','05'=>'may','06'=>'june','07'=>'july','08'=>'august','09'=>'september','10'=>'october','11'=>'november','12'=>'december');
      }
      return $stringEx[2].$seprator.$year[$stringEx[1]].$seprator.$stringEx[0];
    }
    
    function financer($number,$token,$montant){
      $url="http://localhost/serve/Crowdfunding/api/api_rest.php?number=$number&token=$token&somme=$montant";
      $api = @json_decode(file_get_contents($url));
      if($api){
          $value=array();
          if($api->status=="success"){
              $value=array("status"=>$api->status,"nom"=>$api->nom);
          }else{
              $value=array("status"=>$api->status,"message"=>$api->message);
          }
      }else{
          $value=array("status"=>"failed","message"=>"FAil to call the Payment API.");
      }
      return $value;
    }
    require_once("notification_financement.php");

 
    if (isset($_SESSION['notification'])){
      if ($_SESSION['notification']==true){
    ?>
        <div onclick="$(this).slideToggle(100)" data-wow-iteration="infinite" data-wow-duration="1500ms"  class="ui wow pulse animated messageNotification <?php echo $_SESSION['notification_status'] ?> message"  style="position:fixed;max-width:400px; z-index:100000000000; bottom:60px; right:15px; "><?php echo $_SESSION['notification_text']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="ui close icon"></i></div>
    <?php
       $_SESSION['notification']=false;
      }
    }

  ?>
<body oncontextmenu="contextmenu();return false;" id="gbody" onload="load()">

    <div class="loader forLoad" id="loaderPri">
        <div class="loader-inner">
            <div class="loader-line-wrap">
                <div class="loader-line">
                </div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line">
                </div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line">
                </div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line">
                </div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line">
                </div>
            </div>
        </div>
    </div>