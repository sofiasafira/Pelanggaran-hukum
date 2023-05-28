@extends('layout.layadmin2')

@section('containeradmin2')

<div class="content">
  <div class="content-edit">
    <h2>Edit Klasifikasi</h2>
    <form action="/editklasifikasi/{{$klasifikasi->kode_klasifikasi}}" method="POST" onsubmit="return validateForm()">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="kode_klasifikasi"><strong>Kode Klasifikasi</strong></label>
        <input type="text" name="kode_klasifikasi" class="form-control @error('kode_klasifikasi') is-invalid @enderror" id="kode_klasifikasi" placeholder="Kode Klasifikasi" value="{{ $kode_klasifikasi }}" required>
        @error('kode_klasifikasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="nama_klasifikasi"><strong>Nama Klasifikasi</strong></label>
        <input type="text" name="nama_klasifikasi" class="form-control @error('nama_klasifikasi') is-invalid @enderror" id="nama_klasifikasi" placeholder="Nama Klasifikasi" value="{{ $klasifikasi->nama_klasifikasi }}" required>
        @error('nama_klasifikasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group">
        <input type="hidden" name="kode_jenis_id" class="form-control" id="kode_jenis_id" value="{{ auth()->user()->kode_jenis_id}}">
      </div>   
      <div class="form-group">
        <label for="kode_direktori"> <strong>Direktori</strong></label>
        <select class="form-control" name="kode_direktori" id="kode_direktori" required>
          <option selected disabled >{{ $klasifikasi->kode_direktori_id }}</option>
          @foreach ($direktoris as $direktori)
          <option value="{{ $direktori?->kode_direktori }}">{{ $direktori?->nama_direktori }}</option>
          @endforeach
        </select>
      </div>
       <input type="submit" value="Update">
    </form>
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

// Filter data berdasarkan direktori
$('#filter_dir').change(function() {
  var filter_dir = $(this).val().toLowerCase();
  if (filter_dir == '') {
    // Jika filter direktori kosong, tampilkan semua data
    $('table tbody tr').show();
  } else {
    // Jika filter direktori terisi, tampilkan data yang sesuai
    $('table tbody tr').each(function() {
      var direktori = $(this).find('td:first-child').text().toLowerCase();
      if (direktori != filter_dir) {
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

<script>
    function hapusData() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin menghapus klasifikasi ini?',
            text: "Tindakan ini tidak dapat dibatalkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim permintaan hapus
                window.location.href = "{{ url('/klasifikasi/delete')}}";
            }
        })
    }
</script>



@endsection
