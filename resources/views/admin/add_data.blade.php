@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">
<?php
  $jumlah_pelanggaran = DB::table('data_pelanggarans')->where('user_id', auth()->user()->id)->count();
?>
<div class="main-tambah" style="margin-top: 10px; margin: 10px; width: fit-content; display: flex; ">
    <button type="button" class="tambah-data"><a href="{{ url('/baru')}}" style="text-decoration: none; color: black">Tambah Data</a></button>
    <div class="total-pelanggaran">Total Pelanggaran: {{$jumlah_pelanggaran}}</div>
</div>
<div class="main-tabel" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd; display: flex; flex-direction: column; align-items: center;">
<div class="table-responsive">
<div class="filter-row sticky-top" style="margin-left: 50px; margin-right: 5px;">
        <div>
            <input type="checkbox" id="show-all-checkbox"> 
            <label for="show-all-checkbox" class="label-show-all">Tampilkan semua data</label>
        </div>
        <div class="filter-col" style="margin-left: auto; margin-right: 5px;">
          <label for="filter_kolom_5" class="filter-label">Pilih Kecamatan:</label>
          <select id="filter_kolom_5" class="form-control filter-select">
                <option value="">Pilih</option>
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
<div class="main-tabel2" style="margin-top: 20px; margin: 10px; padding: 5px; display: flex; flex-direction: column; align-items: center;">
<div class="table-responsive">
<table class="table table-striped">
  <thead style="background-color: yellow">
    <tr>
      <th style="width: 3%">Aksi</th>  
      <th style="width: 10%">Kode</th>
      <th style="width: 10%">Tanggal Putusan</th>
      <th style="width: 17%">Para Pihak</th>
      <th style="width: 10%">Kecamatan</th>
      <th style="width: 10%">Desa</th>
      <th style="width: 10%">Direktori</th>
      <th style="width: 10%">Klasifikasi</th>
      <th style="width: 25%">Deskripsi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas_pelanggaran as $dp)
    @if ($dp->user_id == auth()->user()->id)
      <tr>
        <td>
            @if ($dp->user_id == auth()->user()->id)
                <a class="icon mr-2" href="{{ url('/edit', $dp->kode_pelanggaran) }}"><i data-feather="edit" class="text-success"></i></a>
            @endif
            <form action="{{ route('admin.destroy', $dp->kode_pelanggaran ) }}" method="" style="display: inline-block">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.delete', $dp->kode_pelanggaran) }}" class="icon mr-2 text-danger" onclick="event.preventDefault(); hapusData()"><i data-feather="trash"></i></a>
                <!-- <a  class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a> -->
                <a class="icon" href="{{ route('admin.show', $dp->kode_pelanggaran) }}"><i data-feather="info"></i></a>
            </form>
        </td>

        <td>{{ $dp->kode_pelanggaran }}</td>
        <td>{{ date('Y-m-d', strtotime($dp->tanggal)) }}</td>
        <td>
          <strong>1. Pemohon/Penggugat/Saksi</strong> <br> {{ $dp->pemohon }} <br><br>
          <strong>2. Tersangka/Terdakwa</strong> <br> {{ $dp->tersangka }}
        </td>
        <td>{{ $dp->nama_kec }}</td>
        <td>{{ $dp->nama_des }}</td>
        <td>{{ $dp->nama_direktori }}</td>
        <td>{{ $dp->nama_klasifikasi }}</td>
        <td>
          <?php
            $deskripsi = $dp->deskripsi;
            if (strlen($deskripsi) > 130) {
              $deskripsi = substr($deskripsi, 0, 130)."...";
            }
            echo implode("<br>", str_split($deskripsi, 45));
          ?>
        </td>
      </tr>
    @endif
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
@include('sweetalert::alert')

<script>
  feather.replace();
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>
$(document).ready(function() {
    $(document).ready(function() {
    // Sembunyikan semua data kecuali 10 data pertama
    $('table tbody tr').hide();
    $('table tbody tr').slice(0, 10).show();

    // Tampilkan semua data saat checkbox dicentang
    $('#show-all-checkbox').change(function() {
      if (this.checked) {
        $('table tbody tr').show();
      } else {
        $('table tbody tr').hide();
        $('table tbody tr').slice(0, 10).show();
      }
    });
  });

  // Filter data berdasarkan kolom ke-5
$('#filter_kolom_5').change(function() {
  var filter_kolom_5 = $(this).val().toLowerCase();
  if (filter_kolom_5 == '') {
    // Jika filter kolom ke-5 kosong, tampilkan semua data
    $('table tbody tr').show();
  } else {
    // Jika filter kolom ke-5 terisi, tampilkan data yang sesuai
    $('table tbody tr').each(function() {
      var kolom_5 = $(this).find('td:nth-child(5)').text().toLowerCase();
      if (kolom_5 != filter_kolom_5) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  }
});


  // Pencarian data
  $(document).ready(function() {
  // Pencarian data
  $('#search').keyup(function() {
    var keyword = $(this).val().toLowerCase();
    $('table tbody tr').each(function() {
      var kode = $(this).find('td:nth-child(2)').text().toLowerCase();
      var tanggal = $(this).find('td:nth-child(3)').text().toLowerCase();
      var pihak = $(this).find('td:nth-child(4)').text().toLowerCase();
      var kecamatan = $(this).find('td:nth-child(5)').text().toLowerCase();
      var desa = $(this).find('td:nth-child(6)').text().toLowerCase();
      var direktori = $(this).find('td:nth-child(7)').text().toLowerCase();
      var klasifikasi = $(this).find('td:nth-child(8)').text().toLowerCase();
      var deskripsi = $(this).find('td:nth-child(9)').text().toLowerCase();

      if (kode.indexOf(keyword) == -1 &&
          tanggal.indexOf(keyword) == -1 &&
          pihak.indexOf(keyword) == -1 &&
          kecamatan.indexOf(keyword) == -1 &&
          desa.indexOf(keyword) == -1 &&
          direktori.indexOf(keyword) == -1 &&
          klasifikasi.indexOf(keyword) == -1 &&
          deskripsi.indexOf(keyword) == -1) {
        $(this).hide();
      } else {
        $(this).show();
      }
    });
  });
});



});
</script>


@endsection
