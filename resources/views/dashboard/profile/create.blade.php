@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/profile" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data profile</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/profile" enctype="multipart/form-data">
            @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Panti</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" required autofocus value="{{ old('nama')}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tentang" class="form-label">Tentang</label>
                        <input type="text" class="form-control @error('tentang') is-invalid @enderror " id="tentang" name="tentang" required autofocus value="{{ old('tentang') }}">
                        @error('tentang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Save</button>
                
        </form>
      </div>

      <script>
        function previewFoto() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#foto').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
      </script>

    @endsection