<!DOCTYPE html>
<html>
<head>
    <title>SIJULANK | {{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets-admin/image/simbol.png') }}" />      
    <!-- Link CSS-->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style3.min.css') }}">
          
    <!-- Include Leaflet CSS file in the head section -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />   
    <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha512-Dqm3h1Y4qiHUjbhxTuBGQsza0Tfppn53SHlu/uj1f+RT+xfShfe7r6czRf5r2NmllO2aKx+tYJgoxboOkn1Scg=="crossorigin=""></script>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" integrity="sha384-9pu+JZ7gCDZcGQKwytMnR/4COhGXxhqFkt2JMCs33X9Rv/TZPfWdKBfLJ6UcBpSx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css"/>
    
    <!-- Make sure you put this AFtER leaflet.js, when using with leaflet -->
    <script src="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.umd.js"></script>
    

    <!-- Include JavaScript Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ytZ5QEC1W+yLc5Ot5S/QlKbH8tKdGt1vnD4OdXfsNGvZ8blIgqnwFpDtgppLKejvwm8q3WuTFcz06Qoc9Xu10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/MgUx5Z4ll0izr3tZ2Qhubv9nNQIa//KVEqxO+57wEjKaWE5Eg00Mp/5I5MquHdM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-XbBvlzSefSv2Q7ZZW8/ZYD/6UaSH6TJjKpW1LTKF88zGqy6vEv0HChGKj+dqbCf+tn1ZnLd7jAvhXmDQ+XXJzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-FsVVJvKjWU6fzG6l12U3qadOSIIF+c+ZM+jJZK4oZq/XoE2WcC9A59JF/BCyS0nFPHIcHm03o2IGj5m5l5G30g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" refer></script>

    <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Y+2QwJ75eaaRcteo8B7VQYvAtg5J5C5X5A5ohGzRCvZ3qI82u5d+WocugfeMfVoIZgyBlE7xEeLvl9a1rppkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-L+k7Vq3JjVy41ocdHsQiJcZg+q3XgzBgsUHOn6Uohr6TjKZ+X9MeDnCq3Kj/oBpWg+EInRwlIxUJnCYU+Q6UgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Navbar -->
    <nav>
        <div class="navbar-logo">
            <a href="/"><img src="{{ asset('assets-admin/image/simbol.png') }}" alt="Logo"></a>
            <h1 style="font-weight: bold;">INFORMASI SEBARAN PELANGGARAN HUKUM ACEH</h1>
        </div>
        <div class="navbar-items">
            <div class="navbar-profile">
            <img src="{{ asset(auth()->user()->gambar) }}" alt="Profile Photo">
            <span class="navbar-username">{{ auth()->user()->nama_pengadilan }}</span>
            <div class="navbar-dropdown">  
                <a href="/profil">Lihat Profile</a>
                <a href="/login">Logout</a>
                <a href="/dashboard">Dashboard</a>
                <a href="/dashboard">Ganti Password</a>
            </div>
            </div>
        </div>
    </nav>

	<!-- Content -->
	<div class="content">
        @yield('containeradmin3')
    </div>
	<!-- Footer -->
	<div class="footer">
        <div class="container px-1 px-lg-3">Copyright &copy; PelHum 2022 - Peradilan Umum Aceh</div>
	</div>
</body>
</html>

