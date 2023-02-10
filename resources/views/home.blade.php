@extends ('layout.main')

@section ('container')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-capitalize"> COUNT-PELHUM</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Geografis Sebaran Pelanggaran Hukum Provinsi Aceh</h2>
                        <a class="btn btn-primary" href="/dashboard">Lihat Peta Sebaran</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white mb-4">Overview of this System</h2>
                        <p class="text-white-50">
                            Pelanggaran hukum yang kerap sekali terjadi dilingkungan sekitar membutuhkan sebuah sistem pemetaan. Dengan website ini, user secara umum dapat melihat jumlah sebaran hukum berdasarkan Kabupaten/kota di Provinsi Aceh.
                            <!-- <a href="http://www.pt-nad.go.id/new/">Pengadilan Tinggi Wilayah Aceh.</a> -->
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="projects-section bg-light">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets-admin/image/pengadilan1.jpg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Pengadilan Tinggi Aceh</h4>
                            <p class="text-black-50 mb-0">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Mahkamah Agung Republik Indonesia</h4>
                            <p class="text-black-50 mb-0">
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets-admin/image/Mahkamahagung.jpeg" alt="..." /></div>
                </div>
            </div>
        </section>

@endsection