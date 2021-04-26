<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">

<head>
    <title>Abodah Funding | Page not found</title>
    <link rel="stylesheet" href="../../style/error.css">

    <?php
      $index="contact"; 
      include("../../includes/header.php"); 
    ?>
    <section id="helm" class="wow fadeIn">

        <div class="helm-container">
            <?php include("../../includes/menu.php"); ?>
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

            <div style="width: 100%;position: relative; top: -70px">


                <br><br>
                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>:(</h1>
                        </div>
                        <h2>404 - Page not found</h2>
                        <p>The page you are looking for might have been removed had its name changed or is temporarily
                            unavailable.
                        </p>
                        <a href="javascript:history.go(-1)">Go back</a>
                    </div>
                </div>
                <?php 
        mail(utf8_encode("danie@gmail.com"),utf8_encode("Error 404 on the website of Crowndfunding by Abodah"),utf8_encode("The affected page is ".$_SERVER['REQUEST_URI']."<br> At ".date("r")));
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