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
        <h1 class="h2">Data Prestasi</h1>
      </div>
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <a href="{{ route('prestasi.create') }}" class="btn btn-success">Tambah Data</a>
      <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari berdasarkan ekstrakurikuler" name="search" aria-describedby="basic-addon1">
            <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
          </div>
        </form>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lomba</th>
                <th scope="col">Juara</th>
                <th scope="col">Ekstrakurikuler</th>
                <th scope="col">Tanggal Perlombaan</th>
                <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
                $n= 1;
            @endphp
            @foreach ($prestasi as $user)
            <tr>
                <th scope="row">{{ $n }}</th>
                    <td>{{ $user->lomba }}</td>
                    <td>{{ $user->juara }}</td>
                    <td>{{ $user->ekstra['nama_ekstra'] }}</td>
                    <td>{{ $user->tanggal }}</td>
                    <td>
                      <div style="display: flex; gap: 8px;">
                        <a href="{{ route('prestasi.edit', encrypt($user->id_prestasi)) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('prestasi.destroy',$user->id_prestasi) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
                        </form>
                      </div>       
                    </td>
            </tr>
             @php
                $n++;
            @endphp
         @endforeach
          </tbody>
        </table>
        <div class="my-4">
          {{$prestasi->links()}}
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