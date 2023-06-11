@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/sosmed" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data sosmed</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/sosmed" enctype="multipart/form-data">
            @csrf
                    <div class="mb-3">
                        <label for="fb" class="form-label">FaceBook</label>
                        <input type="text" class="form-control @error('fb') is-invalid @enderror " id="fb" name="fb" required autofocus value="{{ old('fb')}}">
                        @error('fb')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tw" class="form-label">Twitter</label>
                        <input type="text" class="form-control @error('tw') is-invalid @enderror " id="tw" name="tw" required autofocus value="{{ old('tw')}}">
                        @error('tw')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="yt" class="form-label">YouTube</label>
                        <input type="text" class="form-control @error('yt') is-invalid @enderror " id="yt" name="yt" required autofocus value="{{ old('yt')}}">
                        @error('yt')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="ig" class="form-label">Instagram</label>
                        <input type="text" class="form-control @error('ig') is-invalid @enderror " id="ig" name="ig" required autofocus value="{{ old('ig')}}">
                        @error('ig')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wa" class="form-label">WhatsApp</label>
                        <input type="text" class="form-control @error('wa') is-invalid @enderror " id="wa" name="wa" required autofocus value="{{ old('wa')}}">
                        @error('wa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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