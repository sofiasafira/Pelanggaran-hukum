@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">

<div class="main-tambah" style="margin-top: 10px; margin: 10px; width: fit-content; display: flex; ">
    <button type="button" class="tambah-data"><a style="text-decoration: none; color: black">Tambah Kecamatan</a></button>
    <?php
    $jumlah_pelanggaran = DB::table('data_pelanggarans')->where('user_id', auth()->user()->id)->count();
    ?>
    <div class="total-pelanggaran">Total Pelanggaran : {{$jumlah_pelanggaran}}</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Tambah kecamatan</h2>
    <form action="/kecamatan" method="post" onsubmit="return validateForm()">
    @csrf  
    <div class="form-group">
    <label for="kode_kabupaten"><strong>Kode Kabupaten</strong></label>
          <input name="kode_kabupaten" class="form-control" id="kode_kabupaten" value="{{ auth()->user()->kode_kab_id}}">
    </div> 
    <div class="form-group">
          <input type="hidden" name="geojson_kec" class="form-control" id="geojson_kec" value="xxx">
    </div>   
    <div class="form-group">
        <label for="kode_kecamatan"><strong>kode kecamatan</strong></label>
        <input type="text" name="kode_kecamatan" class="form-control @error('kode_kecamatan') is-invalid @enderror" id="kode_kecamatan" placeholder="kode_kecamatan"  required>
        @error('kode_kecamatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama_kecamatan"><strong>Nama kecamatan</strong></label>
        <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" id="nama_kecamatan" placeholder="nama_kecamatan"required>
        @error('nama_kecamatan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
       <input type="submit" value="Submit">
    </form>
  </div>
</div>

<div class="main-tabel" style="margin-top: 20px; margin: 20px; padding: 10px; border: 1px solid #ddd; display: flex; flex-direction: column; align-items: center;">
<div class="table-responsive">
<table class="table table-striped" style="width: 80%; margin: 0 auto;">
  <thead style="background-color: yellow">
    <tr>
      <th style="width: 10%">kabupaten</th>
      <th style="width: 15%">Nama kecamatan</th>
      <th style="width: 10%">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($datas_kecamatan as $dk)
    @if ($dk->kode_kab_id == auth()->user()->kode_kab_id)
      <tr>
        <td>{{ $dk->nama_kab}}</td>
        <td>{{ $dk->nama_kec}}</td>
        <td>
          <a class="icon"><i data-feather="edit" class="text-success"></i></a>
        </td>
      </tr>
    @endif
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
    function hapusData() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus kecamatan ini?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan hapus
                window.location.href = "{{ url('/kecamatan/delete')}}";
            }
        })
    }
</script>



@endsection
