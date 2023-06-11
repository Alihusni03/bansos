@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/anak" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Edit Data anak</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/anak/{{ $anak->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="d-flex">
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror " id="nama" name="nama" required autofocus value="{{ old('nama', $anak->name)}}">
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
                                    @if(old('jenis_kelamin_id',$anak->jenis_kelamin_id) == $jenis_kelamin->id)
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
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" name="status_id" required>
                                @foreach ($statuses as $status)
                                    @if(old('status_id',$anak->status_id) == $status->id)
                                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ms-4 col-md-4">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <select class="form-select" name="lokasi_id" required>
                                @foreach ($lokasis as $lokasi)
                                    @if(old('lokasi_id,$anak->lokasi_id') == $lokasi->id)
                                        <option value="{{ $lokasi->id }}" selected>{{ $lokasi->name }}</option>
                                    @else
                                        <option value="{{ $lokasi->id }}">{{ $lokasi->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-2">
                    <div class="mb-3">
                        <label for="sekolah" class="form-label">Sekolah</label>
                        <input type="text" class="form-control @error('sekolah') is-invalid @enderror " id="sekolah" name="sekolah" required autofocus value="{{ old('sekolah',$anak->sekolah) }}">
                        @error('sekolah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" name="alamat" value="{{ old('alamat',$anak->alamat) }}">
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