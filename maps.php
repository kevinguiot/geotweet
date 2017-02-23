<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
        html {  height: 100%; }
        body
        {
            height: 100%;
            margin: 0px;
            padding: 0px;
        }
        #map_canvas { height: 100%;}
    </style>
    <script type="text/javascript">
    function initialize() {
        var latlng = new google.maps.LatLng(46.52863469527167,2.43896484375);
        var myOptions = {
            zoom: 6,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
    
        <?php
        //On parcourt les coordonnées
        foreach($coordonnees as $key => $coordonnee) {
            
            //On rajoute le marqueur
            echo "\t".'var marker'.$key.' = new google.maps.Marker({map: map,position: '.$coordonnee['position'].',title: "'.$coordonnee['text'].'"});'."\n";
            
            //On rajoute les informations du marqueur
            echo "\t".'var infowindow'.$key.' = new google.maps.InfoWindow({content: "'.$coordonnee['name'].' (@'.$coordonnee['screen_name'].')<br>'.$coordonnee['text'].'",size: new google.maps.Size(70,50)});'."\n";
            
            //On rajoute l'événement
            echo "\t".'google.maps.event.addListener(marker'.$key.', \'click\', function() {infowindow'.$key.'.open(map,marker'.$key.'); });'."\n\n\n";
        }
        ?>
    }
    
    //On mentionne la clef de GOOGLE A.P.I
    var myKey = "AIzaSyBb2bYaxyRoCoz45sB9DXUpo_dJxuzmAf8";
    
    //Fonction permettant de charger la map
    function loadScript() {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "https://maps.googleapis.com/maps/api/js?key=" + myKey + "&sensor=false&callback=initialize";
        document.body.appendChild(script);
    }
    </script>
</head>
<body onload="loadScript()">
    <div id="map_canvas" style="width: 100%; height: 100%">
    </div>
</body>