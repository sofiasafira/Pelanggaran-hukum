@extends ('layout.main')

@section ('container')
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase"> COUNT-PELHUM</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">Sistem Informasi Geografis Sebaran Pelanggaran Hukum Peradilan Umum Provinsi Aceh</h2>
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
                        <h2 class="text-white mb-4">Sebaran Pelanggaran Hukum Peradilan Umum</h2>
                        <p class="text-white-50">
                            Pelanggaran Hukum kerap sekali terjadi dilingkungan sekitar. Dengan sistem informasi geografis ini user secara umum dapat melihat jumlah sebaran pelanggaran hukum pada tiap tiap kabupaten/kota.
                            <a href="http://www.pt-nad.go.id/new/">Pengadilan Tinggi Wilayah Aceh.</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="projects-section bg-light">
            <div class="container px-4 px-lg-5">
                <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                    <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets-home/image/img/gedungdepan.jpeg" alt="..." /></div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="featured-text text-center text-lg-left">
                            <h4>Pengadilan Tinggi Wilayah Aceh</h4>
                            <p class="text-black-50 mb-0">Kementerian Hukum dan HAM memiliki perwakilan Kantor wilayah (kanwil) Kementerian Hukum dan Hak Asasi Manusia merupakan instansi vertikal Kementerian Hukum dan Hak Asasi Manusia yang berkedudukan di setiap provinsi, yang berada di bawah dan bertanggung jawab kepada Menteri Hukum dan Hak Asasi Manusia. Kanwil terdiri atas beberapa divisi serta sejumlah Unit Pelaksana Teknis (UPT), termasuk Kantor Imigrasi, Lembaga Pemasyarakatan (Lapas), Lapas Terbuka/Lapas Narkotika, Rumah Tahanan Negara (Rutan), Cabang Rutan, Rumah P</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection