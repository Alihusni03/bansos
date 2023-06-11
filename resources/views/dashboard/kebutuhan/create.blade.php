@extends('dashboard.layouts.main')

    @section('container')
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/dashboard/kebutuhan" class="btn btn-success me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Tambah Data kebutuhan</h1>
      </div>
      <div class="col-lg-12">
          <form method="post" action="/dashboard/kebutuhan" enctype="multipart/form-data">
            @csrf
                    <div class="mb-3">
                        <label for="program" class="form-label">Nama Program</label>
                        <input type="text" class="form-control @error('program') is-invalid @enderror " id="program" name="program" required autofocus value="{{ old('program')}}">
                        @error('program')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="perbulan" class="form-label">Perbulan</label>
                        <input type="number" class="form-control @error('perbulan') is-invalid @enderror " id="perbulan" name="perbulan" required autofocus value="{{ old('perbulan') }}" oninput="hitungPerkalian()">
                        @error('perbulan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pertahun" class="form-label">Pertahun</label>
                        <input type="text" class="form-control @error('pertahun') is-invalid @enderror " id="hasil" name="pertahun" readonly>
                        @error('pertahun')
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

<script>
        function hitungPerkalian() {
            // Mendapatkan nilai dari input form
            var bulan = parseInt(document.getElementById("perbulan").value);
            // Melakukan perkalian
            var hasil = bulan * 12;

            // Menampilkan hasil di form ke-3
            document.getElementById("hasil").value = hasil;
        }
    </script>

    @endsection