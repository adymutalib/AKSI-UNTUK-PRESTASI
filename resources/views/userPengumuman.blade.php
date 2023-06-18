@extends('layout.index')

@section('content')
    <div class="section-title">
        <span>Pengumuman</span>
        <h2>Pengumuman</h2>
        <p>Pengumuman nama peserta seleksi ekstrakulikuler yang lolos.</p><br><br><br>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <form action="" method="get">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Pencarian" name="search" aria-describedby="basic-addon1">
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
                  <th scope = "col">No.</th>
                  <th scope = "col">NISN</th>
                  <th scope = "col">Nama</th>
                  <th scope = "col">Kelas</th>
                  <th scope = "col">Ekstrakurikuler</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $n= 1;
                @endphp
               @foreach ($pengumuman as $item)
               <tr>
                 <td>{{ $n }}</td>
                 <td>{{ $item->NISN }}</td>
                 <td>{{ $item->NAMA }}</td>
                 <td>{{ $item->KELAS }}</td>
                 <td>{{ $item->EKSTRAKULIKULER }}</td>
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
    </div>
    <div class="my-4">
      {{ $pengumuman->links() }}
    </div>
@endsection
