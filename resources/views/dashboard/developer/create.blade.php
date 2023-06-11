@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/developer" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data Panti</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/developer" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12 p-2">
                    <div class="mb-3">
                        <label for="nama_panti" class="form-label">Nama Panti</label>
                        <input type="text" class="form-control @error('nama_panti') is-invalid @enderror " id="nama_panti" name="nama_panti" required autofocus value="{{ old('nama_panti')}}">
                        @error('nama_panti')
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
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" required onchange="previewFoto()">
                        <img id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Save</button>
            </div>
        </form>
      </div>

      

    @endsection