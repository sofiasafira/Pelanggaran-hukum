@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">

<div class="main-tambah" style="margin-top: 10px; margin: 10px; width: fit-content; display: flex; ">
    <button type="button" class="tambah-data"><a style="text-decoration: none; color: black">Tambah desa</a></button>
    <?php
    $jumlah_pelanggaran = DB::table('data_pelanggarans')->where('user_id', auth()->user()->id)->count();
    ?>
    <div class="total-pelanggaran">Total Pelanggaran: {{$jumlah_pelanggaran}}</div>
</div>

<!-- Modal Tambah Desa -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah Desa</h2>
    <form action="/desa" method="post" onsubmit="return validateForm()">
    @csrf  
    <div class="form-group">
        <label for="kode_kecamatan"> <strong>Kecamatan</strong></label>
        <select class="form-control" name="kode_kecamatan" id="kode_kecamatan" required>
          <option selected disabled >Kecamatan</option>
          @foreach ($kecamatans as $kec)
          @if ($kec->kode_kab_id == auth()->user()->kode_kab_id)
            <option value="{{ $kec->nama_kec }}">{{ $kec->nama_kec }}</option>
          @endif
          @endforeach
        </select>
      </div>
    <div class="form-group">
          <input type="hidden" name="geojson_des" class="form-control" id="geojson_des" value="xxx">
    </div>   
    <div class="form-group">
        <label for="kode_desa"><strong>kode desa</strong></label>
        <input type="text" name="kode_desa" class="form-control @error('kode_desa') is-invalid @enderror" id="kode_desa" placeholder="kode_desa"  required>
        @error('kode_desa')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama_desa"><strong>Nama desa</strong></label>
        <input type="text" name="nama_desa" class="form-control @error('nama_desa') is-invalid @enderror" id="nama_desa" placeholder="nama_desa"required>
        @error('nama_desa')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
       <input type="submit" value="Submit">
    </form>
  </div>
</div>
<div class="main-tabel">
<div class="table-responsive">
<div class="filter-row">
        <div>
            <input type="checkbox" id="show-all-checkbox"> 
            <label for="show-all-checkbox" class="label-show-all">Tampilkan semua data</label>
        </div>
        <div class="filter-col" style="margin-left: auto;" >
            <label for="filter_kec" class="filter-label">Filter Kecamatan:</label>
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
<table class="table table-striped" style="width: 80%; margin: 0 auto;">
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
            <td>{{ $dd->nama_kec}}</td>
            <td>{{ $dd->nama_des}}</td>
            <td>
              <a class="icon mr-2" href="/editdesa/{{$dd->kode_des}}/edit"><i data-feather="edit" class="text-success"></i></a>
            </td>
    @endforeach
  </tbody>
</table>
  </div>
</div>

</div>
@include('sweetalert::alert')

<script>
  feather.replace();
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");
  // Get the button that opens the modal
  var btn = document.getElementsByClassName("tambah-data")[0];
  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function() {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>

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

  // Filter data berdasarkan kecamatan
  $('#filter_kec').change(function() {
    var filter_kec = $(this).val().toLowerCase();
    if (filter_kec == '') {
      // Jika filter kecamatan kosong, tampilkan semua data
      $('table tbody tr').show();
    } else {
      // Jika filter kecamatan terisi, tampilkan data yang sesuai
      $('table tbody tr').each(function() {
        var kecamatan = $(this).find('td:first-child').text().toLowerCase();
        if (kecamatan != filter_kec) {
          $(this).hide();
        } else {
          $(this).show();
        }
      });
    }
  });

  // Pencarian data
  $('#search').keyup(function() {
    var keyword = $(this).val().toLowerCase();
    $('table tbody tr').each(function() {
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
