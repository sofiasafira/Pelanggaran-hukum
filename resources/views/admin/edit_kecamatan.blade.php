@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">
        <div class="content-edit">
        <h2>Edit Kecamatan</h2>
        <form action="/editkecamatan/{{$kecamatan->kode_kec}}" method="POST">
            @csrf  
            @method('PUT')
            <div class="form-group">
                <label for="kode_kabupaten"> <strong>Nama Kabupaten</strong></label>
                <input name="kode_kabupaten" class="form-control" id="kode_kabupaten" value="{{ $kecamatan->kode_kab_id}}">
            </div>
            <div class="form-group">
                <input type="hidden" name="geojson_kec" class="form-control" id="geojson_kec" value="xxx">
            </div>   

            <div class="form-group">
                <label for="kode_kecamatan"><strong>Kode Kecmatan</strong></label>
                <input type="text" name="kode_kecamatan" class="form-control @error('kode_kecamatan') is-invalid @enderror" id="kode_kecamatan" placeholder="kode_kecamatan" value="{{ old('kode_kec') ? old('kode_kec') : $kode_kec }}" required>
                @error('kode_kecamatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> 

            <div class="form-group">
                <label for="nama_kecamatan"><strong>Nama Kecamatan</strong></label>
                <input type="text" name="nama_kecamatan" class="form-control @error('nama_kecamatan') is-invalid @enderror" id="nama_kecamatan" placeholder="nama_kecamatan" value="{{ $kecamatan->nama_kec }}" required>
                @error('nama_kecamatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input type="submit" value="Edit">
        </form>
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
