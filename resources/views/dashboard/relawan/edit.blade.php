@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/relawan" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Edit Data Relawan</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/relawan/{{ $relawan->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="d-flex">
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" required autofocus value="{{ old('nama', $relawan->nama)}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="col-md-4">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" name="jenis_kelamin_id" required>
                                @foreach ($jenis_kelamins as $jenis_kelamin)
                                    @if(old('jenis_kelamin_id',$relawan->jenis_kelamin_id) == $jenis_kelamin->id)
                                        <option value="{{ $jenis_kelamin->id }}" selected>{{ $jenis_kelamin->name }}</option>
                                    @else
                                        <option value="{{ $jenis_kelamin->id }}">{{ $jenis_kelamin->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ms-4 col-md-3">
                            <label for="tl" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tl') is-invalid @enderror " id="tl" name="tl" value="{{ old('tl',$relawan->tl) }}" required>
                            @error('tl')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ms-4 col-md-4">
                            <label for="agama" class="form-label">Agama</label>
                            <select class="form-select" name="agama_id" required>
                                @foreach ($agamas as $agama)
                                    @if(old('agama_id',$relawan->agama_id) == $agama->id)
                                        <option value="{{ $agama->id }}" selected>{{ $agama->name }}</option>
                                    @else
                                        <option value="{{ $agama->id }}">{{ $agama->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" required onchange="previewFoto()">
                        <input type="hidden" name="oldFoto" value="{{ $relawan->foto }}">
                        @if($relawan->foto)
                            <img src="{{ asset('storage/' . $relawan->foto) }}" id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @else
                            <img id="preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                        @endif
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="np" class="form-label">Nama Panggilan</label>
                        <input type="text" class="form-control @error('np') is-invalid @enderror " id="np" name="np" required autofocus value="{{ old('np',$relawan->np) }}">
                        @error('np')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nowa" class="form-label">No WhatsApp</label>
                        <input type="text" class="form-control @error('nowa') is-invalid @enderror " id="nowa" name="nowa" required autofocus value="{{ old('nowa',$relawan->nowa) }}">
                        @error('nowa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" name="alamat" value="{{ old('alamat',$relawan->alamat) }}">
                        @error('alamat')
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