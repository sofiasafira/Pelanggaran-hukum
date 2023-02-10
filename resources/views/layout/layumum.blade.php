<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PelHum | {{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="assets-admin/image/simbol.png" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Link Font dan icon Font -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
   
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        
        <!-- Link CSS-->
        <link rel="stylesheet" href="{{asset('assets-layout/css/style.min.css')}}">
 
        <!-- Include Leaflet CSS file in the head section -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin=""/>

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="crossorigin=""></script>

        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha512-Dqm3h1Y4qiHUjbhxTuBGQsza0Tfppn53SHlu/uj1f+RT+xfShfe7r6czRf5r2NmllO2aKx+tYJgoxboOkn1Scg==" crossorigin=""></script>
        <style> 
            #map { height: 550px; }
        </style>
    </head>
    
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #198754" id="mainNav">
            <div class="collapse navbar-collapse" id="navbarResponsive">
            </div>
            <div class="container px-4 px-lg-5">
            <img src="assets-admin\image\simbol.png" alt="..." width="50px" style="margin-right: 20px"><a class="navbar-brand" href="#page-top">Informasi Sebaran Pelanggaran Hukum</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
            @yield('container')
        </div>
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Address</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="https://goo.gl/maps/5ZP2iEtu4Ft6yFZP7">Jl. Medan Merdeka Utara No.9, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Email</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="https://mail.google.com/mail/u/0/?tab=lm#inbox?compose=new">info[at]mahkamahagung.go.id</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Phone</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"> <a href="whatsapp://send?text=Hello&phone=(021) 384 3348">(021) 384 3348</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="https://www.mahkamahagung.go.id/id"><i class="fa fa-globe"></i></a>
                    <a class="mx-2" href="https://web.facebook.com/pt.aceh"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="https://www.instagram.com/humasmahkamahagung/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-2 px-lg-3">Copyright &copy; PelHum 2022 - Peradilan Umum Aceh</div></footer>
        <!-- Link Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Link Core theme JS-->
        <script src="assets-home/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
        <script> 
        const map = L.map('map').setView([4.3331332, 98.1298214], 6);

        // const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     maxZoom: 19,
        //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        // }).addTo(map); 

        googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);
        
        var marker = L.marker([4.3331332, 98.1298214]).addTo(map);
        var marker2 = L.marker2([5.51937, 95.31916]).addTo(map);
        </script>
    </body>
</html>