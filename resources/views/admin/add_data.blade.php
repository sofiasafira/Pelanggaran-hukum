<!doctype html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PelHum | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
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

   
    <div class="container mt-4">
       <button type="button" class="btn btn-success  ms-auto"><a href="{{ route('admin.create') }}" style="text-decoration: none; color: white">Tambah Data</a></button>
    </div>

    <div class="container mt-4">
      <table class="table table-striped">
        <tr>
          <th>Kode</th>
          <th>Tanggal Putusan</th>
          <th>Direktori</th>
          <th>Klasifikasi</th>
          <th>Deskripsi</th>
          <th>Aksi</th>
        </tr>
        @foreach ($datas_pelanggaran as $dp)
          <tr>
            <td>{{ $dp->kode_pelanggaran }}</td>
            <td>{{ $dp->tanggal }}</td>
            <td>{{ $dp->kode_direktori_id }}</td>
            <td>{{ $dp->kode_klasifikasi_id }}</td>
            <td>{{ $dp->deskripsi }}</td>
            <td>
              <button type="button" class="btn btn-primary"><a href="{{ route('admin.show' ,$dp->kode_pelanggaran) }}" style="text-decoration: none; color:white">Edit</a></button>
              
              <form action="{{ route('admin.destroy', $dp->kode_pelanggaran ) }}" method="" style="display: inline-block">
                @csrfl
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>

            </td>
          </tr>
        @endforeach
      </table>

    </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>


