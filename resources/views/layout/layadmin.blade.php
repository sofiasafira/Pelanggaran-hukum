<!DOCTYPE html>
<html>
<head>
	<title>SIJULANK | Peta Sebaran</title>
    <link rel="icon" type="image/x-icon" href="assets-admin/image/simbol.png" />
    <!-- Link CSS-->
        <link rel="stylesheet" href="{{ asset('assets-admin/css/style1.min.css') }}">
    
    <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-ytZ5QEC1W+yLc5Ot5S/QlKbH8tKdGt1vnD4OdXfsNGvZ8blIgqnwFpDtgppLKejvwm8q3WuTFcz06Qoc9Xu10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-/MgUx5Z4ll0izr3tZ2Qhubv9nNQIa//KVEqxO+57wEjKaWE5Eg00Mp/5I5MquHdM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js" integrity="sha512-XbBvlzSefSv2Q7ZZW8/ZYD/6UaSH6TJjKpW1LTKF88zGqy6vEv0HChGKj+dqbCf+tn1ZnLd7jAvhXmDQ+XXJzg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-FsVVJvKjWU6fzG6l12U3qadOSIIF+c+ZM+jJZK4oZq/XoE2WcC9A59JF/BCyS0nFPHIcHm03o2IGj5m5l5G30g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      
</head>

<body>
	<!-- Navbar -->
    <nav>
        <div class="navbar-logo">
            <a href="#"><img src="assets-admin/image/simbol.png" alt="Logo"></a>
            <h1 style="font-weight: bold;">INFORMASI SEBARAN PELANGGARAN HUKUM ACEH</h1>
        </div>
    <div class="navbar-items" >
        <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/login">Login Pengadilan</a></li>
        <li><a href="/tentang">Tentang</a></li>
        </ul>
    </div>
    </nav>

	<!-- Content -->
	<div class="content">
    @yield('containeradmin')
    </div>

	<!-- Footer -->
	<div class="footer">
        <div class="container px-1 px-lg-3">Copyright &copy; PelHum 2022 - Peradilan Umum Aceh</div>
	</div>
</body>
</html>

