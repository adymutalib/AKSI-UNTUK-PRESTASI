<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <style>
      .bg-custom-1 {
        background-color: #7AA874; 
        color: #FFFFFF; 
      }
      .bg-custom-2 {
        background-color: #90A17D; 
        color: #FFFFFF; 
      }
      .bg-custom-3 {
        background-color: #9DC08B; 
        color: #FFFFFF; 
      }
      .btn-custom {
        background-color: #609966; 
        color: #FFFFFF;
        border-color: #609966;
      }

    </style>
  </head>
  <body>
    
<header class="navbar sticky-top flex-md-nowrap p-0 shadow" style="background-color: #7AA874">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-" style="color: white; background-color: #609966" href="#">Aksi Untuk Prestasi</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('dashboard.index') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('siswa') }}">
              <span data-feather="archive" class="align-text-bottom"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item">
            @can('admin')
            <a class="nav-link" href="{{ route('pembina') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Data Pembina
            </a>
            @endcan
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('prestasi') }}">
              <span data-feather="award" class="align-text-bottom"></span>
              Data Prestasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('ekstra')}}">
              <span data-feather="file" class="align-text-bottom"></span>
              Data Ekstrakurikuler
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('pendaftaran.index') }}">
              <span data-feather="server" class="align-text-bottom"></span>
              Data Pendaftar
            </a>
          </li>
          <li class="nav-item">
            @can('admin')
            <a class="nav-link" href="{{ route('dashboard.showDataPengguna') }}">
              <span data-feather="user" class="align-text-bottom"></span>
              Data Pengguna
            </a>
            @endcan
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('pengumuman') }}">
              <span data-feather="info" class="align-text-bottom"></span>
              Data Pengumuman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('login.logout') }}">
              <span data-feather="log-out" class="align-text-bottom"></span>
              Logout
            </a>
          </li>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <div class="container mt-3">
        <div class="row">
          <h2>Hai, {{ Auth::user()->name }}</h2>
        </div>
      </div>
        <div id="carouselExampleDark" class="carousel carousel-dark slide mb-3">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="{{ asset('assets/img/bg_1.jpg') }}" class="d-block w-100" style="max-width: auto; max-height: 400px" alt="bg_1">
              <div class="carousel-caption d-none d-md-block" style="color: white">
                <h3>Selamat Datang di Pusat Informasi Ekstrakulikuler</h3>
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="{{ asset('assets/img/bg_2.jpg') }}" class="d-block w-100" style="max-width: auto; max-height: 400px" alt="bg_2">
              <div class="carousel-caption d-none d-md-block" style="color: white">
                <h3>Selamat Datang di Pusat Informasi Ekstrakulikuler</h3>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/bg_3.jpg') }}" class="d-block w-100" style="max-width: auto; max-height: 400px" alt="bg_3">
              <div class="carousel-caption d-none d-md-block" style="color: white">
                <h3>Selamat Datang di Pusat Informasi Ekstrakulikuler</h3>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="row mb-3">
          <div class="col">
            <div class="card">
              <div class="card-body bg-custom-1">
                <h5 class="card-title">Jumlah Siswa</h5>
                <p class="display-4">{{ $jumlahSiswa}}</p>
                <a href="{{ route('siswa') }}" class="btn btn-custom">Lihat Detail</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body bg-custom-2">
                <h5 class="card-title">Jumlah Ekstra</h5>
                <p class="display-4">{{ $jumlahEkstra}}</p>
                <a href="{{ route('ekstra') }}" class="btn btn-custom">Lihat Detail</a>
              </div>
            </div>
          </div>
          
          <div class="col">
            <div class="card">
              <div class="card-body bg-custom-3">
                <h5 class="card-title float-left">Jumlah Prestasi</h5>
                <p class="display-4">{{ $jumlahPrestasi}}</p>
                <a href="{{ route('prestasi') }}" class="btn btn-custom">Lihat Detail </i></a>
              </div>
            </div>
          </div>
          
        </div>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="js/dashboard.js"></script>
  </body>
</html>