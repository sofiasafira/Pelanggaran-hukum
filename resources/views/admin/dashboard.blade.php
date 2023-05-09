@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">
        <div class="main" style="margin-top: 20px; margin: 20px; width: fit-content; display: flex; flex-direction: row; align-items: center; ">
          <div class="dropdown" style="width: 200px; border-radius: 5px; overflow: hidden;">
            <select id="dropdown1" style="width: 100%; background-color: #9d8e1e; border: none; padding: 8px;">
              <option value="" disabled selected>Pilih Tahun</option>
              <option value="2023">2023</option>
              <option value="2022">2022</option>
              <option value="2021">2021</option>
            </select>
          </div>
          <div style="display: inline-block; vertical-align: top; margin-left: 805px;">
            <a href="{{ route('admin.index') }}" class="button">Lihat Tabel data</a>
          </div>
        </div>
        <div class="main" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd; display: flex; flex-direction: column; background-color: white; align-items: center;">
          <div class="judul-grafik" style="flex: 1; margin-top: 8px; margin-bottom: 20px;"> Bar Chart dan Line Chart Direktori Pelanggaran Hukum {{ auth()->user()->nama_pengadilan }}</div>           
          <div class="chart-wrapper" style="display: flex; flex-direction: row; width: 100%;">
            <div class="chart-container" style="width: 50%; margin-right: 15px;">
              <canvas id="bar-chart-1"></canvas>
            </div>
            <div class="chart-container" style="width: 50%; margin-left: 15px;">
              <canvas id="line-chart-1"></canvas>
            </div>
          </div>
        </div>
  </div> 
  <script>
        const navbarProfile = document.querySelector(".navbar-profile");
        const navbarDropdown = document.querySelector(".navbar-dropdown");
        navbarProfile.addEventListener("mouseenter", function() {
        navbarDropdown.style.display = "block";
        }); 
        navbarProfile.addEventListener("mouseleave", function() {
        navbarDropdown.style.display = "none";
        });
    </script>

    <!-- Link Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link Core theme JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"
        integrity="sha512-QE2PMnVCunVgNeqNsmX6XX8mhHW+OnEhUhAWxlZT0o6GFBJfGRCfJ/Ut3HGnVKAxt8cArm7sEqhq2QdSF0R7VQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" refer></script>
    
    <!-- Diagram Batang -->
    <script>
        var ctx1 = document.getElementById('bar-chart-1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
            labels: ['Pidana Khusus/militer','Pidana Umum', 'Perdata', 'Perdata Khusus', 'Perdata Agama', 'TUN'],
            datasets: [{
                label: 'Jumlah',
                data: <?php echo json_encode($pelanggarandir); ?>,
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(290, 90, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(290, 90, 235, 1)',
                'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 2
            }]},
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
                data = <?php echo json_encode($dir23); ?>
            } else if (year == '2022') {
                data = <?php echo json_encode($dir22); ?>
            } else {
                data = <?php echo json_encode($dir21); ?>; // return default data if year is not valid
            }
            return data;
        }
    </script>

    <script>
        // get canvas element
        var lineChartCanvas = document.getElementById('line-chart-1').getContext('2d');

        // define chart data
        var lineChartData = {
        labels: ['Jan-Feb', 'Mar-Apr', 'Mei-Jun', 'Jul-Agus', 'Sep-Okt', 'Nov-Des'],
        datasets: [
            {
            label: 'Pidana Khusus/militer',
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            data: <?php echo json_encode($dir1); ?>,
            },
            {
            label: 'Pidana Umum',
            borderColor: 'rgb(255, 206, 86)',
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            data: <?php echo json_encode($dir2); ?>,
            },
            {
            label: 'Perdata',
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            data: <?php echo json_encode($dir3); ?>,
            },
            {
            label: 'Perdata Khusus',
            borderColor: 'rgb(153, 102, 255)',
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            data: <?php echo json_encode($dir6); ?>,
            },
            {
            label: 'Perdata Agama',
            borderColor: 'rgb(290, 90, 235)',
            backgroundColor: 'rgba(290, 90, 235, 0.2)',
            data: <?php echo json_encode($dir4); ?>,
            },
            {
            label: 'TUN',
            borderColor: 'rgb(54, 162, 235)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            data: <?php echo json_encode($dir5); ?>,
            }
        ]
        };

        // define chart options
        var lineChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        title: {
            display: true,
            text: 'Line Chart Example'
        },
        scales: {
            yAxes: [{
            ticks: {
                beginAtZero: true
            }
            }]
        }
        };

        // create line chart
        var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
        });

        // add event listener for select dropdown
        document.getElementById('dropdown1').addEventListener('change', function() {
        var selectedYear = this.value;
        if (selectedYear === '2023') {
            lineChartData.datasets[0].data = [];
            lineChartData.datasets[1].data = [];
            lineChartData.datasets[2].data = [];
            lineChartData.datasets[3].data = [];
            lineChartData.datasets[4].data = [];
            lineChartData.datasets[5].data = [];
        }
        else if (selectedYear === '2022') {
            lineChartData.datasets[0].data = [];
            lineChartData.datasets[1].data = [];
            lineChartData.datasets[2].data = [];
            lineChartData.datasets[3].data = [];
            lineChartData.datasets[4].data = [];
            lineChartData.datasets[5].data = [];
        } else {
            lineChartData.datasets[0].data = [];
            lineChartData.datasets[1].data = [];
            lineChartData.datasets[2].data = [];
            lineChartData.datasets[3].data = [];
            lineChartData.datasets[4].data = [];
            lineChartData.datasets[5].data = [];
        }
        lineChart.update();
        });
    </script>

@endsection