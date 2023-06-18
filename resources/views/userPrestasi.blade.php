@extends('layout.index')

@section('content')
    <div class="section-title">
        <span>Prestasi</span>
        <h2>Prestasi</h2>
        <p>Daftar Prestasi dari Beberapa Ekstrakurikuler</p><br><br><br>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <form action="" method="get">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Pencarian Berdasarkan Ekstrakurikuler" name="search" aria-describedby="basic-addon1">
                    <button class="input-group-text btn btn-primary" id="basic-addon1">Search</button>
                  </div>
                </form>
              </div>
            </div>
          </div><br><br>
          <div class="table-responsive mx-5">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lomba</th>
                    <th scope="col">Juara</th>
                    <th scope="col">Ekstrakurikuler</th>
                    <th scope="col">Tanggal Perlombaan</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $n = 1;
                @endphp
                @foreach ($prestasi as $user)
                <tr>
                    <th scope="row">{{ $n }}</th>
                    <td>{{ $user->lomba }}</td>
                    <td>{{ $user->juara }}</td>
                    <td>{{ $user->ekstra['nama_ekstra'] }}</td>
                    <td>{{ $user->tanggal }}</td>
                </tr>
                @php
                    $n++;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
    <div class="my-4">
      {{ $prestasi->links() }}
    </div>
@endsection
