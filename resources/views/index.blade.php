<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PelHum | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <!-- Link CSS-->
    <!-- <link rel="stylesheet" href="{{asset('assets-admin/css/style.min.css')}}"> -->

            <!-- Include Leaflet CSS file in the head section -->
        <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/> -->

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <!-- <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="crossorigin=""></script> -->
<!-- 
        <style>
            #map { height: 180px; }
        </style> -->

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="{{asset('assets-umum/css/leaflet.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/L.Control.Locate.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/qgis2web.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/leaflet-search.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/leaflet-control-geocoder.Geocoder.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets-umum/css/leaflet-measure.min.css')}}">
        <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        </style>
  </head>


  <body>
  <!-- <nav class="navbar navbar-expand navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">SEBARAN PELANGGARAN HUKUM PERADILAN UMUM ACEH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login PN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">About</a>
                </li>        
            </ul>
        </div>
    </div>
   </nav> -->
    <div id="map"></div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

        <!-- <script> 
        var map = L.map('map').setView([51.505, -0.09], 13);
        
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map); 
        </script> -->

        <script src = "{{asset ('assests-umum/js/qgis2web_expressions.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/L.Control.Locate.min.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet.rotatedMarker.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet.pattern.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet-hash.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/Autolinker.min.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/rbush.min.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/labelgun.min.js.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/labels.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet-control-geocoder.Geocoder.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet-measure.js')}}"> </script>
        <script src = "{{asset ('assests-umum/js/leaflet-search.js')}}"> </script>
        <script src = "{{asset ('assests-umum/data/acehbaratdaya_1.js')}}"> </script>

        <script>
        var highlightLayer;
        function highlightFeature(e) {
            highlightLayer = e.target;
            highlightLayer.openPopup();
        }
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1
        }).fitBounds([[2.776600288875623,96.01319239076952],[4.563259907822035,99.20565628669257]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
        var measureControl = new L.Control.Measure({
            position: 'topleft',
            primaryLengthUnit: 'meters',
            secondaryLengthUnit: 'kilometers',
            primaryAreaUnit: 'sqmeters',
            secondaryAreaUnit: 'hectares'
        });
        measureControl.addTo(map);
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .innerHTML = '';
        document.getElementsByClassName('leaflet-control-measure-toggle')[0]
        .className += ' fas fa-ruler';
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        map.createPane('pane_GoogleSatellite_0');
        map.getPane('pane_GoogleSatellite_0').style.zIndex = 400;
        var layer_GoogleSatellite_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            pane: 'pane_GoogleSatellite_0',
            opacity: 1.0,
            attribution: '<a href="https://www.google.at/permissions/geoguidelines/attr-guide.html">Map data ©2015 Google</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 20
        });
        layer_GoogleSatellite_0;
        map.addLayer(layer_GoogleSatellite_0);
        function pop_acehbaratdaya_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature){
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });
            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['kode'] !== null ? autolinker.link(feature.properties['kode'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Nama Pengadilan Negeri</th>\
                        <td>' + (feature.properties['Nama Pengadilan Negeri'] !== null ? autolinker.link(feature.properties['Nama Pengadilan Negeri'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Pelanggaran Pidana Khusus</th>\
                        <td>' + (feature.properties['Pelanggaran Pidana Khusus'] !== null ? autolinker.link(feature.properties['Pelanggaran Pidana Khusus'].toLocaleString()) : '') + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">Lokasi</th>\
                        <td>' + (feature.properties['Lokasi'] !== null ? autolinker.link(feature.properties['Lokasi'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_acehbaratdaya_1_0() {
            return {
                pane: 'pane_acehbaratdaya_1',
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1.0, 
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(186,20,25,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_acehbaratdaya_1');
        map.getPane('pane_acehbaratdaya_1').style.zIndex = 401;
        map.getPane('pane_acehbaratdaya_1').style['mix-blend-mode'] = 'normal';
        var layer_acehbaratdaya_1 = new L.geoJson(json_acehbaratdaya_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_acehbaratdaya_1',
            layerName: 'layer_acehbaratdaya_1',
            pane: 'pane_acehbaratdaya_1',
            onEachFeature: pop_acehbaratdaya_1,
            style: style_acehbaratdaya_1_0,
        });
        bounds_group.addLayer(layer_acehbaratdaya_1);
        map.addLayer(layer_acehbaratdaya_1);
        var osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .className += ' fa fa-search';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
        .title += 'Search for a place';
        setBounds();
        map.addControl(new L.Control.Search({
            layer: layer_acehbaratdaya_1,
            initial: false,
            hideMarkerOnCollapse: true,
            propertyName: 'kode'}));
        document.getElementsByClassName('search-button')[0].className +=
         ' fa fa-binoculars';
        </script>
    </body>
</html>