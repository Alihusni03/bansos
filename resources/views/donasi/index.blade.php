<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BSP | Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

  </head>
  <body>
      <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-center pt-3 pb-2 mb-3 border-bottom">
        <a href="/halamandonatur" class="btn btn-primary me-3"><span data-feather="arrow-left"></span></a>
        <h1 class="h2">Checkout Donasi</h1>
      </div>
      <div class="col-lg-12 text-center">
          <form method="post" action="/checkout" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-center justify-content-center">
                <div class="col-md-3 p-2 ">
                    <div class="mb-3">
                        <label for="name" class="form-label">name Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" required autofocus value="{{ old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>  
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror " id="phone" name="phone" required autofocus value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total_price" class="form-label">Jumlah Donasi</label>
                        <input type="number" class="form-control @error('total_price') is-invalid @enderror " id="total_price" name="total_price" required autofocus value="{{ old('total_price') }}">
                        @error('total_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" name="alamat" rows="4"></textarea>
                        @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary col-md-12">Checkout</button>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="/js/dashboard.js"></script>
  </body>
  </html>