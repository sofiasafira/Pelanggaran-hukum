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
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">About</a>
                </li>        
            </ul>
        </div>
    </div>
   </nav>

    <div class="container mt-4">

      @yield('containeradmin')
    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>