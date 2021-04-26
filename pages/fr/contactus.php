<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden">

<head>
    <title>Abodah Funding</title>

    <?php
      $index="contact"; 
      include("../../includes/header.php"); 
      
      !isset($_SESSION)?session_start():'';
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

                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="margin-top:40px; margin-bottom:20px; ">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="infos-demandeur" role="tabpanel"
                                aria-labelledby="nav-home-tab" style="background:rgba(192, 246, 248, 0);">
                                <div class="modal-header ui fields"
                                    style="padding-top:-5px!important; padding-bottom:-5px!important;
                                                          font-family: 'Roboto', sans-serif!important;font-weight: 300!important;line-height: 1.625em!important;background-color: rgba(226, 226, 225, 0.142);">
                                    <h5 class="modal-title" id="ModalLongTitle" data-backdrop="false"
                                        style="font-size:24px!important;color:darkorange!important;margin-top:0px!important;margin-bottom:0px!important;">
                                        Nous contacter
                                    </h5>
                                </div>
                                <form action="../traitements/contactus.php" method="post" id="formA"
                                    class="text-center border border-light p-5 ui large form">

                                    <div class="field">
                                        <div class="ui left icon input">
                                            <i class="user green icon"></i>
                                            <input type="text" name="nom" placeholder="Vorte nom" value="<?php
                                    if(isset($_SESSION['nom'])){
                                      if(!empty($_SESSION['nom'])){
                                        echo $_SESSION['nom']." ";
                                       }
                                     } 
                                     if(isset($_SESSION['prenom'])){
                                      if(!empty($_SESSION['prenom'])){
                                        echo $_SESSION['prenom'];
                                       }
                                     } ?>" required="required">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui left icon input">
                                            <i class=" orange mail icon"></i>
                                            <input type="email" name="email" placeholder="Votre email" value="<?php
                                    if(isset($_SESSION['email'])){
                                     if(!empty($_SESSION['email'])){
                                       echo $_SESSION['email'];
                                      }
                                    } ?>" required="required">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="ui left icon input">
                                            <label for="" style="float: left; color:rgba(0,0,0,0.5)">Votre
                                                message</label><br><br>
                                            <textarea name="texte" required="required" placeholder="Votre message"
                                                value=''></textarea>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <span class="field"><button type="submit"
                                                class="ui fluid large teal submit button">Envoyer</button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map" class="ui container" style="border:0; width: 100%; height: 384px;" allowfullscreen>
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

            <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
            <script>
            // TO MAKE THE MAP APPEAR YOU MUST
            // ADD YOUR ACCESS TOKEN FROM
            // https://account.mapbox.com
            mapboxgl.accessToken =
                'pk.eyJ1Ijoid29vdGFya292c2tpIiwiYSI6ImNrNmMzYTN2MDB4NTEza21ncjIwdHIxczEifQ.vIsFKXlEkPMKclA4KZQhLw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [11.4564852, 3.8688273],
                zoom: 15
            });
            var size = 200;

            // implementation of CustomLayerInterface to draw a pulsing dot icon on the map
            // see https://docs.mapbox.com/mapbox-gl-js/api/#customlayerinterface for more info
            var pulsingDot = {
                width: size,
                height: size,
                data: new Uint8Array(size * size * 4),

                // get rendering context for the map canvas when layer is added to the map
                onAdd: function() {
                    var canvas = document.createElement('canvas');
                    canvas.width = this.width;
                    canvas.height = this.height;
                    this.context = canvas.getContext('2d');
                },

                // called once before every frame where the icon will be used
                render: function() {
                    var duration = 1000;
                    var t = (performance.now() % duration) / duration;

                    var radius = (size / 2) * 0.3;
                    var outerRadius = (size / 2) * 0.7 * t + radius;
                    var context = this.context;

                    // draw outer circle
                    context.clearRect(0, 0, this.width, this.height);
                    context.beginPath();
                    context.arc(
                        this.width / 2,
                        this.height / 2,
                        outerRadius,
                        0,
                        Math.PI * 2
                    );
                    context.fillStyle = 'rgba(255, 200, 200,' + (1 - t) + ')';
                    context.fill();

                    // draw inner circle
                    context.beginPath();
                    context.arc(
                        this.width / 2,
                        this.height / 2,
                        radius,
                        0,
                        Math.PI * 2
                    );
                    context.fillStyle = 'rgba(255, 100, 100, 1)';
                    context.strokeStyle = 'white';
                    context.lineWidth = 2 + 4 * (1 - t);
                    context.fill();
                    context.stroke();

                    // update this image's data with data from the canvas
                    this.data = context.getImageData(
                        0,
                        0,
                        this.width,
                        this.height
                    ).data;

                    // continuously repaint the map, resulting in the smooth animation of the dot
                    map.triggerRepaint();

                    // return `true` to let the map know that the image was updated
                    return true;
                }
            };

            map.on('load', function() {
                map.addImage('pulsing-dot', pulsingDot, {
                    pixelRatio: 2
                });

                map.addSource('points', {
                    'type': 'geojson',
                    'data': {
                        'type': 'FeatureCollection',
                        'features': [{
                            'type': 'Feature',
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [11.4564852, 3.8688273]
                            }
                        }]
                    }
                });
                map.addLayer({
                    'id': 'points',
                    'type': 'symbol',
                    'source': 'points',
                    'layout': {
                        'icon-image': 'pulsing-dot'
                    }
                });
            });
            /* var marker = new mapboxgl.Marker()
            .setLngLat([11.4564852,3.8688273])
            .addTo(map); */
            </script>

</html>