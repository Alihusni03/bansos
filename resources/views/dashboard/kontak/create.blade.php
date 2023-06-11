@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/kontak" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data kontak</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/kontak" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_panti" class="form-label">Nama Panti Asuhan</label>
                 " name="nama_panti" required autofocus value="{{ old('nama_panti')}}">
                @error('nama_panti')
                <div class="invalid-feedback"> 
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">nama</label>
                <input type="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="text" class="form-control @error('telephone') is-invalid @enderror " id="telephone" name="telephone" required autofocus value="{{ old('telephone') }}">
                @error('telephone')
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