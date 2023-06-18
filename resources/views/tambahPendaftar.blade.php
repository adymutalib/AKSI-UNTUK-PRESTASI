<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
    <header class="navbar sticky-top flex-md-nowrap p-0 shadow" style="background-color: #7AA874">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-" style="color: white; background-color: #609966" href="#">Aksi Untuk Prestasi</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{ route('login.logout') }}">Logout</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-dark" aria-current="page" href="{{ route('dashboard.index') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('siswa') }}">
              <span data-feather="archive" class="align-text-bottom"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item ">
            @can('admin')
            <a class="nav-link text-dark" href="{{ route('pembina') }}">
              <span data-feather="users" class="align-text-bottom"></span>
              Data Pembina
            </a>
            @endcan
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('prestasi') }}">
              <span data-feather="award" class="align-text-bottom"></span>
              Data Prestasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('ekstra')}}">
              <span data-feather="file" class="align-text-bottom"></span>
              Data Ekstrakurikuler
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('pendaftaran.index') }}">
              <span data-feather="server" class="align-text-bottom"></span>
              Data Pendaftar
            </a>
          </li>
          <li class="nav-item">
            @can('admin')
            <a class="nav-link text-dark" href="{{ route('dashboard.showDataPengguna') }}">
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
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Pendaftar</h1>
      </div>
      <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Tambah Data Siswa</h3>
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-5 border rounded mt-2">
                            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_input" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_input" name="namaInput">
                                </div>
                                <div class="mb-3">
                                    <label for="nis_input" class="form-label">NIS</label>
                                    <input type="text" class="form-control" id="nis_input" name="nisInput">
                                </div>
                                <div class="mb-3">
                                    <label for="jk_input" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jk_input" name="jkInput">
                                </div>
                                <div class="mb-3">
                                    <label for="ttl_input" class="form-label">Tempat, Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="ttl_input" name="ttlInput">
                                </div>
                                <div class="mb-3">
                                    <label for="kelas_input" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kelas_input" name="kelasInput">
                                </div>
                                <div class="mb-3">
                                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="ekstraInput" id="ekstra_Input">
                                    <option>Pilih Ekstrakurikuler</option>
                                    @foreach ($ekstra as $user)
                                      <option value="{{$user->id_ekstra}}">{{$user->nama_ekstra}}</option>
                                    @endforeach
                                  </select>
                              </div>
                                <div class="mb-3">
                                    <label for="alasan_input" class="form-label">Alasan</label>
                                    <input type="text" class="form-control" id="alasan_input" name="alasanInput">
                                </div>
                                <div class="mb-3">
                                  <label for="image" class="form-label">Foto</label>
                                  <img class="img-preview img-fluid mb-3">
                                  <input class="form-control" type="file" id="image" name="image" onchange="previewImage()" required>
                                </div>
                                <div class="row mx-2">
                                    <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                </div>
                            </form>
                        </div>
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
  <script>
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
   

  </script>
  </body>
</html>