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
                <h3 class="text-center">Edit Data Pengguna</h3><br>
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-5 border rounded mt-2">
                            <form action="{{ route('dashboard.update', $users->id) }}" method="POST">
                                @method('put')
                                @csrf
                        
                                <div class="mb-3">
                                    <label for="nama_input" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama_input" name="namaInput" value="{{ $users->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email_input" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email_input" name="emailInput" value="{{ $users->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password_input" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password_input" name="passwordInput" value="{{ $users->password }}">
                                </div>
                                <div class="mb-3">
                                    <label for="is_admin_input" class="form-label">Is_admin</label>
                                    <input type="text" class="form-control" id="is_admin_input" name="is_adminInput" value="{{ $users->is_admin }}">
                                </div>
                                <div class="row mx-2">
                                    <button type="submit" class="btn btn-primary mb-3">Tambah</button>
                                </div>
                            </form>
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