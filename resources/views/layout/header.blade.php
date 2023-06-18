<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $title ?? 'Home' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="2110131320010@mhs.ulm.ac.id">2110131320010@mhs.ulm.ac.id</a>
                <i class="bi bi-phone-fill phone-icon"></i> +62 800 0000 9999
            </div>
    
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">Aksi Untuk Prestasi</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}"
                            href="{{ route('index') }}#hero">Home</a></li>
                    <li><a class="nav-link scrollto " href="{{ route('index') }}#portfolio">Ekstrakurikuler</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('chart') }}">Grafik</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('userPrestasi') }}">Prestasi</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('index') }}#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('pendaftaran.create') }}">Pendaftaran</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('userPengumuman') }}">Pengumuman</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">Sign In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
