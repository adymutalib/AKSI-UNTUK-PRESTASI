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
      <a class="navbar-brand col-md-2 col-lg-2 me-auto px-3 fs-" style="color: white; background-color: #609966" href="#">Aksi Untuk Prestasi</a>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a class="nav-link px-3" style="color: white" href="{{ route('dashboard.showDataPengguna') }}">Kembali</a>
        </div>
      </div>
    </header>

    <main>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3"></div>
      <div class="container d-flex justify-content-center mt-3">
      <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Tambah Data Pengguna</h3><br>
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <form action="{{ route('dashboard.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_input" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_input" name="namaInput">
                                </div>
                                <div class="mb-3">
                                    <label for="email_input" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email_input" name="emailInput">
                                </div>
                                <div class="mb-3">
                                    <label for="password_input" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password_input" name="passwordInput">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="is_admin_input" class="form-label">Is_admin</label>
                                    <input type="text" class="form-control" id="is_admin_input" name="is_adminInput">
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

  </body>
</html>