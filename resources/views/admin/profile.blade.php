@extends('layout.layadmin2')

@section('containeradmin2')

<div class="main-addkd-container" style="margin-top: 10px; margin: 10px; display: flex;">
  <div class="main-addkd" style="width: fit-content; display: flex; margin-right: 20px;">
    <a class="tambah-dk" style="text-decoration: none;">Jumlah Pelanggaran {{$jumlah_pelanggaran}}</a>
    <a href="{{ url('/baru') }}" class="tambah-icon" class="icon" style="margin-left: 10px;">
        <i data-feather="plus-circle" class="text-primary"></i>
    </a>
  </div>

  <div class="main-addkd" style="width: fit-content; display: flex;">
    <a class="tambah-dk" style="text-decoration: none;">Jumlah Klasifikasi {{$jumlah_klasifikasi}}</a>
    <a href="{{ url('/klasifikasi') }}" class="tambah-icon" class="icon" style="margin-left: 10px;">
        <i data-feather="plus-circle" class="text-primary"></i>
    </a>
  </div>

  <div class="main-addkd" style="width: fit-content; display: flex; margin-right: 20px;">
    <a class="tambah-dk" style="text-decoration: none;">Jumlah Kecamatan {{$jumlahKecamatan}}</a>
    <a href="{{ url('/kecamatan') }}" class="tambah-icon" class="icon" style="margin-left: 10px;">
        <i data-feather="plus-circle" class="text-primary"></i>
    </a>
  </div>

  <div class="main-addkd" style="width: fit-content; display: flex;">
    <a class="tambah-dk" style="text-decoration: none;">Jumlah Desa  {{$jumlah_desa}}</a>
    <a href="{{ url('/desa') }}" class="tambah-icon" class="icon" style="margin-left: 10px;">
        <i data-feather="plus-circle" class="text-primary"></i>
    </a>
  </div>
  

</div>



<div class="main-profil" >
    <div style="text-align: center;">
        <img src="{{ auth()->user()->gambar}}" alt="gambar"style="display: inline-block; width: 150px; height: 150px; border-radius: 50%; margin-bottom: 10px;">
        <h3 style="text-align: center; color: black;">{{ auth()->user()->nama_pengadilan }}</h3>
    </div>
    <table style="margin: 0 auto; color: white; width: 80%; color: black">
    <tr>
        <td style="padding: 10px;">Kabupaten</td>
        <td style="padding: 10px; text-align: right;">
            <a href="{{ auth()->user()->maps}}">
                <img src="assets-umum/images/iconprofile.png" align="right" style="width: 1em; height: 1em; margin-left: 0.5em;">
            </a>
            <?php
            $jumlah_pelanggaran = DB::table('data_pelanggarans')->where('user_id', auth()->user()->id)->count();
            ?>
            <span style="font-size: 1em;">{{$kabupaten->nama_kab}}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Alamat</td>
        <td style="padding: 10px; text-align: right;">
            <a href="{{ auth()->user()->maps}}">
                <img src="assets-umum/images/iconprofile.png" align="right" style="width: 1em; height: 1em; margin-left: 0.5em;">
            </a>
            <span style="font-size: 1em;">{{ auth()->user()->alamat}}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Kunjungi Halaman Website</td>
        <td style="padding: 10px; text-align: right;">
            <a href="{{ auth()->user()->website}}">
                <img src="assets-umum/images/iconprofile.png" align ="right" style="width: 1em; height: 1em; margin-left: 0.5em;">
            </a>
            <span style="font-size: 1em;">Halaman Website {{ auth()->user()->nama_pengadilan}}</span>
        </td>
    </tr>
    <tr>
        <td style="padding: 10px;">Telusuri Proses Perkara</td>
        <td style="padding: 10px; text-align: right;">
            <a href="{{ auth()->user()->sipp}}">
                <img src="assets-umum/images/iconprofile.png" align="right" style="width: 1em; height: 1em; margin-left: 0.5em;">
            </a>
            <span style="font-size: 1em;"> Proses Perkara {{ auth()->user()->nama_pengadilan}}</span>
        </td>
    </tr>
</table>
    <div style="padding: 10px; text-align: center;">
        <h3 style="text-align: center; color: black;">Wilayah Kerja {{ auth()->user()->nama_pengadilan }}</h3>
    </div>
    <div style="padding: 5px;" class="toggle">
        <strong><p>Kecamatan dan Desa</p></strong>
        <span class="arrow">&raquo;</span>
    </div>
    <div class="content-hide">
    <div class="filter-row" style="margin-left: 50px; margin-right: 5px;">
        <div>
            <input type="checkbox" id="show-all-checkbox"> 
            <label for="show-all-checkbox" class="label-show-all">Tampilkan semua data</label>
        </div>
        <div class="filter-col" style="margin-left: auto;" >
            <label for="filter_kec" class="filter-label">Filter Berdasarkan Kecamatan:</label>
            <select id="filter_kec" class="form-control filter-select">
                <option value="">-- Semua --</option>
                @foreach ($kecamatans as $kec)
                @if ($kec->kode_kab_id == auth()->user()->kode_kab_id)
                <option value="{{ $kec->nama_kec }}">{{ $kec->nama_kec }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="filter-col" style="margin-left: auto;">
            <label for="search" class="filter-label">Cari:</label>
            <input type="text" id="search" class="form-control filter-search">
        </div>
    </div>
        <table id="tabel-kedua" class="table table-striped" style="width: 80%; margin: 0 auto;">
            <thead style="background-color: yellow">
            <tr>
                <th style="width: 10%">kecamatan</th>
                <th style="width: 15%">Nama desa</th>
                <th style="width: 10%">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($datas_desa as $dd)
            <tr>
                <td>{{ $dd->nama_kec }}</td>
                <td>{{ $dd->nama_des }}</td>
                <td>
                <a class="icon"><i data-feather="edit" class="text-success"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>

<script>
  feather.replace();
</script>

<script>
        const toggles = document.querySelectorAll('.toggle');
        const arrows = document.querySelectorAll('.arrow');
        const contents = document.querySelectorAll('.content-hide');

        toggles.forEach((toggle, index) => {
        toggle.addEventListener('click', () => {
            arrows[index].classList.toggle('active');
            contents[index].classList.toggle('active');
        });
        });
</script>


<script>
$(document).ready(function() {
    // Sembunyikan semua data kecuali 10 data pertama pada tabel kedua
    $('#tabel-kedua tbody tr').hide();
    $('#tabel-kedua tbody tr').slice(0, 10).show();

    // Tampilkan semua data pada tabel kedua saat checkbox dicentang
    $('#show-all-checkbox').change(function() {
        if (this.checked) {
            $('#tabel-kedua tbody tr').show();
        } else {
            $('#tabel-kedua tbody tr').hide();
            $('#tabel-kedua tbody tr').slice(0, 10).show();
        }
    });

    // Filter data berdasarkan kecamatan pada tabel kedua
    $('#filter_kec').change(function() {
        var filter_kec = $(this).val().toLowerCase();
        if (filter_kec == '') {
            // Jika filter kecamatan kosong, tampilkan semua data pada tabel kedua
            $('#tabel-kedua tbody tr').show();
        } else {
            // Jika filter kecamatan terisi, tampilkan data yang sesuai pada tabel kedua
            $('#tabel-kedua tbody tr').each(function() {
                var kecamatan = $(this).find('td:first-child').text().toLowerCase();
                if (kecamatan != filter_kec) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        }
    });

    // Pencarian data pada tabel kedua
    $('#search').keyup(function() {
        var keyword = $(this).val().toLowerCase();
        $('#tabel-kedua tbody tr').each(function() {
            var kecamatan = $(this).find('td:first-child').text().toLowerCase();
            var desa = $(this).find('td:nth-child(2)').text().toLowerCase();
            if (kecamatan.indexOf(keyword) == -1 && desa.indexOf(keyword) == -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
</script>
@endsection