@extends ('layout.main')

@section ('container')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-capitalize"> SIJULANK </h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Pelanggaran Hukum Provinsi Aceh</h2>
                        <a class="btn btn-primary" href="{{ url('/dashboardumum')}}">Lihat Peta Sebaran</a>
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
@endsection