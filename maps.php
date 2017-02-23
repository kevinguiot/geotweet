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
            var map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
        }
        var myKey = "AIzaSyBb2bYaxyRoCoz45sB9DXUpo_dJxuzmAf8";
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