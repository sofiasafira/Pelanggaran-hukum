<!DOCTYPE html>
<html>
<head>
	<title>PelHum | Peta Sebaran</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/simbol.png" />
    <!-- Link CSS-->
        <link rel="stylesheet" href="{{ asset('assets-umum/css/style.min.css') }}">

    <!-- Include Leaflet CSS file in the head section -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha512-Dqm3h1Y4qiHUjbhxTuBGQsza0Tfppn53SHlu/uj1f+RT+xfShfe7r6czRf5r2NmllO2aKx+tYJgoxboOkn1Scg=="crossorigin=""></script>

    <!-- Include JavaScript Chart -->   
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
	<!-- Navbar -->
    <nav>
        <div class="navbar-logo">
            <a href="#"><img src="assets-admin/image/simbol.png" alt="Logo"></a>
            <h1 style="font-weight: bold;">Informasi Sebaran Pelanggaran Hukum</h1>
        </div>
    <div class="navbar-items" >
        <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login Pengadilan</a></li>
        <li><a href="/tentang">Tentang</a></li>
        </ul>
    </div>
    </nav>


	<!-- Content -->
 	<div class="content">
        <div class="total-container">
            <div class="form-check form-switch">
                <input type="checkbox" id="tampilkan-geojson-checkbox">
                <label class="form-check-label" for="tampilkan-geojson-checkbox">Tampilkan Batas Administrasi</label>
                <input type="checkbox" id="tampilkan-pengadilan-checkbox" />
                <label class="form-check-label" for="tampilkan-pengadilan-checkbox">Tampilkan Lokasi Pengadilan</label>
            </div>
            <div class="total-pelanggaran">Total Pelanggaran Aceh : {{$total_pelanggaran}}</div>
        </div>
       
        <div class="main" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd;">
            <div id="map" style="height: 500px;"></div>
        </div>

        <div class="main" style="margin-top: 20px; margin: 20px; border: 1px solid #ddd; width: fit-content; display: flex; flex-direction: column; background-color: #9d8e1e;">
            <div style="display: inline-block; vertical-align: top;">
                <select id="dropdown1" style="width: 150px; background-color: #9d8e1e;">
                <option value="" disabled selected>Pilih Tahun</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                </select>
            </div>
        </div>

        <div class="main" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd; display: flex; flex-direction: column; background-color: white; align-items: center;">
            <div class="judul-grafik" style="flex: 1; margin-top: 8px; margin-bottom: 20px;"> Bar Chart dan Doughtnut Chart Pelanggaran Hukum Aceh</div>           
            <div class="chart-wrapper" style="display: flex; flex-direction: row; width: 100%;">
                <div class="chart-container" style="width: 50%; margin-right: 15px;">
                    <canvas id="bar-chart-1"></canvas>
                </div>
                <div class="chart-container" style="width: 50%; margin-left: 15px;">
                    <canvas id="doughnut-chart-2"></canvas>
                </div>
            </div>
        </div>

        <div class="main" style="margin-top: 20px; margin: 20px; padding: 30px; border: 1px solid #ddd; display: flex; flex-direction: column; background-color: white;">
            <div class="judul-drop">Jumlah Pelanggaran Berdasarkan Direktori</div>
            <ul class="bullet-list">
                <li class="bullet-item red">Pengadilan Negeri</li>
                <li class="bullet-item green">Mahkamah Syariah</li>
                <li class="bullet-item blue">Pengadilan Militer</li>
                <li class="bullet-item yellow">Pengadilan Tata Usaha Negara</li>
            </ul>

            <div style="display: inline-block; vertical-align: top;">
                <select id="dropdown2" style="width: 150px;">
                    <option value="" disabled selected>Pilih Direktori</option>
                    <option value="1">Pidana Khusus/Militer</option>
                    <option value="2">Pidana Umum</option>
                    <option value="3">Perdata</option>
                    <option value="4">Perdata Agama</option>
                    <option value="5">TUN</option>
                    <option value="6">Perdata Khusus</option>
                </select>
                <div id="informasi" style="text-align:left;" ></div>
            </div>
        </div> 
    </div>
	<!-- Footer -->
	<div class="footer">
        <div class="container px-1 px-lg-3">Copyright &copy; PelHum 2022 - Peradilan Umum Aceh</div>
	</div>

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
    	<!-- Load Leaflet.Legend CSS and JavaScript -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Leaflet/Leaflet.legend/dist/L.Control.Legend.css" />
	<script src="https://cdn.jsdelivr.net/gh/Leaflet/Leaflet.legend/dist/L.Control.Legend.js"></script>

    <!-- Diagram Batang -->
    <script>
        var ctx1 = document.getElementById('bar-chart-1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Jan - Feb', 'Mar - Apr', 'Mei - Jun', 'Jul - Agust', 'Sep - Okt', 'Nov - Des'],
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: [10, 5, 3, 7, 2, 6],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                    }]
                }
            }
        });

        
        var dropdown1 = document.getElementById('dropdown1');
            dropdown1.addEventListener('change', function() {
                var year = this.value;
                // Dapatkan data baru untuk tahun yang dipilih
                var newData = getNewDataForYear(year);
                // Perbarui data pada chart
                chart1.data.datasets[0].data = newData;
                chart1.update();
            }
        );

        function getNewDataForYear(year) {
            // TODO: Ganti ini dengan kode Anda untuk mendapatkan data baru berdasarkan tahun yang dipilih
            var data;
            if (year == '2023') {
                data = [5, 3, 8, 4, 1, 1];
            } else if (year == '2022') {
                data = [6, 4, 7, 3, 2, 10];
            } else if (year == '2021') {
                data = [4, 3, 8, 4, 1, 6];
            } else {
                data = [0, 0, 0, 0, 0, 0]; // return default data if year is not valid
            }
            return data;
        }
     
    </script>

    <!-- Diagram Doughnut -->
    <script>
        
        var data2 = {
            labels: ["Pengadilan Umum", "Mahkamah Syariah", "Pengadilan Militer", "Pengadilan Tata Usaha Negara"],
            datasets: [
                {
                    label: "Total Pelanggaran: ",
                    backgroundColor: [
                        "#0c4cac",
                        "#3cb649",
                        "#fb7648",
                        "#e2fa62",
                    ],
                    data: <?php echo json_encode($data_pelanggaran); ?>
                }
            ]
        };

        var options2 = {
            title: {
                display: true,
                text: "Doughnut Chart"
            },
            maintainAspectRatio: false, // menonaktifkan pengaturan aspek rasio
            responsive: true, // memungkinkan chart menyesuaikan ukuran
            aspectRatio: 1 // menentukan rasio aspek chart (lebar/tinggi)
        };

        var doughnutChart2 = new Chart(document.getElementById("doughnut-chart-2"), {
            type: 'doughnut',
            data: data2,
            options: options2
        });

        document.getElementById("dropdown1").addEventListener("change", function() {
            var selectedValue = this.value;
            if (selectedValue === "2023") {
            doughnutChart2.data.datasets[0].data = <?php echo json_encode($data21); ?>
            } else if (selectedValue === "2022") {
            doughnutChart2.data.datasets[0].data = <?php echo json_encode($data22); ?>
            } else if (selectedValue === "2021") {
            doughnutChart2.data.datasets[0].data = <?php echo json_encode($data23); ?>
            }
            doughnutChart2.update();
        });
    </script>

    <script>

        // // definisikan legenda
        // var legend = L.control({ position: 'bottomright' });
        // legend.onAdd = function(map) {
        // var div = L.DomUtil.create('div', 'info legend'),
        //     grades = [1, 2, 10, 20, 50, 100], // nilai yang akan dibandingkan
        //     labels = [],
        //     from, to;

        // // tambahkan label pada setiap kondisi
        // for (var i = 0; i < grades.length; i++) {
        //     from = grades[i];
        //     to = grades[i + 1] - 1;

        //     labels.push(
        //     '<i style="background:' + getColor(from + 1) + '"></i> ' +
        //     from + (to ? '&ndash;' + to : '+'));
        // }

        // // tambahkan legenda ke dalam div
        // div.innerHTML = labels.join('<br>');

        // return div;
        // };

        // // tambahkan legenda ke dalam peta
        // legend.addTo(map);

        // // fungsi untuk menentukan warna berdasarkan nilai
        // function getColor(d) {
        // return d > 100 ? '#FF0000' :
        //     d > 50 ? '#FFA500' :
        //     d > 20 ? '#FFFF00' :
        //     d > 10 ? '#008000' :
        //     d > 2 ? '#0000FF' :
        //     '#FFFFFF';
        // }
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
            center: [5.555075, 95.3251659],
            zoom: 12,    
        });
        

        // Menambahkan layer pengadilan
        const pengadilanAcehpu = L.layerGroup();
        const pengadilanAcehpa = L.layerGroup();
        const pengadilanAcehptun = L.layerGroup();
        const pengadilanDefault = L.layerGroup();

        const pengadilan = {!! json_encode($titik) !!};
        pengadilan.forEach(function(titik) {
            var iconUrl = '';
            if (titik.kode_jenis_id === "acehpu") {
                iconUrl = 'assets-umum/images/iconA.png';
                pengadilanAcehpu.addLayer(createMarker(titik, iconUrl));
            } else if (titik.kode_jenis_id == "acehpa") {
                iconUrl = 'assets-umum/images/iconB.png';
                pengadilanAcehpa.addLayer(createMarker(titik, iconUrl));
            } else if (titik.kode_jenis_id == "acehptun") {
                iconUrl = 'assets-umum/images/iconC.png';
                pengadilanAcehptun.addLayer(createMarker(titik, iconUrl));
            } else {
                iconUrl = 'assets-umum/images/iconDefault.png';
                pengadilanDefault.addLayer(createMarker(titik, iconUrl));
            }
        });

        function createMarker(titik, iconUrl) {
            var icon = L.icon({
                iconUrl: iconUrl,
                iconSize: [40, 40],
                iconAnchor: [20, 40],
                popupAnchor: [0, -40]
            });
            return L.marker([titik.latitude, titik.longitude], {icon: icon})
                .bindPopup(titik.nama_pengadilan + "<br>Jumlah Pelanggaran: ");
        }


        const baseMaps = {
            "light": peta1,
            "Satelite": peta2,
            "Streets": peta3,
            "Dark": peta4
        };

        const layerControl = L.control.layers(baseMaps, {
            'Pengadilan Negeri': pengadilanAcehpu,
            'Mahkamah Syariah': pengadilanAcehpa,
            'Pengadilan Tata Usaha Negara': pengadilanAcehptun,
            'Pengadilan Militer': pengadilanDefault
        }).addTo(map);

        // create an object to store the layer groups and their labels

        // Menambahkan layer direktori
        const dirPidanaKhusus = L.layerGroup();
        const dirPidanaUmum = L.layerGroup();
        const dirPerdata = L.layerGroup();
        const dirPerdataAgama = L.layerGroup();
        const dirTUN = L.layerGroup();
        const dirPerdataKhusus = L.layerGroup();

        var layerGroups = {
        'Dir. Pidana Khusus': dirPidanaKhusus,
        'Dir. Pidana Umum': dirPidanaUmum,
        'Dir. Perdata': dirPerdata,
        'Dir. Perdata Agama': dirPerdataAgama,
        'Dir. TUN': dirTUN,
        'Dir. Perdata Khusus': dirPerdataKhusus
        };

        var direktori = {!! json_encode($titikdir) !!};

        // map.on('zoomend', function() {
        //     var zoom = map.getZoom();

        //     direktori.forEach(function(titikdir) {
        //         var markerColor = '';
        //         var radius = zoom < 10 ? 4 : zoom < 13 ? 6 : 8; //atur ukuran radius point sesuai zoom

        //         if (titikdir.kode_direktori_id === "dir01") {
        //             markerColor = 'red';
        //             dirPidanaKhusus.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         } else if (titikdir.kode_direktori_id === "dir02") {
        //             markerColor = 'orange';
        //             dirPidanaUmum.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         } else if (titikdir.kode_direktori_id === "dir03") {
        //             markerColor = 'yellow';
        //             dirPerdata.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         } else if (titikdir.kode_direktori_id === "dir04") {
        //             markerColor = 'green';
        //             dirPerdataAgama.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         } else if (titikdir.kode_direktori_id === "dir05") {
        //             markerColor = 'blue';
        //             dirTUN.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         } else {
        //             markerColor = 'purple';
        //             dirPerdataKhusus.addLayer(L.circleMarker([titikdir.latitude, titikdir.longitude], {radius: radius, fillColor: markerColor, color: '#000', weight: 1, opacity: 1, fillOpacity: 0.8}));
        //         }
        //     });
        // });

        // map.on('zoomend', function() {
        //     var zoom = map.getZoom();

        //     direktori.forEach(function(titikdir) {
        //         var radius = zoom < 10 ? 4 : zoom < 13 ? 6 : 8; //atur ukuran radius point sesuai zoom

        //         if (titikdir.kode_direktori_id === "dir01") {
        //             dirPidanaKhusus.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         } else if (titikdir.kode_direktori_id === "dir02") {
        //             dirPidanaUmum.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         } else if (titikdir.kode_direktori_id === "dir03") {
        //             dirPerdata.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         } else if (titikdir.kode_direktori_id === "dir04") {
        //             dirPerdataAgama.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         } else if (titikdir.kode_direktori_id === "dir05") {
        //             dirTUN.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         } else {
        //             dirPerdataKhusus.addLayer(L.marker([titikdir.latitude, titikdir.longitude]));
        //         }
        //     });
        // });


        dirPidanaKhusus.addTo(map);
        dirPidanaUmum.addTo(map);
        dirPerdata.addTo(map);
        dirPerdataAgama.addTo(map);
        dirTUN.addTo(map);
        dirPerdataKhusus.addTo(map);


        // create the legend control
        var legend = L.control({position: 'bottomright'});

        // add the checkbox list to the legend
        legend.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'info legend');
        for (var groupName in layerGroups) {
            div.innerHTML +=
            '<input type="checkbox" id="' + groupName + '" name="' + groupName + '" checked>' +
            '<label for="' + groupName + '">' + groupName + '</label><br>';
        }
        
        // add event listener to each checkbox
        div.addEventListener('change', function(e) {
            var layerName = e.target.name;
            var layer = layerGroups[layerName];
            
            if (e.target.checked) {
            layer.addTo(map);
            } else {
            map.removeLayer(layer);
            }
        });
        
        return div;
        };


        // add the legend to the map
        legend.addTo(map);



        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 20,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        
        /*Menampilkan batas dan warna geoJson tiap kabupaten*/

        // get reference to checkbox element
        const tampilkanGeojsonCheckbox = document.querySelector('#tampilkan-geojson-checkbox');

        // set initial checked state for the checkbox
        tampilkanGeojsonCheckbox.checked = true;
        // add event listener to checkbox
        tampilkanGeojsonCheckbox.addEventListener('change', function() {
            // clear existing geojson layers from the map
            map.eachLayer(function(layer) {
                if (layer instanceof L.GeoJSON) {
                    map.removeLayer(layer);
                }
            });
             // if checkbox is checked
            if (this.checked) {
                // loop through each geojson kabupaten
                @foreach ($geojson_kabupaten as $list)
                    <?php
                        $jumlah_pelanggaran = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->count();

                        $jumlah_pelanggarandir1 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir01') // menambahkan filter berdasarkan kode direktori
                            ->count();
                        
                        $jumlah_pelanggarandir2 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir02') // menambahkan filter berdasarkan kode direktori
                            ->count();

                        $jumlah_pelanggarandir3 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir03') // menambahkan filter berdasarkan kode direktori
                            ->count();

                        $jumlah_pelanggarandir4 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir04') // menambahkan filter berdasarkan kode direktori
                            ->count();
                        
                        $jumlah_pelanggarandir5 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir05') // menambahkan filter berdasarkan kode direktori
                            ->count();
                    
                        $jumlah_pelanggarandir6 = DB::table('data_pelanggarans')
                            ->join('users', 'data_pelanggarans.user_id', '=', 'users.id')
                            ->where('users.kode_kab_id', $list->kode_kab)
                            ->where('data_pelanggarans.kode_direktori_id', 'dir06') // menambahkan filter berdasarkan kode direktori
                            ->count();        
                    ?>
                    // load geojson data for current kabupaten
                    $.getJSON("{{ $list->geojson_kab }}", function(data) {
                            var geojsonLayer = L.geoJSON(data, {
                                style: function(feature) {
                                    // set the color of the layer based on the value of jumlah_pelanggaran
                                    var color, weight, opacity;
                                    if ({{ $jumlah_pelanggaran }} > 100) {
                                        color = "#FF0000";
                                        weight = 2;
                                        opacity = 0.7;
                                    } else if ({{ $jumlah_pelanggaran }} > 1) {
                                        color = "#FFA500";
                                        weight = 1;
                                        opacity = 0.7;
                                    } else {
                                        color = "#008000";
                                        weight = 0.5;
                                        opacity = 1;
                                    }
                                    return { 
                                        fillColor: color,
                                        weight: weight,
                                        opacity: opacity
                                    };
                                },
                                onEachFeature: function(feature, layer) {
                                layer.on('click', function() {
                                    map.fitBounds(layer.getBounds());
                                    layer.bindPopup("<div style='background-color: #bea000; padding: 7px;'>Kabupaten {{ $list->nama_kab }} <br> Pidana Khusus: {{ $jumlah_pelanggarandir1 }} <br> Pidana Umum : {{ $jumlah_pelanggarandir2 }}<br> Perdata : {{ $jumlah_pelanggarandir3 }} <br> Perdata Khusus : {{ $jumlah_pelanggarandir4 }} <br> Perdata Agama : {{ $jumlah_pelanggarandir5 }} <br> TUN : {{ $jumlah_pelanggarandir6 }}</div>").openPopup();
                                });

                                    layer.bindTooltip(
                                    "{{ $list->nama_kab }}", {
                                        permanent: true,
                                        direction: "center",
                                        className: "custom-tooltip"
                                    }
                                    );

                                    // Ambil ukuran lebar geoJson kabupaten
                                    var bounds = layer.getBounds();
                                    var width = bounds.getEast() - bounds.getWest();

                                    // Set ukuran lebar tooltip
                                    var tooltipWidth = Math.min(width, 200); // maksimal 200 pixel
                                    $('.custom-tooltip').css('width', tooltipWidth + 'px');
                                    
                                    layer.on('mouseover', function(e) {
                                        layer.setStyle({
                                            weight: 1,
                                            color: 'white',
                                            fillOpacity: 0.7
                                        });
                                    });
                                    layer.on('mouseout', function(e) {
                                        geojsonLayer.resetStyle(layer);
                                    });

                                }
                            });
                            geojsonLayer.addTo(map); // add the layer to the map outside of the onEachFeature function
                        });
                @endforeach

                @foreach ($desas as $listdesa)

                <?php
                    $jumlah_pelanggarandes = DB::table('data_pelanggarans')
                    ->join('desas', 'data_pelanggarans.kode_des_id', '=', 'desas.kode_des')
                    ->where('data_pelanggarans.kode_des_id', $listdesa->kode_des)
                    ->count();

                ?>

                $.getJSON("{{ $listdesa->geojson_des }}", function(data) {
                    var desaLayer = L.geoJSON(data, {
                        style: function(feature) {
                            // Tentukan style berdasarkan nilai atribut tertentu
                            var color;
                            // if (feature.properties.nilai > 75) color = '#1a9850';
                            // else if (feature.properties.nilai > 50) color = '#91cf60';
                            // else if (feature.properties.nilai > 25) color = '#d9ef8b';
                            // else color = '#fee08b';
                            return {
                                color: 'black', // set warna garis pinggir menjadi hitam
                                weight: 1,
                                opacity: 1,
                                dashArray: '3',
                                fillColor: color,
                                fillOpacity: 0.1,
                            };
                        },
                        onEachFeature: function(feature, layer) {
                            // Tambahkan popup dengan informasi desa saat layer di-click
                            layer.on('click', function(e) {
                                var popupContent = '<h3>' + "{{ $listdesa->nama_des }}" + '</h3>' +
                                                '<h4>' + "Total Pelanggaran: {{ $jumlah_pelanggarandes }}" + '</h4>' +
                                                '<p>Nilai: ' + feature.properties.nilai + '</p>';
                                L.popup()
                                    .setLatLng(e.latlng)
                                    .setContent(popupContent)
                                    .openOn(map);
                            });
                        }
                    });
                    // Set zoom pada layer saat di-click
                    desaLayer.on('click', function(e) {
                        map.fitBounds(e.target.getBounds());
                    });
                    desaLayer.addTo(map);
                });
                @endforeach

            }
        });

       

        // set checkbox state on page load
        window.onload = function() {
            tampilkanGeojsonCheckbox.checked = true;
            tampilkanGeojsonCheckbox.dispatchEvent(new Event('change'));
        };
        /*Menampilkan batas dan warna geoJson tiap kabupaten*/

        // Ambil reference ke checkbox
        const tampilkanPengadilanCheckbox = document.getElementById('tampilkan-pengadilan-checkbox');
        // Buat objek untuk menyimpan marker
        const markers = [];
        // Tambahkan event listener untuk checkbox
        tampilkanPengadilanCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Jika checkbox di-check, tampilkan marker
            @foreach($titik as $titiks)
            <?php
                    $pelanggarans = DB::table("data_pelanggarans")->selectRaw('user_id, count(*) as jumlah')
                                        ->where('user_id', $titiks->id)
                                        ->groupBy('user_id')
                                        ->first();
                    $iconUrl = 'assets-umum/images/iconDefault.png';
                    if($titiks->kode_jenis_id === "acehpu"){
                        $iconUrl = 'assets-umum/images/iconA.png';
                    } else if($titiks->kode_jenis_id == "acehpa"){
                        $iconUrl = 'assets-umum/images/iconB.png';
                    } else if ($titiks->kode_jenis_id == "acehptun") {
                        $iconUrl = 'assets-umum/images/iconC.png';
                    }
                    ?>
            var marker;
            var icon = L.icon({
            iconUrl: '{{$iconUrl}}',
            iconSize: [40, 40],
            iconAnchor: [20, 40],
            popupAnchor: [0, -40]
            });
            marker = L.marker([{{$titiks->latitude}}, {{$titiks->longitude}}], {icon: icon}).addTo(map);
            var popupContent = '<div class="popup-content">';
            popupContent += '<img src="{{$titiks->gambar}}" alt="{{$titiks->nama_pengadilan}}" class="popup-image">';
            popupContent += '<div class="popup-info">';
            popupContent += '<h3>{{$titiks->nama_pengadilan}}</h3>';
            popupContent += '<p>Total Pelanggaran: ' + {{$pelanggarans->jumlah ?? 0}} + '</p>';
            popupContent += '<p><a href="{{$titiks->website}}" target="_blank" class="popup-kunjungi">Kunjungi Halaman Website</a></p>';
            popupContent += '<div class="popup-direction">';
            popupContent += '<a href="{{$titiks->maps}}"><img src="assets-umum/images/direction.png" alt="Direction Logo" class="popup-direction-logo"></a>';
            popupContent += '<a href="{{$titiks->sipp}}" target="_blank" class="popup-direction-button">Telusuri Proses Perkara</a>';
            popupContent += '</div>';
            popupContent += '</div>';
            popupContent += '</div>';
            popupContent += '</div>';
            marker.bindPopup(popupContent);
            markers.push(marker);
            @endforeach
        } else {
            // Jika checkbox tidak di-check, sembunyikan marker
            markers.forEach(function(marker) {
            map.removeLayer(marker);
            });
            markers.length = 0;
        }
        });       
    </script>
   
    <!-- Dropdown Informasi Jumlah Untuk Tiap Direktori -->
    <script>
        const dropdown = document.getElementById("dropdown2");
        const informasi = document.getElementById("informasi");
        dropdown.addEventListener("change", function() {
            const value = this.value;
            informasi.innerHTML = "";
            informasi.style.display = "none";
            if (value) {
                informasi.style.display = "block"; 
                if (value === "1") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                            @if ($kla->kode_direktori_id == "dir01" && $kla->kode_jenis_id == "acehpu")
                                <tr>
                                    <td>{{ $kla->nama_klasifikasi }}</td>
                                    <td>
                                        {{ DB::table('data_pelanggarans')
                                            ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                            ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                            ->count() }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);
                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        <tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir01" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);

                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir01" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);
                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir01" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4);
   
                } else if (value === "2") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir02" && $kla->kode_jenis_id == "acehpu")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);
                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir02" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);
                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir02" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);
                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir02" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4);
    
                } else if (value === "3") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir03" && $kla->kode_jenis_id == "acehpu")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);
                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        <tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir03" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);

                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir03" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);

                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir03" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4);
   
                } else if (value === "4") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir04" && $kla->kode_jenis_id == "acehpu")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);
                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir04" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);
                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir04" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);

                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir04" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4);
 
                } else if (value === "5") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir05" && $kla->kode_jenis_id == "acehpu")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);

                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir05" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);

                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir05" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);
                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir05" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4);

                } else if (value === "6") {
                    const table1 = document.createElement("table");
                    table1.style.width = "24%";
                    table1.style.marginRight = "1%";
                    table1.style.float = "left";
                    table1.innerHTML = `
                        <tr>
                            <th style="background-color: #0c4cac; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #0c4cac; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir06" && $kla->kode_jenis_id == "acehpu")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table1);

                    const table2 = document.createElement("table");
                    table2.style.width = "24%";
                    table2.style.marginRight = "1%";
                    table2.style.float = "left";
                    table2.innerHTML = `
                        <tr>
                            <th style="background-color: #3cb649; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #3cb649; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir06" && $kla->kode_jenis_id == "acehpa")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table2);

                    const table3 = document.createElement("table");
                    table3.style.width = "24%";
                    table3.style.marginRight = "1%";
                    table3.style.float = "left";
                    table3.innerHTML = `
                        <tr>
                            <th style="background-color: #fb7648; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #fb7648; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir06" && $kla->kode_jenis_id == "acehpm")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table3);

                    const table4 = document.createElement("table");
                    table4.style.width = "24%";
                    table4.style.float = "left";
                    table4.innerHTML = `
                        <tr>
                            <th style="background-color: #e2fa62; width: 75%; padding: 10px; color: white; font-weight: bold;">Klasifikasi</th>
                            <th style="background-color: #e2fa62; width: 25%; padding: 10px; color: white; font-weight: bold;">Jumlah</th>
                        </tr>
                        @foreach ($klasifikasis as $kla)
                        @if ($kla->kode_direktori_id == "dir06" && $kla->kode_jenis_id == "acehptun")
                        <tr>
                            <td>{{ $kla->nama_klasifikasi }}</td>
                            <td>
                                {{ DB::table('data_pelanggarans')
                                ->join('klasifikasis', 'data_pelanggarans.kode_klasifikasi_id', '=', 'kode_klasifikasi')
                                ->where('klasifikasis.nama_klasifikasi', $kla->nama_klasifikasi)
                                ->count() }}
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    `;
                    informasi.appendChild(table4); 
                }
            }
        });
    </script>

</body>
</html>
