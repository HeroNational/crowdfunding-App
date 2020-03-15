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

    <meta name="keywords" content="crowndfunding, financement participatif,  financement, participatif, projet, guanxi, investissement, invest, money, argent, web payment, payement en ligne, payement, payment, abodah, crowndlending" />
    <meta name="og:url" content="http://localhost/serve/Crowdfunding/">
    <meta name="og:title" content="Abodah Funding">
    <meta name="og:image" content="http://localhost/serve/Crowdfunding/img/loader.gif">
    <link id="favicon" rel="shortcut icon" href="../../img/contactUs.png">
    <link rel="apple-touch-icon" sizes="194x194" href="../../img/contactUs.png">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../style/eStartup/eStartup.css">
    <link rel="stylesheet" href="../../style/suiM/semantic.css">
    <link rel="stylesheet" href="../../style/suiM/components/transition.css">
    <link rel="stylesheet" href="../../style/main.css">
    <link rel="stylesheet" href="../../style/animate/animate.css">
    <link rel="stylesheet" href="../../style/imgHover/imagehover.min.css">
    <link rel="stylesheet" href="../../style/swal/swal.css">
    <link rel="stylesheet" href="../../style/bootstrap/bootstrapswal.css">
    <link rel="stylesheet" href="../../style/socicon/style.css">
    <link rel="stylesheet" href="../../js/particlesjs/demo/css/style.css">
    <link rel="stylesheet" href="../../style/Linearicons/Linearicons/Web Font/style.css">
    <script src="../../js/wow/wow.js"></script>


    

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