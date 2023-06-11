@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/kegiatan" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Edit Data kegiatan</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/kegiatan/{{ $kegiatan->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="d-flex">
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" required autofocus value="{{ old('nama', $kegiatan->nama)}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" required onchange="previewFoto()">
                        <input type="hidden" name="oldFoto" value="{{ $kegiatan->foto }}">
                        @if($kegiatan->foto)
                            <img src="{{ asset('storage/' . $kegiatan->foto) }}" id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else
                            <img id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @endif
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="mb-5">
                        <label for="penjelasan" class="form-label">Penjelasan</label>
                        <input type="text" class="form-control @error('penjelasan') is-invalid @enderror " id="penjelasan" name="penjelasan" value="{{ old('penjelasan',$kegiatan->penjelasan) }}">
                        @error('penjelasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success col-md-12">Update</button>
                </div>
            </div>
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