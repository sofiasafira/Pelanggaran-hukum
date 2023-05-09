<!DOCTYPE html>
<html lang="en">

<head>
    <title>PelHum|Dashboard</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/simbol.png" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Link Font dan icon Font -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Link CSS-->
    <link rel="stylesheet" href="{{ asset('assets-layout/css/style.min.css') }}">

    <!-- Include Leaflet CSS file in the head section -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
        integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha512-Dqm3h1Y4qiHUjbhxTuBGQsza0Tfppn53SHlu/uj1f+RT+xfShfe7r6czRf5r2NmllO2aKx+tYJgoxboOkn1Scg=="
        crossorigin=""></script>
    <style>
        #map {
            height: 550px;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #198754" id="mainNav">
        <div class="collapse navbar-collapse" id="navbarResponsive">
        </div>
        <div class="container px-4 px-lg-5" style="padding-left: 0;">
            <img src="assets-admin\image\simbol.png" alt="..." width="50px" style="margin-right: 20px"><a
                class="navbar-brand" href="#page-top">Informasi Sebaran Pelanggaran Hukum</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login PN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <div>
            <div style="margin-top: 60px; margin-left: 30px; padding: 0px;">
            <div class = "custom-control custom-checkbox" > <input type = "checkbox" class = "custom-control-input" id = "customCheck1" > <label class = "custom-control-label" for = "customCheck1 " > Label Opsi </label> </div> <div class = "custom-control custom-control-lg custom-checkbox" > <input type = "kotak centang" class = "input-kontrol-kustom" id ="customCheck2" > <label class = "custom-control-label" for = "customCheck2" > Label Pilihan </label> </div>
        </div>
            <div class="main" style="margin-top: 10px;  margin: 50px; padding: 10px; border: 1px solid #ddd;">
                <div id="map" style="height: 500px;"></div>
            </div>
        </div>
    <div>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="social d-flex justify-content-center">
            <a class="mx-1"
                href="https://www.pt-nad.go.id/new/link/20151028150350590156308166703b3x.html"><i class="fa fa-globe"></i></a>
                <a class="mx-2" href="https://web.facebook.com/pt.aceh"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="https://www.instagram.com/pt.bandaaceh//"><i
                class="fab fa-instagram"></i></a>
        </div>
        <div class="container px-1 px-lg-3">Copyright &copy; PelHum 2022 - Peradilan Umum Aceh</div>
    </footer>
    <!-- Link Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link Core theme JS-->
    <script src="assets-home/js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"
        integrity="sha512-QE2PMnVCunVgNeqNsmX6XX8mhHW+OnEhUhAWxlZT0o6GFBJfGRCfJ/Ut3HGnVKAxt8cArm7sEqhq2QdSF0R7VQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" refer></script>
    <script>
        var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	    });

        var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
        });


        var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
        });

        var map = L.map('map', {
            center: [4.1908315, 96.4750404],
            zoom: 7,    
        });

        var baseMaps = {
            "light": peta1,
            "Satelite": peta2,
            "Streets": peta3,
            "Dark":peta4
        };
        var layerControl = L.control.layers(baseMaps).addTo(map);

        googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        @foreach ($geojson_kabupaten as $list)
            $.getJSON("{{ $list->geojson_kab }}", function(data) {
                var geojsonLayer = L.geoJSON(data, {
                    onEachFeature: function(feature, layer) {
                        var idCounters = {};
                        layer.on('click', function() {
                            layer.bindPopup(
                                "Kab: {{ $list->nama_kab }} <br> Jumlah Pelanggaran: "
                            );
                        });
                        map.addLayer(layer);
                        //mengubh warna geojson
                    }
                });
            });
        @endforeach

        @foreach($titik as $titiks)
        var marker = L.marker([{{ $titiks->latitude }}, {{ $titiks->longitude}}]).addTo(map);
        marker.bindPopup("{{ $titiks->nama_pengadilan }}");
        @endforeach
 
        // @foreach($geojson_kabupaten as $nama_kabupaten)
        // var label = L.label([{ $nama_kabupaten->nama_kab }]).addTo(map);
        //     label.bindTooltip("{{ $list->nama_kab }}");
        // @endforeach

    </script>
</body>
</html>
