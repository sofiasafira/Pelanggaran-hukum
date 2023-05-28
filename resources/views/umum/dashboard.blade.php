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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
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
                <input type="checkbox" id="tampilkan-pengadilan-checkbox" checked />
                <label class="form-check-label" for="tampilkan-pengadilan-checkbox">Tampilkan Lokasi Pengadilan</label>
            </div>
            <div class="total-pelanggaran">Total Pelanggaran Aceh : {{$total_pelanggaran}}</div>
        </div>       
        <div class="main" style="margin-top: 20px; margin: 20px; padding: 30px; border: 1px solid #ddd; display: flex; flex-direction: column;">
            <div class="judul-drop" style="background-color: #9d8e1e;">Mapping Sebaran Pelanggaran Hukum</div>
            <ul class="bullet-list">
                <li class="bullet-item red"><input type="checkbox" checked> Pengadilan Negeri</li>
                <li class="bullet-item green"><input type="checkbox" checked> Mahkamah Syariah</li>
                <li class="bullet-item blue"><input type="checkbox" checked> Pengadilan Militer</li>
                <li class="bullet-item red"><input type="checkbox" checked> Pengadilan Tata Usaha Negara</li>
            </ul>
            <div id="map" style="height: 500px; border-radius: 5px"></div>
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
        <div class="main" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd; display: flex; flex-direction: column; background-color: white; align-items: center;">
        <div class="judul-grafik" style="flex: 1; margin-top: 8px; margin-bottom: 20px;">Grafik Pelanggaran Kabupaten/Kota Provinsi Aceh</div>
        <div class="tahun-menu" style="margin-bottom: 20px;">
            <label for="tahun">Pilih Tahun: </label>
            <select id="tahun" onchange="updateChart()">
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>
        </div>
        <canvas id="lineChart"></canvas>
    </div>
        <div class="main" style="margin-top: 20px; margin: 20px; padding: 30px; border: 1px solid #ddd; display: flex; flex-direction: column; background-color: white;">
            <div class="judul-drop">Jumlah Pelanggaran Berdasarkan Direktori</div>
            <ul class="bullet-list">
                <li class="bullet-item red">Pengadilan Negeri</li>
                <li class="bullet-item green">Mahkamah Syariah</li>
                <li class="bullet-item blue">Pengadilan Militer</li>
                <li class="bullet-item yellow">Pengadilan Tata Usaha Negara</li>
            </ul>
            <div style="display: inlineblock; vertical-align: top;">
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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"
        integrity="sha512-QE2PMnVCunVgNeqNsmX6XX8mhHW+OnEhUhAWxlZT0o6GFBJfGRCfJ/Ut3HGnVKAxt8cArm7sEqhq2QdSF0R7VQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" refer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets-umum/js/jquery.json.min.js"></script>

    <script>
      var kabupaten = @json($kabupatengrafik);
      var data = {
        kabupaten: kabupaten,
        pidanakhusus: {
          "2022": <?php echo json_encode($kabupaten0122); ?>,
          "2023": <?php echo json_encode($kabupaten0123); ?>
        },
        pidanaumum: {
          "2022": <?php echo json_encode($kabupaten0222); ?>,
          "2023": <?php echo json_encode($kabupaten0223); ?>
        },
        perdata: {
          "2022": <?php echo json_encode($kabupaten0322); ?>,
          "2023": <?php echo json_encode($kabupaten0323); ?>
        },
        perdataagama: {
          "2022": <?php echo json_encode($kabupaten0422); ?>,
          "2023": <?php echo json_encode($kabupaten0423); ?>
        },
        tun: {
          "2022": <?php echo json_encode($kabupaten0522); ?>,
          "2023": <?php echo json_encode($kabupaten0523); ?>
        },
        perdatakhusus: {
          "2022": <?php echo json_encode($kabupaten0622); ?>,
          "2023": <?php echo json_encode($kabupaten0623); ?>
        }
      };

      // Line chart
      const lineChartCanvas = document.getElementById("lineChart").getContext("2d");
      let lineChart;

      function createChart(tahun) {
        if (lineChart) {
          lineChart.destroy();
        }

        lineChart = new Chart(lineChartCanvas, {
          type: "line",
          data: {
            labels: data.kabupaten,
            datasets: [
              {
                label: "Pidana Khusus",
                data: data.pidanakhusus[tahun],
                fill: false,
                borderColor: "rgba(54, 162, 235, 0.6)",
                backgroundColor: "rgba(54, 162, 235, 0.6)"
              },
              {
                label: "Pidana Umum",
                data: data.pidanaumum[tahun],
                fill: false,
                borderColor: "rgba(255, 99, 132, 0.6)",
                backgroundColor: "rgba(255, 99, 132, 0.6)"
              },
              {
                label: "Perdata",
                data: data.perdata[tahun],
                fill: false,
                borderColor: "rgba(75, 192, 192, 0.6)",
                backgroundColor: "rgba(75, 192, 192, 0.6)"
              },
              {
                label: "Perdata Agama",
                data: data.perdataagama[tahun],
                fill: false,
                borderColor: "rgba(255, 206, 86, 0.6)",
                backgroundColor: "rgba(255, 206, 86, 0.6)"
              },
              {
                label: "TUN",
                data: data.tun[tahun],
                fill: false,
                borderColor: "rgba(153, 102, 255, 0.6)",
                backgroundColor: "rgba(153, 102, 255, 0.6)"
              },
              {
                label: "Perdata Khusus",
                data: data.perdatakhusus[tahun],
                fill: false,
                borderColor: 'rgb(290, 90, 235, 0.6)',
                backgroundColor: 'rgba(290, 90, 235, 0.6)',
              }
            ]
          },
          options: {
            responsive: true,
            scales: {
              x: {
                display: true,
                title: {
                  display: true,
                  text: "Kabupaten",
                  font: {
                    weight: 'bold',
                    size: 20
                  }
                }
              },
              y: {
                beginAtZero: true,
                display: true,
                title: {
                  display: true,
                  text: "Total Pelanggaran Direktori",
                  font: {
                    weight: 'bold',
                    size: 20
                  }
                }
              }
            }
          }
        });
      }

      function updateChart() {
        const select = document.getElementById("tahun");
        const tahun = select.value;
        createChart(tahun);
      }

      // Default chart
      createChart("2022");

    </script>
    
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
            center: [ 4.5066293,96.3884842],
            zoom: 8,    
        });

        // var map = L.map('map', {
        //     center: [ 5.5449272,95.3236851],
        //     zoom: 12,    
        // });

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
                                    var total_pelanggaran = {{ $total_pelanggaran }};
                                    if ({{ $jumlah_pelanggaran }} > total_pelanggaran / 2) {
                                        color = "#FF0000";
                                        weight = 2;
                                        opacity = 0.7;
                                    } else if ({{ $jumlah_pelanggaran }} > total_pelanggaran / 4) {
                                        color = "#FFA500";
                                        weight = 1;
                                        opacity = 0.7;
                                    } else if ({{ $jumlah_pelanggaran }} > total_pelanggaran / 100) {
                                        color = "#3DB7E4";
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
                                    layer.bindPopup("<div style='background-color: #bea000; border-radius:2px; padding: 5px;'>Kabupaten {{ $list->nama_kab }} <br> Pidana Khusus: {{ $jumlah_pelanggarandir1 }} <br> Pidana Umum : {{ $jumlah_pelanggarandir2 }}<br> Perdata : {{ $jumlah_pelanggarandir3 }} <br> Perdata Khusus : {{ $jumlah_pelanggarandir4 }} <br> Perdata Agama : {{ $jumlah_pelanggarandir5 }} <br> TUN : {{ $jumlah_pelanggarandir6 }}</div>").openPopup();
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

                // 
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

        // Fungsi untuk menampilkan marker
        function tampilkanMarker() {
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
        }

        // Tampilkan marker saat halaman dimuat
        tampilkanMarker();

        // Tambahkan event listener untuk checkbox
        tampilkanPengadilanCheckbox.addEventListener('change', function() {
        if (this.checked) {
            // Jika checkbox di-check, tampilkan marker
            tampilkanMarker();
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
    <script>
        // let latitude = 0;
        // let longitude = 0;

        // // Inisialisasi layer marker
        // var pengadilanpu = L.layerGroup();
        // var pengadilanpa = L.layerGroup();
        // var pengadilanptun = L.layerGroup();
        // var pengadilanpn = L.layerGroup();
        // var pengadilanfa = L.layerGroup();

        // // Menambahkan fungsi untuk mengupdate marker pada checkbox
        // function updateMarkerVisibility(layer, checkbox) {
        //     if (checkbox.checked) {
        //         map.addLayer(layer);
        //     } else {
        //         map.removeLayer(layer);
        //     }
        // }

        // // Mendapatkan referensi ke checkbox
        // var redCheckbox = document.querySelector('.red input[type="checkbox"]');
        // var greenCheckbox = document.querySelector('.green input[type="checkbox"]');
        // var blueCheckbox = document.querySelector('.blue input[type="checkbox"]');
        // var yellowCheckbox = document.querySelector('.yellow input[type="checkbox"]');

        // // Menambahkan event listener ke setiap checkbox
        // redCheckbox.addEventListener('change', function () {
        // updateMarkerVisibility(pengadilanpu, this);
        // });

        // greenCheckbox.addEventListener('change', function () {
        // updateMarkerVisibility(pengadilanpa, this);
        // });

        // blueCheckbox.addEventListener('change', function () {
        // updateMarkerVisibility(pengadilanptun, this);
        // });

        // yellowCheckbox.addEventListener('change', function () {
        // updateMarkerVisibility(pengadilanpn, this);
        // });

        // // Saat load pertama halaman, aktifkan semua checkbox
        // redCheckbox.checked = true;
        // greenCheckbox.checked = true;
        // blueCheckbox.checked = true;
        // yellowCheckbox.checked = true;

        // // Tampilkan semua titik pada layer saat halaman pertama dimuat
        // pengadilanpu.addTo(map);
        // pengadilanpa.addTo(map);
        // pengadilanptun.addTo(map);
        // pengadilanpn.addTo(map);


        // @foreach($titikdir as $titikpel)
        //     latitude = {!! json_encode($titikpel->latitude) !!};
        //     longitude = {!! json_encode($titikpel->longitude) !!};
        //     kode_direktori_id = {!! json_encode($titikpel->kode_direktori_id) !!};
        //     kode_klasifikasi_id = {!! json_encode($titikpel->kode_klasifikasi_id) !!};
        //     user_id = {!! json_encode($titikpel->user_id) !!};

        //     if (latitude && longitude && String(parseFloat(latitude)) !== 'NaN' && String(parseFloat(longitude)) !== 'NaN') {
        //     let markerColor = 'blue'; // Warna marker default

        //     let kodeDirektoriColorMap = {
        //         'dir01': 'red',
        //         'dir02': 'green',
        //         'dir03': 'yellow',
        //         'dir04': 'orange',
        //         'dir05': 'purple'
        //     };

        //     if (kodeDirektoriColorMap.hasOwnProperty(kode_direktori_id)) {
        //         markerColor = kodeDirektoriColorMap[kode_direktori_id];
        //     }

        //     var marker = L.circle([parseFloat(latitude), parseFloat(longitude)], {
        //         radius: 5, // Ubah radius sesuai dengan ukuran yang diinginkan
        //         fill: true,
        //         color: markerColor, // Menggunakan warna marker berdasarkan kode_direktori_id
        //         fillColor: markerColor,
        //         fillOpacity: 1
        //     });

        //     // Tambahkan marker ke layer yang sesuai berdasarkan checkbox
        //     if (user_id >= 11112 && user_id <= 11131) {
        //         if (redCheckbox.checked) {
        //         pengadilanpu.addLayer(marker);
        //         } else {
        //         pengadilanpu.removeLayer(marker);
        //         }
        //     } else if (user_id >= 11132 && user_id <= 11155) {
        //         if (greenCheckbox.checked) {
        //         pengadilanpa.addLayer(marker);
        //         } else {
        //         pengadilanpa.removeLayer(marker);
        //         }
        //     } else if (user_id == 11156) {
        //         if (blueCheckbox.checked) {
        //         pengadilanptun.addLayer(marker);
        //         } else {
        //         pengadilanptun.removeLayer(marker);
        //         }
        //     } else if (user_id == 11157) {
        //         if (yellowCheckbox.checked) {
        //         pengadilanpn.addLayer(marker);
        //         } else {
        //         pengadilanpn.removeLayer(marker);
        //         }
        //     }
        // }
        // @endforeach
        // Kode untuk membuat legenda
        var legend = L.control({ position: 'bottomleft' });

        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'info legend');
            var labels = [];
            var total_pelanggaran = {{ $total_pelanggaran }};
            var jumlah_pelanggaran = {{ $jumlah_pelanggaran }};
            
            // Menambahkan judul legenda
            div.innerHTML += '<h4 class="legend-title">Warna Kabupaten</h4>';

                labels.push(Math.round(total_pelanggaran / 100) + ' - ' + Math.round(total_pelanggaran / 4));
                labels.push(Math.round(total_pelanggaran / 4) + ' - ' + Math.round(total_pelanggaran / 2));
                labels.push(Math.round(total_pelanggaran / 2) + ' - ' + Math.round(total_pelanggaran));
            
            
            for (var i = 0; i < labels.length; i++) {
            var labelColor;

            // Tentukan warna sesuai dengan label
            if (labels[i] === Math.round(total_pelanggaran / 2) + ' - ' + Math.round(total_pelanggaran)) {
                labelColor = 'rgba(255, 0, 0, 0.7)'; // Warna untuk Label (total_pelanggaran / 2) - total_pelanggaran
            } else if (labels[i] === Math.round(total_pelanggaran / 4) + ' - ' + Math.round(total_pelanggaran / 2)) {
                labelColor = 'rgba(255, 165, 0, 0.7)'; // Warna untuk Label (total_pelanggaran / 4) - (total_pelanggaran / 2)
            } else {
                // Warna default untuk label lainnya
                labelColor = 'rgba(61, 183, 228, 0.7)'; // Warna hitam
            }


            div.innerHTML +=
                '<i style="background:' + labelColor + '"></i> ' +
                labels[i] + (labels[i + 1] ? '<br>' : '');
        }

            return div;
        };

        legend.addTo(map);

        // Mengubah style CSS untuk background legenda menjadi putih
        var legendStyle = document.getElementsByClassName('info legend')[0].style;
        legendStyle.backgroundColor = "#FFFFFF";
        legendStyle.padding = "10px";
        legendStyle.borderRadius = "8px";

        // Mengubah style CSS untuk judul legenda agar berada di tengah
        var titleStyle = document.getElementsByClassName('legend-title')[0].style;
        titleStyle.textAlign = "center";

        
        // Tambahkan dropdown menu untuk legend
        var legendControl = L.control({ position: 'topright' });
        var selectedKodeDirektori = '';
        legendControl.onAdd = function (map) {
        var container = L.DomUtil.create('div', 'legend-container');

        var select = L.DomUtil.create('select', 'form-control', container);
        var options = [
            { value: '', label: 'LEGEND WARNA DIREKTORI KASUS'},
            { value: 'option1', label: 'Pidana Khusus/Militer', kodeDirektori: 'dir01' },
            { value: 'option2', label: 'Pidana Umum', kodeDirektori: 'dir02' },
            { value: 'option3', label: 'Perdata', kodeDirektori: 'dir03' },
            { value: 'option4', label: 'Perdata Agama', kodeDirektori: 'dir04' },
            { value: 'option5', label: 'TUN', kodeDirektori: 'dir05' },
            { value: 'option6', label: 'Perdata Khusus', kodeDirektori: 'dir06' }
        ];
        select.addEventListener('change', function () {
            selectedKodeDirektori = this.value;
            var selectedOption = this.value;
            var kodeDirektori = options.find(function (option) {
            return option.value === selectedOption;
            }).kodeDirektori;
            var legendText = getKlasifikasiByKodeDirektori(kodeDirektori).join('\n');
            updateLegend(legendText);
            selectedKodeDirektori = this.value;
            filterMarkers();
        });

        for (var i = 0; i < options.length; i++) {
            var option = options[i];
            var optionElement = L.DomUtil.create('option', '', select);
            optionElement.value = option.value;
            optionElement.text = option.label;
        }

        var legend = L.DomUtil.create('div', 'legend', container);
            legend.style.maxWidth = '200px';
            legend.style.fontSize = '8px';
            legend.style.lineHeight = '1.4';
            legend.style.backgroundColor = 'white';
            legend.textContent = '';

        L.DomEvent.disableClickPropagation(container);
        return container;
        };


        legendControl.addTo(map);
        var dir = JSON.parse('{!! $dirJson !!}');
        // Function to retrieve klasifikasi based on kodeDirektori
        function getKlasifikasiByKodeDirektori(kodeDirektori) {
            var result = [];
            for (var i = 0; i < dir.length; i++) {
                if (dir[i].kode_direktori_id === kodeDirektori) {
                    result.push(dir[i].nama_klasifikasi);
                }
            }
            return result;
        }

        // Fungsi untuk memfilter marker berdasarkan direktori kasus yang dipilih
        // Fungsi untuk memfilter marker berdasarkan direktori kasus yang dipilih
        // function filterMarkers() {

        // let latitude = 0;
        // let longitude = 0;

        // // Inisialisasi layer marker
        // var layer_dir01 = L.layerGroup(); 
        // var layer_dir02 = L.layerGroup();
        // var layer_dir03 = L.layerGroup();
        // var layer_dir04 = L.layerGroup(); 
        // var layer_dir05 = L.layerGroup();
        // var layer_dir06 = L.layerGroup();

        // // Tampilkan semua titik pada layer saat halaman pertama dimuat
        // layer_dir01.addTo(map);
        // layer_dir02.addTo(map);
        // layer_dir03.addTo(map);
        // layer_dir04.addTo(map);
        // layer_dir05.addTo(map);
        // layer_dir06.addTo(map);


        // @foreach($titikdir as $titikpel)
        //     latitude = {!! json_encode($titikpel->latitude) !!};
        //     longitude = {!! json_encode($titikpel->longitude) !!};
        //     kode_direktori_id = {!! json_encode($titikpel->kode_direktori_id) !!};
        //     kode_klasifikasi_id = {!! json_encode($titikpel->kode_klasifikasi_id) !!};
        //     user_id = {!! json_encode($titikpel->user_id) !!};

        //     if (latitude && longitude && String(parseFloat(latitude)) !== 'NaN' && String(parseFloat(longitude)) !== 'NaN') {
        //         let markerColor = 'blue'; // Warna marker default

        //         let kodeKlasifikasiColorMap = {
        //                         'anak': 'rgba(229, 82, 42, 1)',
        //                         'disersi': 'rgba(229, 82, 42, 0.9230769230769231)',
        //                         'logging': 'rgba(255, 0, 0, 0.9166666666666666)',
        //                         'ite': 'rgba(229, 82, 42, 0.8461538461538461)',
        //                         'kdrt': 'rgba(229, 82, 42, 0.7692307692307692)',
        //                         'kpbnan': 'rgba(229, 82, 42, 0.6923076923076923)',
        //                         'ksusilaan': 'rgba(229, 82, 42, 0.5384615384615384)',
        //                         'kropsi': 'rgba(229, 82, 42, 0.6153846153846154)',
        //                         'lainlaina': 'rgba(128, 0, 0, 0.33333333333333337)',
        //                         'linhdp': 'rgba(229, 82, 42, 0.3846153846153846)',
        //                         'likhip': 'rgba(229, 82, 42, 0.46153846153846156)',
        //                         'mtauag':'rgba(255, 0, 0, 0.8333333333333334)',
        //                         'narkot': 'rgba(255, 0, 0, 0.75)',
        //                         'playrn': 'rgba(255, 0, 0, 0.5)',
        //                         'pncuag': 'rgba(255, 0, 0, 0.41666666666666663)',
        //                         'perabh': 'rgba(255, 0, 0, 0.6666666666666667)',
        //                         'prbnkn': 'rgba(255, 0, 0, 0.33333333333333337)',
        //                         'perorg': 'rgba(255, 0, 0, 0.5833333333333333)',
        //                         'prmhnn': 'rgba(128, 0, 0, 0.9166666666666666)',
        //                         'prpjkn': 'rgba(128, 0, 0, 0.75)',
        //                         'prtmbgn': 'rgba(128, 0, 0, 0.6666666666666667)',
        //                         'prngrfi': 'rgba(128, 0, 0, 0.8333333333333334)',
        //                         'snjtapi': 'rgba(128, 0, 0, 0.5)',
        //                         'sbordisi': 'rgba(128, 0, 0, 0.5833333333333333)',
        //                         'uagpls': 'rgba(128, 0, 0, 0.41666666666666663)',
        //                         'jnyat': 'rgba(0, 0, 205, 1)',
        //                         'kekmluka': 'rgba(0, 0, 205, 0.6153846153846154)',
        //                         'khtnn': 'rgba(0, 0, 205, 0.3846153846153846)',
        //                         'kejterauper': 'rgba(0, 0, 205, 0.9230769230769231)',
        //                         'ketekem': 'rgba(0, 0, 205, 0.5384615384615384)',
        //                         'keternegra': 'rgba(0, 0, 205, 0.46153846153846156)',
        //                         'kejtermer': 'rgba(0, 0, 205, 0.7692307692307692)',
        //                         'keterorg': 'rgba(0, 0, 205, 0.7692307692307692)',
        //                         'kejterkes': 'rgba(0, 0, 205, 0.8461538461538461)',
        //                         'kejterum': 'rgba(0, 0, 205, 0.6923076923076923)',
        //                         'lalulin': 'rgba(0, 50, 100, 0.9166666666666666)',
        //                         'pmlsuan': 'rgba(0, 50, 100, 0.5833333333333333)',
        //                         'pmbnhn': 'rgba(0, 50, 100, 0.6666666666666667)',
        //                         'pmrsn': 'rgba(0, 50, 100, 0.5833333333333333)',
        //                         'pncurian':'rgba(0, 50, 100, 0.41666666666666663)',
        //                         'pngniayaan': '(PM) rgba(0, 0, 0, 0.8333333333333334)',
        //                         'pngnyaan': 'rgba(0, 0, 0, 0.9166666666666666)',
        //                         'pggelapan': 'rgba(0, 50, 100, 0.75)',
        //                         'pnghnaan': 'rgba(0, 50, 100, 0.25)',
        //                         'pnghinaan': 'rgba(0, 50, 100, 0.33333333333333337)',
        //                         'prjdian': '(0, 0, 0, 0.6666666666666667)',
        //                         'prskan': '(0, 0, 0, 0.5833333333333333)',
        //                         'sphplsu': 'rgba(0, 0, 0, 0.5)',
        //                         'lainlainc': 'rgba(25, 145, 112, 0.8333333333333334)',
        //                         'pmbgianhrta': 'rgba(60, 240, 113, 0.8333333333333334)',
        //                         'permelhukum': 'rgba(60, 240, 113, 1)',
        //                         'prjnjian': 'rgba(60, 240, 113, 0.6666666666666667)',
        //                         'prmohnn': 'rgba(107, 184, 35, 0.9166666666666666)',
        //                         'tanah': 'rgba(107, 184, 35, 0.8333333333333334)',
        //                         'wnprestasi':'rgba(25, 145, 112, 0.9166666666666666)',
        //                         'waris': 'rgba(107, 184, 35, 0.75)',
        //                         'hibah':'rgba(210, 50, 173, 1)',
        //                         'hrtabrsm':'rgba(210, 50, 173, 0.9230769230769231)',
        //                         'iznpolgmi':'rgba(210, 50, 173, 0.8461538461538461)',
        //                         'pgshnnkah':'rgba(210, 50, 173, 0.7692307692307692)',
        //                         'pmbtlnnkh':'rgba(210, 50, 173, 0.6923076923076923)',
        //                         'prcraian':'rgba(210, 50, 173, 0.6153846153846154)',
        //                         'prcraianb':'rgba(210, 50, 173, 0.5384615384615384)',
        //                         'prwalian':'rgba(210, 50, 173, 0.46153846153846156)',
        //                         'wakaf':'rgba(210, 50, 173, 0.3846153846153846)',
        //                         'warisislm':'rgba(112, 8, 144, 0.9166666666666666)',
        //                         'wasiat':'rgba(112, 8, 144, 0.8333333333333334)',
        //                         'kip':'rgba(255, 253, 0, 1)',
        //                         'kip2':'rgba(255, 253, 0, 0.8333333333333334)',
        //                         'kpgwaian':'rgba(255, 253, 0, 0.6666666666666667)',
        //                         'lainlaine':'rgba(200, 200, 90, 0.7)',
        //                         'lelang':'rgba(255, 253, 0, 0.5)',
        //                         'pajak':'rgba(255, 165, 0, 0.9)',
        //                         'perijinan':'rgba(255, 165, 0, 0.8)',
        //                         'prmhnn1':'rgba(255, 165, 0, 0.7)',
        //                         'prtaipol':'rgba(255, 165, 0, 0.6)',
        //                         'prtnahan':'rgba(200, 200, 90, 0.9)',
        //                         'tender':'rgba(200, 200, 90, 0.8)',
        //                         'parpol':'rgba(85, 86, 47, 1)',
        //                         'phi':'rgba(85, 86, 47, 0.8333333333333334)'
        //         };


        //         if (kodeKlasifikasiColorMap.hasOwnProperty(kode_klasifikasi_id)) {
        //             markerColor = kodeKlasifikasiColorMap[kode_klasifikasi_id];
        //         }

        //         var marker = L.circle([parseFloat(latitude), parseFloat(longitude)], {
        //             radius: 5, // Ubah radius sesuai dengan ukuran yang diinginkan
        //             fill: true,
        //             color: markerColor, // Menggunakan warna marker berdasarkan kode_direktori_id
        //             fillColor: markerColor,
        //             fillOpacity: 1
        //         });

        //         // Tambahkan marker ke layer yang sesuai berdasarkan checkbox
        //         if (kode_direktori_id === 'dir01') {
        //             if (selectedKodeDirektori === 'option1') {
        //                 map.removeLayer(marker); // Hapus marker sebelum menambahkannya ke layer
        //                 layer_dir01.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //             }
        //         } else if (kode_direktori_id === 'dir02') {
        //             if (selectedKodeDirektori === 'option2') {
        //                 map.removeLayer(marker); // Hapus marker sebelum menambahkannya ke layer
        //                 layer_dir02.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //             }
        //         } else if (kode_direktori_id === 'dir03') {
        //             if (selectedKodeDirektori === 'option3') {
        //                 map.removeLayer(marker);
        //                 layer_dir03.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //                 layer_dir03.removeLayer(marker);
        //             }
        //         } else if (kode_direktori_id === 'dir04') {
        //             if (selectedKodeDirektori === 'option4') {
        //                 map.removeLayer(marker);
        //                 layer_dir04.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //                 layer_dir04.removeLayer(marker);
        //             }
        //         } else if (kode_direktori_id === 'dir05') {
        //             if (selectedKodeDirektori === 'option5') {
        //                 map.removeLayer(marker);
        //                 layer_dir05.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //                 layer_dir05.removeLayer(marker);
        //             }
        //         } else {
        //             if (selectedKodeDirektori === 'option6') {
        //                 map.removeLayer(marker);
        //                 layer_dir06.addLayer(marker);
        //             } else {
        //                 map.removeLayer(marker);
        //                 layer_dir06.removeLayer(marker);
        //             }
        //         }

        //     }
        // @endforeach

        // }
        // // Panggil fungsi filterMarkers saat halaman pertama dimuat
        // filterMarkers();

        // Panggil fungsi filterMarkers saat halaman pertama dimuat

        // let lastMarker;

        // filterMarkers();

        // Fungsi untuk memfilter marker berdasarkan direktori kasus yang dipilih
        function filterMarkers() {

        let latitude = 0;
        let longitude = 0;

        // Inisialisasi layer marker
        var pengadilanpu = L.layerGroup();
        var pengadilanpa = L.layerGroup();
        var pengadilanptun = L.layerGroup();
        var pengadilanpn = L.layerGroup();
        var pengadilanfa = L.layerGroup();

        // Menambahkan fungsi untuk mengupdate marker pada checkbox
        function updateMarkerVisibility(layer, checkbox) {
            if (checkbox.checked) {
                map.addLayer(layer);
            } else {
                map.removeLayer(layer);
            }
        }

        // Mendapatkan referensi ke checkbox
        var redCheckbox = document.querySelector('.red input[type="checkbox"]');
        var greenCheckbox = document.querySelector('.green input[type="checkbox"]');
        var blueCheckbox = document.querySelector('.blue input[type="checkbox"]');
        var yellowCheckbox = document.querySelector('.yellow input[type="checkbox"]');

        // Menambahkan event listener ke setiap checkbox
        redCheckbox.addEventListener('change', function () {
        updateMarkerVisibility(pengadilanpu, this);
        });

        greenCheckbox.addEventListener('change', function () {
        updateMarkerVisibility(pengadilanpa, this);
        });

        blueCheckbox.addEventListener('change', function () {
        updateMarkerVisibility(pengadilanptun, this);
        });

        yellowCheckbox.addEventListener('change', function () {
        updateMarkerVisibility(pengadilanpn, this);
        });

        // Saat load pertama halaman, aktifkan semua checkbox
        redCheckbox.checked = true;
        greenCheckbox.checked = true;
        blueCheckbox.checked = true;
        yellowCheckbox.checked = true;

        // Tampilkan semua titik pada layer saat halaman pertama dimuat
        pengadilanpu.addTo(map);
        pengadilanpa.addTo(map);
        pengadilanptun.addTo(map);
        pengadilanpn.addTo(map);

        @foreach($titikdir as $titikpel)
            latitude = {!! json_encode($titikpel->latitude) !!};
            longitude = {!! json_encode($titikpel->longitude) !!};
            kode_direktori_id = {!! json_encode($titikpel->kode_direktori_id) !!};
            kode_klasifikasi_id = {!! json_encode($titikpel->kode_klasifikasi_id) !!};
            user_id = {!! json_encode($titikpel->user_id) !!};

            if (latitude && longitude && String(parseFloat(latitude)) !== 'NaN' && String(parseFloat(longitude)) !== 'NaN') {
                let markerColor = 'blue'; // Warna marker default

                let kodeKlasifikasiColorMap = {
                    'anak': 'rgba(229, 82, 42, 1)',
                    'disersi': 'rgba(229, 82, 42, 0.9230769230769231)',
                    'logging': 'rgba(255, 0, 0, 0.9166666666666666)',
                    'ite': 'rgba(229, 82, 42, 0.8461538461538461)',
                    'kdrt': 'rgba(229, 82, 42, 0.7692307692307692)',
                    'kpbnan': 'rgba(229, 82, 42, 0.6923076923076923)',
                    'ksusilaan': 'rgba(229, 82, 42, 0.5384615384615384)',
                    'kropsi': 'rgba(229, 82, 42, 0.6153846153846154)',
                    'lainlaina': 'rgba(128, 0, 0, 0.33333333333333337)',
                    'linhdp': 'rgba(229, 82, 42, 0.3846153846153846)',
                    'likhip': 'rgba(229, 82, 42, 0.46153846153846156)',
                    'mtauag':'rgba(255, 0, 0, 0.8333333333333334)',
                    'narkot': 'rgba(255, 0, 0, 0.75)',
                    'playrn': 'rgba(255, 0, 0, 0.5)',
                    'pncuag': 'rgba(255, 0, 0, 0.41666666666666663)',
                    'perabh': 'rgba(255, 0, 0, 0.6666666666666667)',
                    'prbnkn': 'rgba(255, 0, 0, 0.33333333333333337)',
                    'perorg': 'rgba(255, 0, 0, 0.5833333333333333)',
                    'prmhnn': 'rgba(128, 0, 0, 0.9166666666666666)',
                    'prpjkn': 'rgba(128, 0, 0, 0.75)',
                    'prtmbgn': 'rgba(128, 0, 0, 0.6666666666666667)',
                    'prngrfi': 'rgba(128, 0, 0, 0.8333333333333334)',
                    'snjtapi': 'rgba(128, 0, 0, 0.5)',
                    'sbordisi': 'rgba(128, 0, 0, 0.5833333333333333)',
                    'uagpls': 'rgba(128, 0, 0, 0.41666666666666663)',
                    'jnyat': 'rgba(0, 0, 205, 1)',
                    'kekmluka': 'rgba(0, 0, 205, 0.6153846153846154)',
                    'khtnn': 'rgba(0, 0, 205, 0.3846153846153846)',
                    'kejterauper': 'rgba(0, 0, 205, 0.9230769230769231)',
                    'ketekem': 'rgba(0, 0, 205, 0.5384615384615384)',
                    'keternegra': 'rgba(0, 0, 205, 0.46153846153846156)',
                    'kejtermer': 'rgba(0, 0, 205, 0.7692307692307692)',
                    'keterorg': 'rgba(0, 0, 205, 0.7692307692307692)',
                    'kejterkes': 'rgba(0, 0, 205, 0.8461538461538461)',
                    'kejterum': 'rgba(0, 0, 205, 0.6923076923076923)',
                    'lalulin': 'rgba(0, 50, 100, 0.9166666666666666)',
                    'pmlsuan': 'rgba(0, 50, 100, 0.5833333333333333)',
                    'pmbnhn': 'rgba(0, 50, 100, 0.6666666666666667)',
                    'pmrsn': 'rgba(0, 50, 100, 0.5833333333333333)',
                    'pncurian':'rgba(0, 50, 100, 0.41666666666666663)',
                    'pngniayaan': '(PM) rgba(0, 0, 0, 0.8333333333333334)',
                    'pngnyaan': 'rgba(0, 0, 0, 0.9166666666666666)',
                    'pggelapan': 'rgba(0, 50, 100, 0.75)',
                    'pnghnaan': 'rgba(0, 50, 100, 0.25)',
                    'pnghinaan': 'rgba(0, 50, 100, 0.33333333333333337)',
                    'prjdian': '(0, 0, 0, 0.6666666666666667)',
                    'prskan': '(0, 0, 0, 0.5833333333333333)',
                    'sphplsu': 'rgba(0, 0, 0, 0.5)',
                    'lainlainc': 'rgba(25, 145, 112, 0.8333333333333334)',
                    'pmbgianhrta': 'rgba(60, 240, 113, 0.8333333333333334)',
                    'permelhukum': 'rgba(60, 240, 113, 1)',
                    'prjnjian': 'rgba(60, 240, 113, 0.6666666666666667)',
                    'prmohnn': 'rgba(107, 184, 35, 0.9166666666666666)',
                    'tanah': 'rgba(107, 184, 35, 0.8333333333333334)',
                    'wnprestasi':'rgba(25, 145, 112, 0.9166666666666666)',
                    'waris': 'rgba(107, 184, 35, 0.75)',
                    'hibah':'rgba(210, 50, 173, 1)',
                    'hrtabrsm':'rgba(210, 50, 173, 0.9230769230769231)',
                    'iznpolgmi':'rgba(210, 50, 173, 0.8461538461538461)',
                    'pgshnnkah':'rgba(210, 50, 173, 0.7692307692307692)',
                    'pmbtlnnkh':'rgba(210, 50, 173, 0.6923076923076923)',
                    'prcraian':'rgba(210, 50, 173, 0.6153846153846154)',
                    'prcraianb':'rgba(210, 50, 173, 0.5384615384615384)',
                    'prwalian':'rgba(210, 50, 173, 0.46153846153846156)',
                    'wakaf':'rgba(210, 50, 173, 0.3846153846153846)',
                    'warisislm':'rgba(112, 8, 144, 0.9166666666666666)',
                    'wasiat':'rgba(112, 8, 144, 0.8333333333333334)',
                    'kip':'rgba(255, 253, 0, 1)',
                    'kip2':'rgba(255, 253, 0, 0.8333333333333334)',
                    'kpgwaian':'rgba(255, 253, 0, 0.6666666666666667)',
                    'lainlaine':'rgba(200, 200, 90, 0.7)',
                    'lelang':'rgba(255, 253, 0, 0.5)',
                    'pajak':'rgba(255, 165, 0, 0.9)',
                    'perijinan':'rgba(255, 165, 0, 0.8)',
                    'prmhnn1':'rgba(255, 165, 0, 0.7)',
                    'prtaipol':'rgba(255, 165, 0, 0.6)',
                    'prtnahan':'rgba(200, 200, 90, 0.9)',
                    'tender':'rgba(200, 200, 90, 0.8)',
                    'parpol':'rgba(85, 86, 47, 1)',
                    'phi':'rgba(85, 86, 47, 0.8333333333333334)'
                };

                if (kodeKlasifikasiColorMap.hasOwnProperty(kode_klasifikasi_id)) {
                    markerColor = kodeKlasifikasiColorMap[kode_klasifikasi_id];
                }

                var marker = L.circle([parseFloat(latitude), parseFloat(longitude)], {
                    radius: 5, // Ubah radius sesuai dengan ukuran yang diinginkan
                    fill: true,
                    color: markerColor, // Menggunakan warna marker berdasarkan kode_direktori_id
                    fillColor: markerColor,
                    fillOpacity: 1
                });

                // Tambahkan marker ke layer yang sesuai berdasarkan checkbox
                if (user_id >= 11112 && user_id <= 11131) {
                    if (redCheckbox.checked) {
                        pengadilanpu.addLayer(marker);
                    } else {
                        pengadilanpu.removeLayer(marker);
                    }
                } else if (user_id >= 11132 && user_id <= 11155) {
                    if (greenCheckbox.checked) {
                        pengadilanpa.addLayer(marker);
                    } else {
                        pengadilanpa.removeLayer(marker);
                    }
                } else if (user_id == 11157) {
                    if (blueCheckbox.checked) {
                        pengadilanptun.addLayer(marker);
                    } else {
                        pengadilanptun.removeLayer(marker);
                    }
                } else if (user_id == 11156) {
                    if (yellowCheckbox.checked) {
                        pengadilanpn.addLayer(marker);
                    } else {
                        pengadilanpn.removeLayer(marker);
                    }
                }
            }
        @endforeach
        }
        // Panggil fungsi filterMarkers saat halaman pertama dimuat
        filterMarkers();




        // Function to update legend text
        function updateLegend(legendText) {
            var legend = document.querySelector('.legend');
            legend.innerHTML = '';

            var klasifikasiArray = legendText.split('\n');
            var lainArray = [];
            var lainBawahArray = [];

            // Pisahkan klasifikasi menjadi dua array berdasarkan huruf depannya
            for (var i = 0; i < klasifikasiArray.length; i++) {
                var klasifikasi = klasifikasiArray[i];
                if (klasifikasi.startsWith('Lain')) {
                    lainBawahArray.push(klasifikasi);
                } else {
                    lainArray.push(klasifikasi);
                }
            }

            // Gabungkan kembali array dengan klasifikasi lainnya di atas klasifikasi dengan huruf depan "Lain"
            var klasifikasiTerurut = lainArray.concat(lainBawahArray);

            // Iterasi melalui array klasifikasi terurut dan buat elemen legendItem untuk setiap klasifikasi
            for (var i = 0; i < klasifikasiTerurut.length; i++) {
                var klasifikasi = klasifikasiTerurut[i];
                var legendItem = document.createElement('div');
                legendItem.style.display = 'flex';
                legendItem.style.alignItems = 'center';

                // Add colored bullet
                var bullet = document.createElement('div');
                bullet.style.width = '10px';
                bullet.style.height = '10px';
                bullet.style.borderRadius = '50%';
                bullet.style.marginRight = '5px';
                bullet.style.backgroundColor = getColorByKodeDirektori(klasifikasi, i);
                legendItem.appendChild(bullet);

                // Add text
                var text = document.createElement('div');
                text.textContent = klasifikasi;
                legendItem.appendChild(text);

                legend.appendChild(legendItem);
            }

        }

        function getColorByKodeDirektori(klasifikasi, index) {
            var kodeDirektori = dir.find(function (item) {
                return item.kode_direktori_id === klasifikasi;
            });
            console.log(selectedKodeDirektori); // Mencetak kodeDirektori ke konsol

            // Logic to determine color based on kodeDirektori
            if (selectedKodeDirektori === 'option1') {
                console.log('Selected kodeDirektori: option1'); // Mencetak pilihan yang dipilih ke konsol            
                var opacity;
                if (index >= 17) {
                    opacity = 1 - ((index - 16) / 12);
                    var color = 'rgba(128, 0, 0, ' + opacity + ')';
                } else if (index >= 9) {
                    opacity = 1 - ((index - 8) / 12);
                    var color = 'rgba(255, 0, 0, ' + opacity + ')';
                } else {
                    opacity = 1 - (index / 13);
                    var color = 'rgba(229, 82, 42, ' + opacity + ')';
                }               
                console.log('Color:', color); // Mencetak warna yang dihasilkan ke konsol
                return color;
            } else if (selectedKodeDirektori === 'option2') {
                console.log('Selected kodeDirektori: option2'); // Mencetak pilihan yang dipilih ke konsol            
                var opacity;
                if (index >= 18) {
                    opacity = 1 - ((index - 17) / 12);
                    var color = 'rgba(8, 128, 0, ' + opacity + ')';
                } else if (index >= 9) {
                    opacity = 1 - ((index - 8) / 12);
                    var color = 'rgba(0, 50, 100, ' + opacity + ')';
                } else {
                    opacity = 1 - (index / 13);
                    var color = 'rgba(0, 0, 205, ' + opacity + ')';
                }               
                console.log('Color:', color); // Mencetak warna yang dihasilkan ke konsol
                return color;
            } else if (selectedKodeDirektori === 'option3') {
                console.log('Selected kodeDirektori: option3'); // Mencetak pilihan yang dipilih ke konsol            
                var opacity;
                if (index >= 6) {
                    opacity = 1 - ((index - 5) / 12);
                    var color = 'rgba(25, 145, 112, ' + opacity + ')';
                } else if (index >= 3) {
                    opacity = 1 - ((index - 2) / 12);
                    var color = 'rgba(107, 184, 35, ' + opacity + ')';
                } else {
                    opacity = 1 - (index / 6);
                    var color = 'rgba(60, 240, 113, ' + opacity + ')';
                }               
                console.log('Color:', color); // Mencetak warna yang dihasilkan ke konsol
                return color;
            } else if (selectedKodeDirektori === 'option4') {
                console.log('Selected kodeDirektori: option4'); // Mencetak pilihan yang dipilih ke konsol            
                var opacity;
                if (index >= 18) {
                    opacity = 1 - ((index - 17) / 12);
                    var color = 'rgba(255, 0, 0, ' + opacity + ')';
                } else if (index >= 9) {
                    opacity = 1 - ((index - 8) / 12);
                    var color = 'rgba(112, 8, 144, ' + opacity + ')';
                } else {
                    opacity = 1 - (index / 13);
                    var color = 'rgba(210, 50, 173, ' + opacity + ')';
                }               
                console.log('Color:', color); // Mencetak warna yang dihasilkan ke konsol
                return color;
            } else if (selectedKodeDirektori === 'option5') {
                console.log('Selected kodeDirektori: option5'); // Mencetak pilihan yang dipilih ke konsol            
                var opacity;
                if (index >= 8) {
                    opacity = 1 - ((index - 7) / 10);
                    var color = 'rgba(200, 200, 90, ' + opacity + ')';
                } else if (index >= 4) {
                    opacity = 1 - ((index - 3) / 10);
                    var color = 'rgba(255, 165, 0, ' + opacity + ')';
                } else {
                    opacity = 1 - (index / 6);
                    var color = 'rgba(255, 253, 0, ' + opacity + ')';
                }               
                console.log('Color:', color); // Mencetak warna yang dihasilkan ke konsol
                return color;
            } else {
                console.log('Selected kodeDirektori: Unknown'); // Mencetak jika pilihan tidak dikenali ke konsol
                opacity = 1 - (index / 6);
                var color = 'rgba(85, 86, 47, ' + opacity + ')';
                console.log('Color:', color);
                return color;
            }
        }    
    </script>
</body>
</html>
