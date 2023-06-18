@extends('layout.index')

@section('content')
    <div class="section-title">
        <span>Pendaftaran</span>
        <h2>Pendaftaran</h2>
        <p>Silahkan isi data diri untuk mendaftar Esktrakulikuler yang ingin kalian ikuti.</p>
    </div>
    {{-- @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif --}}
      {{-- @if (session('failed'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif --}}

    <div class="container">
        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 mx-auto">
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
                </div>
                <div class="col-md-6 mx-auto">
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
                        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
        </form>
    </div>
    @include('sweetalert::alert')

@endsection
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
