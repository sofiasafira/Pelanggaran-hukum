<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PelHum | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <!-- Link CSS-->
    <link rel="stylesheet" href="{{asset('assets-admin/css/style.min.css')}}">

  </head>


  <body>
  <nav class="navbar navbar-expand navbar-dark" style="background-color: #198754">
    <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets-admin\image\logo.png" alt="..." width="50px" style="margin-right: 20px"><a class="navbar-brand" href="#page-top">Peta Sebaran Pelanggaran Hukum Peradilan Umum</a>
          {{-- SEBARAN PELANGGARAN HUKUM PERADILAN UMUM ACEH --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">{{ auth()->user()->username}}</a>
                </li>
            </ul>
        </div>
    </div>
   </nav>

   <main class="form-signin w-100 m-auto">

    <form action="/login" method="POST">
      @csrf


      <center><h1 class="h3 mb-4 mt-5 fw-normal block" style="font-size: 25px"><strong>Tambahkan Data Pelanggaran</strong></h1></center>

      <div class="form-group mb-2">
        <label for="kode_pelanggaran"><strong>kode pelanggaran</strong></label>
        <input type="text" name="kode_pelanggaran" class="form-control @error('kode_pelanggaran') is-invalid @enderror" id="kode_pelanggaran" placeholder="kode_pelanggaran" required>
        @error('kode_pelanggaran')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group mb-2">
        <label for="date"><strong>tanggal putusan</strong></label>
        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="date" required>
        @error('date')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group mb-2">
        <label for="kode_direktori"> <strong>Direktori</strong></label>
        <select class="form-control" name="kode_direktori" id="kode_direktori" required>
          <option selected disabled >Direktori</option>
          @foreach ($direktoris as $direktori)
              <option value="{{ $direktori->kode_direktori }}">{{ $direktori->kode_direktori }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group mb-4">
        <label for="kode_klasifikasi"><strong>Klasifikasi</strong></label>
        <select class="form-control" name="kode_klasifikasi" id="kode_klasifikasi" required>
          <option selected disabled >Klasifikasi</option>
        </select>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
  </form>
</main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function() {
        $('#kode_direktori').on('change', function() {
          var direktoriID = $(this).val();
          console.log(direktoriID)
          jenisID = 'acehpu' ; //disini harus jenis ID tapi belom mau
          console.log(jenisID)
          if(direktoriID) {
              $.ajax({
                  url: '/add_item_pelanggaran/'+direktoriID+'/'+jenisID,
                  type: "GET",
                  data : {"_token":"{{ csrf_token() }}", "kode_jenis_id":jenisID},
                  dataType: "json",
                  success:function(data)
                  {
                    if(data){
                        $('#kode_klasifikasi').empty();
                        $('#kode_klasifikasi').append('<option hidden>Klasifikasi</option>');
                        $.each(data, function(key, value){
                            $('select[name="kode_klasifikasi"]').append('<option value="'+ key.kode_klasifikasi+'">' + value.nama_klasifikasi+ '</option>');
                            console.log(key, value)
                        });
                    }else{
                        $('#kode_klasifikasi').empty();
                    }
                  }
              });
          }else{
            $('#kode_klasifikasi').empty();
          }
        });
      });
  </script>

  </body>
</html>


